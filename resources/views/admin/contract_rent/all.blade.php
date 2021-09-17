@extends("layouts.dashboard")
@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <h3 class="text-center">Contracts Rent Records </h3>
                <div class="col-lg-12">
                    <div class="card-box">

                        @if (count($contract_rent) != 0)


                            <div class="table-responsive">
                                <table class="table table-striped " id="datatable-editable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>clients ID</th>
                                            <th>FirstName</th>
                                            <th>LastName</th>
                                            <th>Vehicle ID</th>
                                            <th>Vehicle Brand</th>
                                            <th>Price</th>
                                            <th>StartDate</th>
                                            <th>EndDate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contract_rent as $rent)

                                            <tr>
                                                <th scope="row">{{ $rent->id }}</th>
                                                <td>{{ $rent->client->id }}</td>
                                                <td>{{ $rent->client->first_name }}</td>
                                                <td>{{ $rent->client->last_name }}</td>
                                                <td>{{ $rent->Vehicle->id }} </td>
                                                <td>{{ $rent->vehicle->brand->name }}</td>
                                                <td>{{ $rent->Vehicle->price_after_offer }}</td>
                                                <td>{{ $rent->start_date }}</td>
                                                <td>{{ $rent->end_date }}</td>


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
