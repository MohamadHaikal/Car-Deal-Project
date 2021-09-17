<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Gallery;
use App\Models\Brand;
use App\Models\SpecialOffer;
use App\Models\ReportStatus;
use App\Models\ClientVehicle;
use Auth;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //main site page
        $vehicles = Vehicle::all();
        $brands = Brand::all();
        return view('index', compact('vehicles', 'brands'));
    }

    public function special_offer()
    {
        $gallery = Gallery::all();
        $NowDate = now()->toDateString();
        $veh = Vehicle::where('is_available', '=', '1')
            ->where('has_offer', '=', '1')
            ->paginate(6);
        foreach ($veh as $vehicle) {
            $offer = SpecialOffer::where('id', '=', $vehicle->special_offer_id)->first();
            $EndDate = $offer->end_date;
            // check if special offer expired
            if ($EndDate < $NowDate) {
                //remove vehicle from offer page
                $vehicle->price_after_offer = $vehicle->price;
                $vehicle->has_offer = 0;
                $vehicle->save();
            }
        }
        $vehicles = Vehicle::where('is_available', '=', '1')
            ->where('has_offer', '=', '1')
            ->paginate(6);

        return view('special_offer_cars', compact('vehicles', 'gallery'));
    }

    public function vehicle_listing()
    {
        $gallery = Gallery::all();
        $NowDate = now()->toDateString();
        $veh = Vehicle::where('is_available', '=', '1')
            ->where('has_offer', '=', '1')
            ->paginate(6);
        foreach ($veh as $vehicle) {
            $offer = SpecialOffer::where('id', '=', $vehicle->special_offer_id)->first();
            $EndDate = $offer->end_date;
            // check if special offer expired
            if ($EndDate < $NowDate) {
                //remove vehicle from offer page
                $vehicle->price_after_offer = $vehicle->price;
                $vehicle->has_offer = 0;
                $vehicle->save();
            }
        }
        $vehicles = Vehicle::where('is_available', '=', '1')->paginate(6);
        return view('vehicle_listing', compact('vehicles', 'gallery'));
    }
    public function vehicle_buy()
    {    //return all vehicle for buy
        $gallery = Gallery::all();
        $vehicles = Vehicle::where('is_available', '=', '1')
            ->where('has_offer', '=', '0')
            ->where('service_type', '=', 'buy')
            ->paginate(6);
        return view('vehicle_buy', compact('vehicles', 'gallery'));
    }
    public function vehicle_rent()
    {   //return all vehicle for rent
        $gallery = Gallery::all();
        $vehicles = Vehicle::where('is_available', '=', '1')
            ->where('has_offer', '=', '0')
            ->where('service_type', '=', 'rent')
            ->paginate(6);
        return view('vehicle_rent', compact('vehicles', 'gallery'));
    }


    public function special_buy()
    {
        $gallery = Gallery::all();
        $NowDate = now()->toDateString();
        $veh = Vehicle::where('is_available', '=', '1')
            ->where('has_offer', '=', '1')
            ->paginate(6);
        foreach ($veh as $vehicle) {
            $offer = SpecialOffer::where('id', '=', $vehicle->special_offer_id)->first();
            $EndDate = $offer->end_date;
            // check if special offer expired
            if ($EndDate < $NowDate) {
                //remove vehicle from offer page
                $vehicle->price_after_offer = $vehicle->price;
                $vehicle->has_offer = 0;
                $vehicle->save();
            }
        }
        $vehicles = Vehicle::where('is_available', '=', '1')
            ->where('has_offer', '=', '1')
            ->where('service_type', '=', 'buy')
            ->paginate(6);
        return view('special_buy', compact('vehicles', 'gallery'));
    }

    public function special_rent()
    {
        $gallery = Gallery::all();
        $NowDate = now()->toDateString();
        $veh = Vehicle::where('is_available', '=', '1')
            ->where('has_offer', '=', '1')->paginate(6);
        foreach ($veh as $vehicle) {
            $offer = SpecialOffer::where('id', '=', $vehicle->special_offer_id)->first();
            $EndDate = $offer->end_date;
            // check if special offer expired
            if ($EndDate < $NowDate) {
                //remove vehicle from offer page
                $vehicle->price_after_offer = $vehicle->price;
                $vehicle->has_offer = 0;
                $vehicle->save();
            }
        }
        $vehicles = Vehicle::where('is_available', '=', '1')
            ->where('has_offer', '=', '1')
            ->where('service_type', '=', 'rent')
            ->paginate(6);
        return view('special_rent', compact('vehicles', 'gallery'));
    }

    public function vehicle_listing_detail($id)
    {   //vehicle details page
        $vehicle = Vehicle::where('id', '=', $id)->first();
        $gallery = Gallery::all();

        return view('vehicle_listing_detail', compact('vehicle', 'gallery'));
    }


    public function search(Request $request)
    {
        $vehicles = Vehicle::where('is_available', '=', '1')
            ->where('status', '=', $request->status)
            ->where('brand_id', '=', $request->brand_id)
            ->where('year', '=', $request->year)
            ->where('service_type', '=', $request->service)
            ->where('price_after_offer', '<=', $request->rang_price)
            ->where('price_after_offer', '>', 0)
            ->paginate(6);
        $gallery = Gallery::all();

        return view('search', compact('vehicles', 'gallery'));
    }

    public function favourite_car()
    {   //return all favourite car for client
        $gallery = Gallery::all();
        $favourite = ClientVehicle::where('client_id', '=', Auth::guard('client')->user()->id)
            ->paginate(6);
        return view('favourite_car', compact('gallery', 'favourite'));
    }

    public function add_favourite($id)
    {
        $favourite = ClientVehicle::where('client_id', '=', Auth::guard('client')->user()->id)
            ->where('vehicle_id', '=', $id)
            ->first();
        //check if vehicle exists
        if ($favourite) {
            return back();
        }
        //add vehicle to favourite
        else {

            $fav = new ClientVehicle;
            $fav->client_id = Auth::guard('client')->user()->id;
            $fav->vehicle_id = $id;
            $fav->save();
            return back();
        }
    }

    public function about_us()
    {
        return view('about_us');
    }

    public function change_password()
    {
        return view('change_password');
    }

    public function contact()
    {
        return view('contact');
    }

    public function terms_and_conditions()
    {
        return view('terms_and_conditions');
    }

    public function report_of_requests()
    {
        $report = ReportStatus::where('client_id', '=', Auth::guard('client')->user()->id)->get();
        return view('report_of_requests', compact('report'));
    }

    public function user_profile()
    {
        return view('user_profile');
    }
}
