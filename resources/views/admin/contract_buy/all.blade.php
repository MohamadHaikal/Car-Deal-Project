@extends("layouts.dashboard")
@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="container">



            <div class="row">
                <h3 class="text-center">Contracts Buy Records </h3>
                <div class="col-lg-12">
                    <div class="card-box">
                        @if (count($contract_buy) != 0)


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
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($contract_buy as $buy)
                                            <tr>
                                                <th scope="row">{{ $buy->id }}</th>
                                                <td>{{ $buy->client->id }}</td>
                                                <td>{{ $buy->client->first_name }}</td>
                                                <td>{{ $buy->client->last_name }}</td>
                                                <td>{{ $buy->Vehicle->id }} </td>
                                                <td>{{ $buy->vehicle->brand->name }}</td>
                                                <td>{{ $buy->Vehicle->price_after_offer }}</td>
                                                <td>{{ $buy->created_at }}</td>


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

        </div>
    </div>
@endsection
