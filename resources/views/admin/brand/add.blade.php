@extends('layouts.dashboard')
@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">

                <div class="card-box">
                    <h3 class="text-center">Add Brand</h3>
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post"
                        action="{{ route('store-brand') }}">
                        @csrf
                        <div class="row">


                            <div class="form-group">
                                <label class="col-md-2 control-label">Name:</label>
                                <div class="col-md-10">

                                    <input required type="string" type="text" class="form-control" name="name"
                                        placeholder="name...">



                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label"> Model: </label>
                                <div class="col-md-10">
                                    <input required type="string" type="text" class="form-control" name="model"
                                        placeholder="Model...">

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label">Logo:</label>
                                <div class="col-md-10">
                                    <input type="file" name="logo" class="dropify" data-height="300">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary waves-effect w-md waves-light ">Submit</button>
                    </form>
                </div>

            </div>
            <!-- end row -->
        @endsection
