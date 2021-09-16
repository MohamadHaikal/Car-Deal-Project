<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Brand;
use App\Models\Gallery;
use App\Models\SpecialOffer;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle = Vehicle::all();
        $brands = Brand::all();
        $offers = SpecialOffer::all();
        return view('admin.vehicle.all', compact('vehicle','brands','offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::all();
        $offers = SpecialOffer::all();
        return view('admin.vehicle.add', compact('brand','offers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = new Vehicle;
        $offers = SpecialOffer::where('id', '=', $request->special_offer_id)->first();;
        $vehicle->fill($request->all());
        if ($request->has_offer == 1) {
            $vehicle->price_after_offer = ($request->price) - ((($request->price) * ($offers->ratio)) / 100.0);
        } else {
            $vehicle->price_after_offer = $request->price;
        }
        $vehicle->save();

        $image = $request->file('images');
        foreach ($image as $files) {
            $destinationPath = 'Uploaded/image/';

            $file_name = time() . "." . $files->getClientOriginalExtension();
            sleep(1);
            $files->move($destinationPath, $file_name);
            $data[] = $file_name;
        }
        foreach ($data as $d) {
            $file = new Gallery();
            $file->image = $d;
            $file->vehicle_id = $vehicle->id;
            $file->save();
        }

        return redirect('/vehicle/all');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::all();
        $offers = SpecialOffer::all();
        $vehicle = Vehicle::where('id', '=', $id)->first();
        return view('admin.vehicle.edit', compact('vehicle','brand','offers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $offers = SpecialOffer::where('id', '=', $request->special_offer_id)->first();
        $vehicle->description = $request->description;
        $vehicle->is_available = $request->is_available;
        $vehicle->engine_force = $request->engine_force;
        $vehicle->fuel = $request->fuel;
        $vehicle->kilometrage = $request->kilometrage;
        $vehicle->max_speed = $request->max_speed;
        $vehicle->status = $request->status;
        $vehicle->brand_id = $request->brand_id;
        $vehicle->special_offer_id = $request->special_offer_id;
        $vehicle->price = $request->price;
        if ($request->has_offer == 1) {
            $vehicle->price_after_offer = ($request->price) - ((($request->price) * ($offers->ratio)) / 100.0);
        } else {
            $vehicle->price_after_offer = $request->price;
        }

        $vehicle->rent_price = $request->rent_price;
        $vehicle->has_offer = $request->has_offer;
        $vehicle->origin_country = $request->origin_country;
        $vehicle->year = $request->year;
        $vehicle->transmission = $request->transmission;
        $vehicle->interior_color = $request->interior_color;
        $vehicle->exterior_color = $request->exterior_color;
        $vehicle->body = $request->body;
        $vehicle->service_type = $request->service_type;

        $vehicle->save();
        if ($request->hasFile('images')) {
            $gallery = Gallery::where('vehicle_id', '=', $id);
            $gallery->delete();
            $image = $request->file('images');
            foreach ($image as $files) {
                $destinationPath = 'Uploaded/image/';

                $file_name = time() . "." . $files->getClientOriginalExtension();
                sleep(1);

                $files->move($destinationPath, $file_name);
                $data[] = $file_name;
            }
            foreach ($data as $d) {
                $file = new Gallery();
                $file->image = $d;
                $file->vehicle_id = $vehicle->id;
                $file->save();
            }
        }
        return redirect('/vehicle/all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return redirect('/vehicle/all');
    }
}
