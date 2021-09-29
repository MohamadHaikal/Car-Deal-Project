<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandsController extends Controller
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
    {   //display all brand
        $brand = Brand::all();
        return view('admin.brand.all', compact('brand'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {   //return add brand page
        return view('admin.brand.add');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $brand = new Brand;

        //store brand info
        $brand->name = $request->name;
        $brand->model = $request->model;
        $logo = time() . '.' . $request->file('logo')->getClientOriginalExtension();
        $request->logo->move(public_path('Uploaded/image/brand'), $logo);
        $brand->logo = $logo;

        $brand->save();

        return redirect('brand/all');
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
    {   //return edit brand page
        $brand = Brand::where('id', '=', $id)->first();
        return view('admin.brand.edit', compact('brand'));
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
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->model = $request->model;
        // update image if exists.
        if ($request->hasFile('logo')) {
            $logo = time() . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->logo->move(public_path('Uploaded/image/brand'), $logo);
            $brand->logo = $logo;
        }
        $brand->save();
        return redirect('/brand/all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   //delete brand
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('/brand/all');
    }
}
