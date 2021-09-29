<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SpecialOffer;


class SpecialOffersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all special offer page
        $special_offer = SpecialOffer::all();
        return view('admin.special_offer.all', compact('special_offer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return add page
        return view('admin.special_offer.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store special offer info
        $special_offer = new SpecialOffer;
        $special_offer->fill($request->all());
        $special_offer->save();

        return redirect('/offer/all');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return update page
        $special_offer = SpecialOffer::where('id', '=', $id)->first();
        return view('admin.special_offer.edit', compact('special_offer'));
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
        //update special offer info
        $special_offer = SpecialOffer::find($id);
        $special_offer->description = $request->description;
        $special_offer->ratio = $request->ratio;
        $special_offer->start_date = $request->start_date;
        $special_offer->end_date = $request->end_date;
        $special_offer->save();

        return redirect('/offer/all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete special offer
        $special_offer = SpecialOffer::find($id);
        $special_offer->delete();
        return redirect('/offer/all');
    }
}
