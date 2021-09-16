@extends('layouts.dashboard')

@section('content')
    <!-- Start content -->

    <div class="content">
        <div class="container">



            <div class="row">
                <h3 class="text-center">All Special Offer </h3>
                <div class="col-lg-12">
                    <div class="card-box">
                        @if (count($special_offer) != 0)


                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>ratio</th>
                                            <th>Description</th>
                                            <th>startDate</th>
                                            <th>EndDate</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($special_offer as $offer)
                                            <tr>
                                                <th>{{ $offer->id }}</th>
                                                <th>{{ $offer->ratio }}</th>
                                                <th>{{ $offer->description }}</th>
                                                <th>{{ $offer->start_date }}</th>
                                                <th>{{ $offer->end_date }}</th>
                                                <td>
                                                    <a href="{{ route('edit-special_offer', [$offer->id]) }}"> <button
                                                            type="button"
                                                            class="btn btn-success waves-effect w-md waves-light m-b-5">Update</button></a>
                                                    <a href="{{ route('delete-special_offer', [$offer->id]) }}"> <button
                                                            type="button"
                                                            class="btn btn-danger waves-effect w-md waves-light m-b-5">Delete</button></a>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
                <!-- end col -->
            @else
                <div class="text-center , alert alert-danger">
                    <h3> No Data</h3>
                </div>
                @endif

            @endsection
