<?php
namespace App\Http;

use App\Http\Enums\FileTypes;
use App\Http\Enums\MediaTypes;
use App\Http\Enums\VerificationSendingWays;
use App\Library\Transformers\TwigTransformer;
use App\Models\Verification;
use App\Models\WaterMarkLogs;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\Exception\ExecutableNotFoundException;
use FFMpeg\FFMpeg;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Image;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use App\Transformers\MyCustomArraySerializer;
use Mockery\CountValidator\Exception;
use App\Jobs\SendEmailJob;

class Helpers
{
    private static $fractal = null;
    const PAGINATION_DEFAULT = 10;

    public static function getRandomInteger($min = 1, $max = 1000000)
    {
        return rand($min, $max);
    }

    public static function transformObject($object, $transformer, $includes = "", $excludes = "")
    {
        if (Helpers::$fractal == null) {
            Helpers::$fractal = new Manager();
            Helpers::$fractal->setSerializer(new MyCustomArraySerializer());
        }
        Helpers::$fractal->parseIncludes($includes);
        Helpers::$fractal->parseExcludes($excludes);
        $item = new Item($object, $transformer);
        $responseData = Helpers::$fractal->createData($item)->toArray();
        return $responseData;
    }

    public static function transformArray($arr, $transformer)
    {
        if (Helpers::$fractal == null) {
            Helpers::$fractal = new Manager();
            Helpers::$fractal->setSerializer(new MyCustomArraySerializer());
        }
        if (isset($_GET['include'])) {
            $transformer->setAvailableIncludes($transformer->getDefaultIncludes());
            $transformer->setDefaultIncludes([]);
            Helpers::$fractal->parseIncludes($_GET['include']);
        }

        $collection = new Collection($arr, $transformer);
        $responseData = Helpers::$fractal->createData($collection)->toArray();
        return $responseData;
    }

    public static function checkMobileNumberFormat($mobile_number)
    {
        $mobile_number_result = null;
        $number_key = substr($mobile_number, 0, 1);
        if ($number_key == '+')
            $mobile_number_result = $mobile_number;
        else {
            $number_key = substr($mobile_number, 0, 2);
            if ($number_key == '00')
                $mobile_number_result = '+' . substr($mobile_number, 2, strlen($mobile_number));
        }
        return $mobile_number_result;
    }

    public static function getImageFullPath($file, $path = '')
    {
        if (empty($file))
            return "";
        //return url('images/no_image.gif');

        return asset($path . $file);
    }

    public static function generateQrCode()
    {
        return rand(1, 10000000);
    }

    public static function formatValidationRules($rules)
    {
        $finalRules = '';
        foreach ($rules as $rule)
            $finalRules .= $rule . '|';
        $finalRules = substr($finalRules, 0, strlen($finalRules) - 1);
        return $finalRules;
    }

    public static function getFileType($filename)
    {
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        $photoExtensions = ['jpg', 'png', 'bmp', 'gif', 'jpeg'];
        $videoExtensions = ['mp4', 'flv', 'mov'];

        $mediaType = MediaTypes::UNKNOWN;
        if (in_array($extension, $photoExtensions))
            $mediaType = MediaTypes::IMAGE;
        if (in_array($extension, $videoExtensions))
            $mediaType = MediaTypes::VIDEO;
        return $mediaType;
    }

    public static function generateEnumValidation($values)
    {
        return "in:" . implode(",", $values);
    }

    public static function getAttachableArray($items, $fields)
    {
        $new_items = array();
        foreach ($items as $item) {
            $id = $item['id'];
            //unset($item['id']);
            $new_items[$id] = array_intersect_key($item, array_flip($fields));
        }
        return $new_items;
    }

    public static function getPaginationLimit($limit)
    {
        return $limit != null && is_numeric($limit) /*&& $limit < 40*/ ? $limit : Helpers::PAGINATION_DEFAULT;
    }

    public static function randString($length)
    {
        $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $char = str_shuffle($char);
        for ($i = 0, $rand = '', $l = strlen($char) - 1; $i < $length; $i++) {
            // $rand .= $char{mt_rand(0, $l)};
            $rand .= $char[mt_rand(0, $l)];
        }
        return $rand;
    }

    public static function sendSMS($phone, $text)
    {
        //here should we enter SMS api info..
    }

    public static function uploadFile($file, $filePath = "images/uploads", $prefix = "_file")
    {
        if (empty($file)) return "";

        // OLD LOGIC
        // $filename = uniqid($prefix) . "." . $file->getClientOriginalExtension();
        // $file->move(public_path($filePath), $filename);
        // return $filename;


        // S3 Logic
        $filename = uniqid($prefix) . "." . $file->getClientOriginalExtension();
        \Storage::disk('s3')->put("$filePath/$filename", fopen($file, 'r+'), 'public');

        return \Storage::disk('s3')->url($filePath . $filename);
    }

    public static function deleteFile($file)
    {
        if (is_file($file))
            unlink($file);
    }

    public static function generateVerificationCode($user)
    {
        try {
            $verification = new Verification();
            $verification->user_id = $user->id;
            $verification->code = Helpers::getRandomInteger(1000, 9999);
            $verification->sent_over = VerificationSendingWays::SMS;
            $verification->has_destroyed = false;
            $verification->save();
            return $verification;
        } catch (\Exception $ex) {
            return null;
        }
    }

    public static function generateThumb($file, $filePath = "images/uploads", $prefix = "_thumb")
    {
        if (empty($file)) return "";

        // set_error_handler(function($errno, $errstr, $errfile, $errline ){
        //     throw new Exception($errstr, $errno, 0, $errfile, $errline);
        // });

        try {
            $ffmpeg = FFMpeg::create([
                'ffmpeg.binaries'  => '/var/www/ffmpeg/ffmpeg', // the path to the FFMpeg binary
                'ffprobe.binaries' => '/var/www/ffmpeg/ffprobe', // the path to the FFProbe binary
                'timeout'          => 3600, // the timeout for the underlying process
                'ffmpeg.threads'   => 12,   // the number of threads that FFMpeg should use
            ]);
            $video = $ffmpeg->open($filePath . "/" . $file);

            $thumb = uniqid($prefix) . '.jpg';

            $video
                ->frame(TimeCode::fromSeconds(1))
                ->save($filePath . "/" . $thumb);

            // try{
            //     //reset orientation if needed.
            //     //get metadata.
            //     $ffprobe = $video -> getFFProbe();
            //     $data = $ffprobe -> streams($filePath."/".$file)
            //         ->videos()->first()->all();

            //     //check if we need to rotate images before get frame.
            //     if(isset($data["tags"]) && isset($data["tags"]["rotate"])){
            //         //here we need to rotate video.
            //         switch ($data["tags"]["rotate"]) {
            //             case '90':
            //                 \Intervention\Image\Facades\Image::make($filePath."/".$thumb)->rotate(-90)->save($filePath."/".$thumb);
            //                 break;
            //             case '-90':
            //                 \Intervention\Image\Facades\Image::make($filePath."/".$thumb)->rotate(90)->save($filePath."/".$thumb);
            //                 break;
            //             case '180':
            //                 \Intervention\Image\Facades\Image::make($filePath."/".$thumb)->rotate(-180)->save($filePath."/".$thumb);
            //                 break;
            //             case '-180':
            //                 \Intervention\Image\Facades\Image::make($filePath."/".$thumb)->rotate(180)->save($filePath."/".$thumb);
            //                 break;
            //             case '270':
            //                 \Intervention\Image\Facades\Image::make($filePath."/".$thumb)->rotate(-270)->save($filePath."/".$thumb);
            //                 break;
            //             case '-270':
            //                 \Intervention\Image\Facades\Image::make($filePath."/".$thumb)->rotate(270)->save($filePath."/".$thumb);
            //                 break;
            //             default:
            //                 break;
            //         }
            //     }
            //     //$img = \Intervention\Image\Facades\Image::make($filePath."/".$thumb)->orientate()->insert($filePath."/".$thumb);
            // }catch(\Exception $e){

            // }

            //create log.
            // WaterMarkLogs::create([
            //     "type"        => "success",
            //     "content"     => '',
            //     "user_id"     => \Auth::user()->id,
            //     "media_name"  => $file,
            // ]);

            return $thumb;
        } catch (ExecutableNotFoundException $e) {
            WaterMarkLogs::create([
                "type"        => "ExecutableNotFoundException",
                "content"     => $e,
                "user_id"     => \Auth::user()->id,
                "media_name"  => $file,
            ]);
            return "";
        } catch (Exception $e) {

            WaterMarkLogs::create([
                "type"        => "Exception",
                "content"     => $e,
                "user_id"     => \Auth::user()->id,
                "media_name"  => $file,
            ]);
            return "";
        }
    }

    public static function copy_file_from_url($url, $path = "images/uploads/", $prefix = "_photo")
    {
        if (empty($url)) return "";

        try {
            $headers = self::get_web_page($url);
            if (isset($headers["http_code"]) && $headers["http_code"] == 200) {
                if (isset($headers["content_type"]) && strpos($headers["content_type"], 'image') !== false) {
                    $filename = uniqid($prefix) . self::FileExt($headers["content_type"]);
                    $base_path = base_path('public/' . $path);
                    file_put_contents($base_path . $filename, $headers["content"]);
                    return $filename;
                }
            }
        } catch (\Exception $e) {
            return "";
        }

        return "";
    }

    public static function get_web_page($url, $cookiesIn = '')
    {
        $options = array(
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => true,     //return headers in addition to content
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
            CURLINFO_HEADER_OUT    => true,
            CURLOPT_SSL_VERIFYPEER => false,     // Disabled SSL Cert checks
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_COOKIE         => $cookiesIn
        );

        $ch      = curl_init($url);
        curl_setopt_array($ch, $options);
        $rough_content = curl_exec($ch);
        $err     = curl_errno($ch);
        $errmsg  = curl_error($ch);
        $header  = curl_getinfo($ch);
        curl_close($ch);

        $header_content = substr($rough_content, 0, $header['header_size']);
        $body_content = trim(str_replace($header_content, '', $rough_content));
        $pattern = "#Set-Cookie:\\s+(?<cookie>[^=]+=[^;]+)#m";
        preg_match_all($pattern, $header_content, $matches);
        $cookiesOut = implode("; ", $matches['cookie']);

        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['headers']  = $header_content;
        $header['content'] = $body_content;
        $header['cookies'] = $cookiesOut;

        return $header;
    }

    public static function FileExt($contentType)
    {
        $map = array(
            'application/pdf'   => '.pdf',
            'application/zip'   => '.zip',
            'image/gif'         => '.gif',
            'image/jpeg'        => '.jpg',
            'image/png'         => '.png',
            'text/css'          => '.css',
            'text/html'         => '.html',
            'text/javascript'   => '.js',
            'text/plain'        => '.txt',
            'text/xml'          => '.xml',
        );
        if (isset($map[$contentType])) {
            return $map[$contentType];
        }

        // HACKISH CATCH ALL (WHICH IN MY CASE IS
        // PREFERRED OVER THROWING AN EXCEPTION)
        $pieces = explode('/', $contentType);
        return '.' . array_pop($pieces);
    }
}
