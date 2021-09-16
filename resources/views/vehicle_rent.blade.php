@extends('master')
@section('content')


    <!-- start banner Area -->
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Vehicle Rent Listing
                    </h1>
                    <p class="text-white link-nav"><a href="\">Home </a> <span class="lnr lnr-arrow-right"></span> <a
                            href="{{ route('vehicle-listing') }}"> Vehicle </a> <span class="lnr lnr-arrow-right"></span>
                        <a href="{{ route('vehicle_rent') }}"> Vehicle rent List</a>
                    </p>
                </div>
            </div>
        </div>
    </section>


    <div class="col-lg-12 post-list blog-post-list">
        <div class="single-post">

            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-40 col-lg-10">
                        <div class="title text-center">
                            <h1 class="mb-10">Our vehicles for rent</h1>
                            <hr class="lines">
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mb-30">
                    @foreach ($vehicles as $vehicle)

                        <div class="col-md-4 col-sm-6 col-12 gp_products_item">
                            <div class="gp_products_inner">
                                <div class="gp_products_item_image">
                                    <a href="#">
                                        @foreach ($gallery as $image)
                                            @if ($image->vehicle_id == $vehicle->id)
                                                <img src="Uploaded/image/{{ $image->image }}" alt="gp product 001" />
                                            @break;
                                        @endif

                    @endforeach
                    </a>
                </div>
                <div class="gp_products_item_caption">
                    <ul class="gp_products_caption_name">

                        <li>
                            @foreach ($brands as $brand)
                                @if ($brand->id == $vehicle->brand_id)
                                    <a>{{ $brand->name }} {{ $brand->model }}</a>
                                @endif
                            @endforeach
                            @if ($vehicle->has_offer == 0)

                                <a href="#" class="pull-right">{{ $vehicle->price }}<span class="mr-1">
                                        S.P</span></a>

                            @else

                                <a href="#" class="pull-right"><s>{{ $vehicle->price }}<span class="mr-1">
                                            S.P</span></a> </s>
                                <br>
                                <a href="#" class="pull-right"
                                    style=" color:red;">{{ $vehicle->price_after_offer }}<span class="mr-1"
                                        style=" color:red;"> S.P</span></a>


                            @endif

                        </li>
                        <li><a href="#">Model {{ $vehicle->year }} , </a>
                            <a href="#" class="___class_+?29___"><i
                                    class="fa fa-map-marker mr-1"></i>{{ $vehicle->origin_country }}</a>
                        </li>
                        <li>
                        <li><a href="#"><i class="fa fa-road mr-1"></i>{{ $vehicle->kilometrage }} Km</a>
                            <a class="ml-2" href="#"><i
                                    class="fa fa-tachometer mr-1"></i>{{ $vehicle->max_speed }} Miles</a>
                            <a class="ml-2" href="#"><i class="fa fa-car mr-1"></i>{{ $vehicle->fuel }}</a>
                            <a class="ml-2" href="#"> <span class="label label-danger"
                                    style=" font-size: 10px;">{{ $vehicle->status }}</span></a>

                        </li>
                    </ul>
                    <ul class="gp_products_caption_rating mt-2">
                        <li class="___class_+?39___"><a class="___class_+?40___"
                                href="{{ route('vehicle-listing-detail', [$vehicle->id]) }}">book now</a></li>
                        <li class="pull-right"><i class="fa fa-star-half-o"></i></li>
                        <li class="pull-right"><i class="fa fa-star"></i></li>
                        <li class="pull-right"><i class="fa fa-star"></i></li>
                        <li class="pull-right"><i class="fa fa-star"></i></li>
                        <li class="pull-right"><i class="fa fa-star"></i></li>

                    </ul>
                </div>
            </div>
        </div>

        @endforeach


    </div>
    </section>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-30">
            <nav aria-label="...">
                <ul class="pagination justify-content-center">
                    {{ $vehicles->links() }}
                </ul>
            </nav>
        </div>
    </div>

    </div>
    </div>
    </div>
    </div>

    <!-- End item detail Area -->


@stop
