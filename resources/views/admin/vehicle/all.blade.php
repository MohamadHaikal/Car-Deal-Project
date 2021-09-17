@extends("layouts.dashboard")
@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <h3 class="text-center">All Vehicles </h3>
                <div class="col-lg-12">
                    <div class="card-box">
                        <div class="table-responsive">
                            <table class="table table-striped " id="datatable-editable">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Brand</th>
                                        <th>Year</th>
                                        <th>Price</th>
                                        <th>Fule</th>
                                        <th>Bodie</th>
                                        <th>MaxSpeed</th>
                                        <th>Transmission</th>
                                        <th>Kilometrage</th>
                                        <th>InColor</th>
                                        <th>ExColor</th>
                                        <th>Country</th>
                                        <th>Status</th>
                                        <th>EngineForce</th>
                                        <th>Description</th>
                                        <th>isAvailable</th>
                                        <th>HasOffer</th>
                                        <th>SpecialOffer</th>
                                        <th>ServiceType</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vehicle as $car)
                                        <tr>
                                            <th>{{ $car->id }}</th>
                                            <th>{{ $car->brand->name }}</th>
                                            <th>{{ $car->year }}</th>
                                            <th>{{ $car->price }}</th>
                                            <th>{{ $car->fuel }}</th>
                                            <th>{{ $car->body }}</th>
                                            <th>{{ $car->max_speed }}</th>
                                            <th>{{ $car->transmission }}</th>
                                            <th>{{ $car->kilometrage }}</th>
                                            <th>{{ $car->interior_color }}</th>
                                            <th>{{ $car->exterior_color }}</th>
                                            <th>{{ $car->origin_country }}</th>
                                            <th>{{ $car->status }}</th>
                                            <th>{{ $car->engine_force }}</th>
                                            <th>{{ $car->description }}</th>
                                            @if ($car->is_available == 0)
                                                <th>false</th>
                                            @else
                                                <th>true</th>
                                            @endif

                                            @if ($car->has_offer == 0)
                                                <th>false</th>
                                            @else
                                                <th>true</th>
                                            @endif


                                            <th>{{ $car->SpecialOffer->ratio }}%</th>

                                            <th>{{ $car->service_type }}</th>
                                            <td>
                                                <a href="{{ route('edit-vehicle', [$car->id]) }}"> <button type="button"
                                                        class="btn btn-success waves-effect w-md waves-light m-b-5">Update</button></a>
                                                <a href="{{ route('delete-vehicle', [$car->id]) }}"> <button
                                                        type="button"
                                                        class="btn btn-danger waves-effect w-md waves-light m-b-5">Delete</button></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-lg-12 col-md-12 col-sm-12 mt-30">

                            <ul class="pagination justify-content-center">
                                {{ $vehicle->links() }}
                            </ul>

                        </div>
                    </div>
                </div><!-- end col -->

            </div>
        </div>
    </div>
@endsection
