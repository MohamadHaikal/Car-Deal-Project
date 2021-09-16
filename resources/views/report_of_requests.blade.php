@extends('master')
@section('content')


    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Your Previous Request
                    </h1>
                    <p class="text-white link-nav mt-3"><a href="\"> Home </a> <span class="lnr lnr-arrow-right"></span></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start Shopping Cart Area -->
    <section class="cart_area mb-30 pt-120">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="cart_content col-lg-10">
                    <div class="cart-top-border">
                        <h2 class="mb-30">Your Request Table</h2>
                        <div class="progress-table-wrap">
                            <div class="progress-table">
                                <div class="table-head">

                                    <div class="image">Id</div>
                                    <div class="product-details">Status</div>
                                    <div class="price">Date</div>
                                    <div class="quantity">vehicle_ID</div>

                                </div>
                                @foreach ($report as $rep)

                                    <div class="table-row">

                                        <div class="image"> {{ $rep->id }}</div>
                                        <div class="product-details">{{ $rep->status }}</div>
                                        <div class="price">{{ $rep->date }}</div>
                                        <div class="quantity">{{ $rep->vehicle_id }}</div>

                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
