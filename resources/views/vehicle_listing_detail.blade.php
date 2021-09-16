@extends('master')
@section('content')

    <!-- start banner Area -->
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Vehicle Details
                    </h1>
                    <p class="text-white link-nav"><a href="/">Home </a> <span class="lnr lnr-arrow-right"></span> <a
                            href="{{ route('vehicle-listing') }}"> Vehicle Listing</a> <span
                            class="lnr lnr-arrow-right"></span> <a href="javascript:void(0)"> Vehicle details</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start item detail Area -->
    <section class="item-detail-area-2 section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-sm-2 post-list blog-post-list-2">
                    <div class="single-post">
                        <!-- Slider -->
                        <div id="slider_05" class="carousel slide thumb_btm_cntr thumb_scroll_x swipe_x ps_ease"
                            data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="1000">


                            <!-- Wrapper For Slides -->
                            <div class="carousel-inner" role="listbox">

                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($gallery as $img)
                                    <!-- First Slide -->
                                    @if ($img->vehicle_id == $vehicle->id)

                                        @if ($i == 1)
                                            <div class="carousel-item active">
                                                <!-- Slide Background -->
                                                <img src="{{ asset('/Uploaded/image') . '/' . $img->image }}"
                                                    alt="{{ asset('item_slider.jpg') }}" />

                                            </div>
                                            @php
                                                $i = $i + 1;
                                            @endphp

                                        @else
                                            <div class="carousel-item">
                                                <!-- Slide Background -->
                                                <img src="{{ asset('/Uploaded/image') . '/' . $img->image }}"
                                                    alt="{{ asset('item_slider.jpg') }}" />

                                            </div>

                                        @endif
                                        <!-- End of Slide -->
                                    @endif
                                @endforeach

                            </div>
                            <!-- End of Wrapper For Slides -->

                        </div>
                        <!-- End Slider -->

                        <div class="content-wrap">
                            @foreach ($brands as $brand)
                                @if ($brand->id == $vehicle->brand_id)
                                    <h2>

                                        About {{ $brand->name }} :

                                    </h2>
                                @endif
                            @endforeach


                            <blockquote class="generic-blockquote mt-3">
                                “{{ $vehicle->description }}”
                            </blockquote>

                        </div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs general">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#info2">Vehicle Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#info1">Features & Options</a>
                            </li>

                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="info" class="container tab-pane active"><br>
                                <h3 class="___class_+?27___">CONSECTETUR ADIPISICING ELIT</h3><br>
                                <p class="___class_+?28___">Temporibus possimus quasi beatae, consectetur adipisicing elit.
                                    Obcaecati unde molestias sunt officiis aliquid sapiente, numquam, porro perspiciatis
                                    neque voluptatem sint hic quam eveniet ad adipisci laudantium corporis ipsam ea!
                                </p><br>
                                <p class="___class_+?29___">Consectetur adipisicing elit. Dicta, amet quia ad debitis fugiat
                                    voluptatem neque dolores tempora iste saepe cupiditate, molestiae iure voluptatibus est
                                    beatae? Culpa, illo a Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi,
                                    doloribus, earum modi consectetur molestias asperiores sequi ipsam neque error itaque
                                    veniam culpa eligendi similique ducimus nulla, blanditiis, perspiciatis atque saepe!
                                    veritatis. </p><br>
                                <p class="___class_+?30___">Adipisicing consectetur elit. Dicta, amet quia ad debitis fugiat
                                    voluptatem neque dolores tempora iste saepe cupiditate, molestiae iure voluptatibus est
                                    beatae? Culpa, illo a Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi,
                                    doloribus, earum modi consectetur molestias asperiores. Adipisicing consectetur elit.
                                    Dicta, amet quia ad debitis fugiat voluptatem neque dolores tempora iste saepe
                                    cupiditate, molestiae iure voluptatibus est beatae? Culpa, illo a Lorem ipsum dolor sit
                                    amet, consectetur adipisicing elit. Commodi, doloribus, earum modi consectetur molestias
                                    asperiores. </p>
                            </div>
                            <div id="info1" class="container tab-pane fade"><br>
                                <h3 class="___class_+?32___">Features</h3><br>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Air Conditioning</th>
                                            <th>Mark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Alloy wheels</th>
                                            <td>Jacob</td>
                                        </tr>
                                        <tr>
                                            <th>Anti-Lock Brakes (ABS)</th>
                                            <td>Larry</td>
                                        </tr>
                                        <tr>
                                            <th>Anti-Theft</th>
                                            <td colspan="1">Jackson</td>
                                        </tr>
                                        <tr>
                                            <th>Anti-Starter</th>
                                            <td colspan="1">Henry</td>
                                        </tr>
                                        <tr>
                                            <th>Alloy Wheels</th>
                                            <td colspan="1">David</td>
                                        </tr>
                                        <tr>
                                            <th>Security System</th>
                                            <td colspan="1">Rock</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="info2" class="container tab-pane fade">
                                <h4>
                                    CONSECTETUR ADIPISICING ELIT
                                </h4>

                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati unde molestias sunt
                                    officiis aliquid sapiente, numquam, porro perspiciatis neque voluptatem sint hic quam
                                    eveniet ad adipisci laudantium corporis ipsam ea!
                                </p><br>

                                <p>
                                    Adipisicing consectetur elit. Dicta, amet quia ad debitis fugiat voluptatem neque
                                    dolores tempora iste saepe cupiditate, molestiae iure voluptatibus est beatae? Culpa,
                                    illo a Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, doloribus,
                                    earum modi consectetur molestias asperiores.
                                </p><br>

                                <p>
                                    Voluptatem adipisicing elit. Dicta, amet quia ad debitis fugiat neque dolores tempora
                                    iste saepe cupiditate, molestiae iure voluptatibus est beatae? Culpa, illo a Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit. Commodi, Lorem ipsum dolor sit amet,
                                    consectetur adipisicing elit. Laudantium nisi eaque maxime totam, iusto accusantium esse
                                    placeat rem at temporibus minus architecto ipsum eveniet. Delectus cum sunt, ea cumque
                                    quas! doloribus, earum modi consectetur molestias asperiores sequi ipsam neque error
                                    itaque veniam culpa eligendi similique ducimus nulla, blanditiis, perspiciatis atque
                                    saepe! veritatis.
                                </p>
                            </div>
                        </div>









                    </div>
                </div>
                <div class="col-lg-3 sidebar-2 order-sm-1">
                    <div class="item-widget">
                        <h1>Car Price</h1>
                        <hr class="line-separator">


                        <div>
                            @if ($vehicle->has_offer == 0)
                                <div class="col-md-12 col-6 pt-1 text-center">
                                    <h3>{{ $vehicle->price }}<small> S.P</small></h3>


                                </div>
                            @else
                                <div class="col-md-12 col-6 pt-1 text-center">
                                    <h3><s> {{ $vehicle->price }}</s><small> S.P</small></h3>
                                    <h2 style="color:red;">{{ $vehicle->price_after_offer }}<small> S.P</small></h2>

                                </div>
                            @endif


                        </div>

                        @auth('client')
                            @if ($vehicle->service_type == 'rent')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success contact btn-block" data-toggle="modal"
                                    data-target="#exampleModalCenter"><i class="lnr lnr-envelope"></i>
                                    Send Rent Request
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenter" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-white" id="exampleModalLongTitle">Buy Request</h4>
                                                <button type="button" class="close text-white" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('rent_request', [$vehicle->id]) }}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Start Date:</label>
                                                        <input required type="date" class="form-control"
                                                            placeholder="Start Date" id="recipient-name" name="start_date">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-email" class="col-form-label">End Date:</label>
                                                        <input required type="date" class="form-control"
                                                            placeholder="End Date:" id="recipient-email" name="end_date">
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Send</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('buy_request', [$vehicle->id]) }}">
                                    <button type="button" class="btn btn-success contact btn-block"
                                        data-target="#exampleModalCenter"><i class="lnr lnr-envelope"></i>
                                        Send Buy Request
                                    </button>
                                </a>

                            @endif

                            <a href="{{ route('add_favourite', [$vehicle->id]) }}" class="btn btn-primary btn-block"><i
                                    class="lnr lnr-heart"></i> Add to Favourites</a>
                            <!-- <a href="" class="btn btn-danger btn-block"> Buy Now!</a> -->
                        @endauth
                    </div>


                    <div class="item-info-widget">
                        <h1>Car Information</h1>
                        <hr class="line-separator">

                        <ul>
                            @foreach ($brands as $brand)
                                @if ($brand->id == $vehicle->brand_id)
                                    <li><a class="justify-content-between align-items-center d-flex">
                                            <h6>Brand:</h6> <span>

                                                {{ $brand->name }}

                                            </span>
                                        </a></li>
                                    <li><a class="justify-content-between align-items-center d-flex">
                                            <h6>Model:</h6> <span>{{ $brand->model }} Series</span>
                                        </a></li>
                                @endif
                            @endforeach
                            <li><a class="justify-content-between align-items-center d-flex">
                                    <h6>Fuel:</h6> <span>{{ $vehicle->fuel }}</span>
                                </a></li>
                            <li><a class="justify-content-between align-items-center d-flex">
                                    <h6>Registration Date:</h6> <span>{{ $vehicle->year }}</span>
                                </a></li>
                            <li><a class="justify-content-between align-items-center d-flex">
                                    <h6>Max Speed:</h6> <span>{{ $vehicle->max_speed }} km/s</span>
                                </a></li>
                            <li><a class="justify-content-between align-items-center d-flex">
                                    <h6>Condition:</h6> <span>{{ $vehicle->status }}</span>
                                </a></li>
                            <li><a class="justify-content-between align-items-center d-flex">
                                    <h6>Exterior Color:</h6> <span>{{ $vehicle->exterior_color }}</span>
                                </a></li>
                            <li><a class="justify-content-between align-items-center d-flex">
                                    <h6>Interior Color:</h6> <span>{{ $vehicle->interior_color }}</span>
                                </a></li>
                            <li><a class="justify-content-between align-items-center d-flex">
                                    <h6>Transmission:</h6> <span>{{ $vehicle->transmission }}</span>
                                </a></li>
                            <li><a class="justify-content-between align-items-center d-flex">
                                    <h6>Engine Force:</h6> <span>{{ $vehicle->engine_force }}</span>
                                </a></li>
                            <li><a class="justify-content-between align-items-center d-flex">
                                    <h6>Origin Country:</h6> <span>{{ $vehicle->origin_country }}</span>
                                </a></li>
                            <li><a class="justify-content-between align-items-center d-flex">
                                    <h6>Service Type:</h6> <span>{{ $vehicle->service_type }}</span>
                                </a></li>
                            <li><a class="justify-content-between align-items-center d-flex">
                                    <h6>Body:</h6> <span>{{ $vehicle->body }}</span>
                                </a></li>
                        </ul>
                    </div>

                    <div class="sale-widget">
                        <ul>
                            <li><a href="#" class="justify-content-between align-items-center d-flex">
                                    <h6><i class="lnr lnr-smile"></i> Total Requests:</h6> <span>37</span>
                                </a></li>
                            <li><a href="#" class="justify-content-between align-items-center d-flex">
                                    <h6><i class="lnr lnr-heart"></i> Favourites:</h6> <span>112</span>
                                </a></li>
                        </ul>

                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- End item detail Area -->

@stop
