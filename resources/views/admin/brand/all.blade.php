@extends('layouts.dashboard')
@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <h3 class="text-center">All Brands</h3>

                <div class="col-lg-12">
                    <div class="card-box">
                        @if (count($brand) != 0)


                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>BrandName</th>
                                            <th>Model</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brand as $brands)
                                            <tr>
                                                <th>{{ $brands->id }}</th>
                                                <td>{{ $brands->name }}</td>
                                                <td>{{ $brands->model }}</td>

                                                <td>
                                                    <a href="{{ route('edit-brand', [$brands->id]) }}"> <button
                                                            type="button"
                                                            class="btn btn-success waves-effect w-md waves-light m-b-5">Update</button></a>
                                                    <a href="{{ route('delete-brand', [$brands->id]) }}"> <button
                                                            type="button"
                                                            class="btn btn-danger waves-effect w-md waves-light m-b-5">Delete</button></a>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>


                            </div>
                    </div>
                </div><!-- end col -->

            @else
                <div class="text-center , alert alert-danger">
                    <h3> No Data</h3>
                </div>
                @endif




            </div>
            <!-- end row -->

        @endsection
