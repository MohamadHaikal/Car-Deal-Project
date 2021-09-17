@extends("layouts.dashboard")
@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <h3 class="text-center">Log Record </h3>
                <div class="col-lg-12">
                    <div class="card-box">
                        @if (count($logs) != 0)


                            <div class="table-responsive">
                                <table class="table table-striped " id="datatable-editable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Action</th>
                                            <th>Vehicle Id</th>
                                            <th>Vehicle Brand</th>
                                            <th>User Id </th>
                                            <th>UserName</th>
                                            <th>Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($logs as $log)
                                            <tr>
                                                <th scope="row">{{ $log->id }}</th>
                                                <td>{{ $log->action }}</td>
                                                <td>{{ $log->vehicle_id }}</td>
                                                <td>{{ $log->vehicle->brand->name }}</td>
                                                <td>{{ $log->client_id }} </td>
                                                <td>{{ $log->client->username }}</td>
                                                <td>{{ $log->date }}</td>
                                            </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-30">
                                        <nav aria-label="...">
                                            <ul class="text-center">
                                                {{ $logs->links() }}
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
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
