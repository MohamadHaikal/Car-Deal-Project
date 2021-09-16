@extends("layouts.dashboard")
@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <h3 class="text-center">All Contracts Requests </h3>
                <div class="col-lg-12">
                    <div class="card-box">
                        @if (count($request_table) != 0)

                            <div class="table-responsive">
                                <table class="table table-striped " id="datatable-editable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>ServiceType</th>
                                            <th>clientID</th>
                                            <th>FirstName</th>
                                            <th>LastName</th>
                                            <th>Address</th>
                                            <th>phone</th>
                                            <th>VehicleID</th>
                                            <th>VehicleBrand</th>
                                            <th>Price</th>
                                            <th>StartDate</th>
                                            <th>EndDate</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($request_table as $req)

                                            <tr>
                                                <th scope="row">{{ $req->id }}</th>
                                                <td>{{ $req->created_at }}</td>
                                                <td> {{ $req->type }}</td>
                                                <td>{{ $req->client->id }}</td>
                                                <td>{{ $req->client->first_name }}</td>
                                                <td>{{ $req->client->last_name }}</td>
                                                <td>{{ $req->client->address }}</td>
                                                <td>{{ $req->client->phone }}</td>
                                                <td>{{ $req->Vehicle->id }}</td>
                                                @foreach ($brands as $brand)
                                                    @if ($brand->id == $req->Vehicle->brand_id)
                                                        <td>{{ $brand->name }}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{ $req->Vehicle->price_after_offer }} $</td>
                                                <td>{{ $req->start_date }}</td>
                                                <td>{{ $req->end_date }}</td>
                                                <td>
                                                    <a href="{{ route('Accept', [$req->id]) }}"> <button type="button"
                                                            class="btn btn-success waves-effect w-md waves-light m-b-5">Accept</button></a>

                                                    <a href="{{ route('decline', [$req->id]) }}"> <button type="button"
                                                            class="btn btn-danger waves-effect w-md waves-light m-b-5">Decline</button></a>
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

            </div>
            <!-- end row -->

        </div>
    </div>
@endsection
