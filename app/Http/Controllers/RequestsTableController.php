<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RequestTable;
use App\Models\Brand;
use App\Models\Vehicle;
use App\Models\ReportStatus;
use App\Models\Log;
use App\Models\Client;
use App\Models\ContractBuy;
use App\Models\ContractRent;
use Auth;

class RequestsTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //return  all request page
        $brands = Brand::all();
        $request_table = RequestTable::with('Client', 'Vehicle')
            ->where('id', '>', '0')
            ->paginate(10);
        return view('admin.request_table.all', compact('request_table', 'brands'));
    }




    public function create_buy_request($id)
    {
        $exists = RequestTable::where('client_id', '=', Auth::guard('client')->user()->id)
            ->where('vehicle_id', '=', $id)->first();
        //if request sent recently
        if ($exists) {
            return back();
        } else {
            $vehicle = vehicle::where('id', '=', $id)->first();

            RequestTable::create([
                'date'       => now()->toDateString(),
                'type'       => $vehicle->service_type,
                'client_id'  => Auth::guard('client')->user()->id,
                'vehicle_id' => $id
            ]);
            $req = RequestTable::where('client_id', '=', Auth::guard('client')->user()->id)
                ->where('vehicle_id', '=', $id)->first();
            ReportStatus::create([
                'date'       => now()->toDateString(),
                'client_id'  => Auth::guard('client')->user()->id,
                'vehicle_id' => $id,
                'request_table_id' => $req->id,
            ]);
            return redirect()->back()->with('success', 'request sended successfully.');
        }
    }


    public function create_rent_request(Request $request, $id)
    {
        $exists = RequestTable::where('client_id', '=', Auth::guard('client')->user()->id)
            ->where('vehicle_id', '=', $id)->first();
        //if request sent recently
        if ($exists) {
            return back();
        } else {

            $vehicle = vehicle::where('id', '=', $id)->first();
            //store request info
            RequestTable::create([
                'date'       => now()->toDateString(),
                'type'       => $vehicle->service_type,
                'start_date' => $request->start_date,
                'end_date'   => $request->end_date,
                'client_id'  => Auth::guard('client')->user()->id,
                'vehicle_id' => $id
            ]);

            $req = RequestTable::where('client_id', '=', Auth::guard('client')->user()->id)
                ->where('vehicle_id', '=', $id)->first();
            //store report info
            ReportStatus::create([
                'date'       => now()->toDateString(),
                'client_id'  => Auth::guard('client')->user()->id,
                'vehicle_id' => $id,
                'request_table_id' => $req->id,
            ]);
            return redirect()->back()->with('success', 'request sended successfully.');
        }
    }




    public function decline($id)
    {
        $status = ReportStatus::where('request_table_id', '=', $id)->first();
        // feedback to client if request decline
        $rstatus = ReportStatus::find($status->id);
        $rstatus->status = 'unacceptable';
        $rstatus->save();
        $request = RequestTable::where('id', '=', $id)->first();

        //add action to log record
        $log = new Log;
        $log->client_id = $request->client_id;
        $log->vehicle_id = $request->vehicle_id;
        $log->date = now()->toDateString();
        $log->action = "Decline";
        $log->save();
        $request->delete();
        return back();
    }

    public function Accept($id)
    {   // feedback to client if request accept
        $status = ReportStatus::where('request_table_id', '=', $id)->first();
        $rstatus = ReportStatus::find($status->id);
        $rstatus->status = 'acceptable';
        $rstatus->save();

        $request = RequestTable::where('id', '=', $id)->first();
        $vehicle = vehicle::find($request->vehicle_id);
        // make vehicle not avalable
        $vehicle->is_available = 0;
        $requests = RequestTable::where('vehicle_id', '=', $request->vehicle_id)->get();
        $client = Client::find($request->client_id);
        // if request buy
        if ($vehicle->service_type == "buy") {
            $cbuy = new ContractBuy;
            $cbuy->date = now()->toDateString();
            $cbuy->client_id = $client->id;
            $cbuy->vehicle_id = $vehicle->id;
            $cbuy->save();

            //add action to log record
            $log = new Log;
            $log->client_id = $request->client_id;
            $log->vehicle_id = $request->vehicle_id;
            $log->date = now()->toDateString();
            $log->action = "Request Buy Accepted";
            $log->save();
        }
        //if request rent
        if ($vehicle->service_type == "rent") {
            $cbuy = new ContractRent;
            $cbuy->client_id = $client->id;
            $cbuy->vehicle_id = $vehicle->id;
            $cbuy->start_date = $request->start_date;
            $cbuy->end_date = $request->end_date;
            $cbuy->save();

            //add action to log record
            $log = new Log;
            $log->client_id = $request->client_id;
            $log->vehicle_id = $request->vehicle_id;
            $log->date = now()->toDateString();
            $log->action = "Request Rent Accepted";
            $log->save();
        }
        $vehicle->save();
        foreach ($requests as $req) {
            $status = ReportStatus::where('vehicle_id', '=', $request->vehicle_id)
                ->where('client_id', '!=', $request->client_id)
                ->get();

            // Notify other client that their requests have been rejected
            foreach ($status as $st) {
                $rstatus = ReportStatus::find($st->id);
                $rstatus->status = 'unacceptable';
                $rstatus->save();
            }

            if ($req->client_id != $request->client_id) {
                //add action to log record
                $log = new Log;
                $log->client_id = $req->client_id;
                $log->vehicle_id = $req->vehicle_id;
                $log->date = now()->toDateString();
                $log->action = "Decline";
                $log->save();
            }
            $req->delete();
        }
        $request->delete();
        return back();
    }
}
