@extends("layouts.dashboard")
@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="container">



            <div class="row">
                <h3 class="text-center">All Vehicles </h3>
                <div class="col-lg-12">
                    <div class="card-box">
                        @if (count($vehicle) != 0)


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
                                                @foreach ($brands as $brand)

                                                    @if ($brand->id == $car->brand_id)
                                                        <th>{{ $brand->name }}</th>
                                                    @endif
                                                @endforeach
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

                                                @foreach ($offers as $offer)

                                                    @if ($offer->id == $car->special_offer_id)
                                                        <th>{{ $offer->ratio }}%</th>
                                                    @endif
                                                @endforeach

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
                </div><!-- end col -->
            @else
                <div class="text-center , alert alert-danger">
                    <h3> No Data</h3>
                </div>
                @endif
            </div>
            <!-- end row -->




            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="zmdi zmdi-close-circle-o"></i>
                </a>
                <h4 class="___class_+?14___">T`H`E`M`E`L`O`C`K`.`C`O`M`</h4>
                <div class="notification-list nicescroll">
                    <ul class="list-group list-no-border user-list">
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">Michael Zenaty</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-info">
                                    <i class="zmdi zmdi-account"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Signup</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">5 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-pink">
                                    <i class="zmdi zmdi-comment"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Message received</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">James Anderson</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 days ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-warning">
                                    <i class="zmdi zmdi-settings"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">Settings</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->
        @endsection
