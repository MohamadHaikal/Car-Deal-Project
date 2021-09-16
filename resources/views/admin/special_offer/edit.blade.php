@extends('layouts.dashboard')

@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <h3 class="text-center">Edit Special Offer </h3>
                <div class="col-sm-12">
                    <div class="card-box">

                        <div class="row">
                            <div class="col-lg-8">

                                <div class="p-20">
                                    <form class="form-horizontal" method="post"
                                        action="{{ route('update-special_offer', [$special_offer->id]) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Ratio:</label>
                                            <div class="col-sm-8">
                                                <input required type="string" type="text" class="form-control"
                                                    placeholder="Ratio..." name="ratio" value="{{ $special_offer->ratio }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Description:</label>
                                            <div class="col-sm-8">
                                                <textarea required type="string" class="form-control" rows="3"
                                                    placeholder="Descripton..."
                                                    name="description">{{ $special_offer->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Date Range:</label>
                                            <div class="col-sm-8">
                                                <div class="input-daterange input-group">
                                                    <input required type="date" class="form-control" name="start_date"
                                                        value="{{ $special_offer->start_date }}" />
                                                    <span class="input-group-addon bg-primary b-0 text-white">to</span>
                                                    <input required type="date" class="form-control" name="end_date"
                                                        value="{{ $special_offer->end_date }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit"
                                            class="btn btn-primary waves-effect w-md waves-light m-b-5  ">Submit</button>
                                    </form>
                                </div>
                            </div><!-- end col -->


                        </div><!-- end row-->
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->



        </div> <!-- container -->

    </div> <!-- content -->

@endsection
