@extends('master')
@section('content')

    <!-- start banner Area -->
    <div class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="banner-content col-lg-10">
                    <h1 class="text-white">
                        Buy your new car or used car.
                    </h1>
                    <p class="text-capitalize">We Have more than a thousand cars for you to choose</p>

                </div>
            </div>
        </div>
    </div>
    <!-- End banner Area -->
    <div class="banner_form">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-12">
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post"
                        action="{{ route('search') }}">
                        @csrf
                        <div class="banner_content rounded">
                            <h3 class="text-capitalize text-white mb-3">Find Your Dream Car</h3>
                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">


                                        <div class="col-lg-3 col-md-3 col-sm-6 mb-3">
                                            <select class="form-control-lg" name="brand_id">
                                                <option>Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 mb-3">
                                            <select class="form-control-lg" name="year">

                                                <option>Year Of Model</option>
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                                <option value="2019">2019</option>
                                                <option value="2018">2018</option>
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                                <option value="2015">2015</option>
                                                <option value="2014">2014</option>
                                                <option value="2013">2013</option>
                                                <option value="2012">2012</option>
                                                <option value="2011">2011</option>
                                                <option value="2010">2010</option>
                                                <option value="2009">2009</option>
                                                <option value="2008">2008</option>
                                                <option value="2007">2007</option>
                                                <option value="2006">2006</option>
                                                <option value="2005">2005</option>
                                                <option value="2004">2004</option>
                                                <option value="2003">2003</option>
                                                <option value="2002">2002</option>
                                                <option value="2001">2001</option>
                                                <option value="2000">2000</option>
                                                <option value="1999">1999</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 mb-3">
                                            <select class="form-control-lg mb-3" name="status">
                                                <option>Type Of Car</option>
                                                <option value="NEW">New Car</option>
                                                <option value="USED">Used Car</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 mb-3">
                                            <select class="form-control-lg mb-3" name="service">
                                                <option>Type Of Service</option>
                                                <option value="buy">Buy</option>
                                                <option value="rent">Rent</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-8 col-md-6 col-sm-12">
                                            <h4 class="mb-3 text-white">Price Range</h4>
                                            <div class="demo">
                                                <div class="range-slider">
                                                    <input type="range" value="0" min="0" max="1000000" range="true"
                                                        name="rang_price">
                                                    <span class="range-value"> 0 S.P</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-1 col-md-6 col-sm-6">
                                        </div>

                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="section_search">
                                                <button type="submit" class="btn btn-block btn-lg bg-dark text-white "><i
                                                        class="mr-3 fa fa-search"></i><span>Search Car</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <section id="welcome" class="section-full">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="section_heading">
                        <h3>Welcome To Car Deal</h3>
                        <h4>* Build Your Deal</h4>
                        <h4>* Create a personalized deal</h4>
                        <h4>* Buy a Car</h4>
                        <h4>* Rent a Car</h4>
                        <h4>* evaluate your trade-in – all online</h4>
                        <h4>* Choose Your Favourite Cars</h4>
                        <h4>* You can search all kind of Cars</h4>

                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12">
                    <div class="section_image mt-5">
                        <img class="img-fluid" src="img/welcome/welcome1.png" alt="">
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-lg-6 col-md-6 col-sm-6 mb">
                    <a href="{{ route('vehicle-listing') }}">
                        <div class="section_service text-center">
                            <div class="section_image">
                                <img class="img-fluid w-25" src="img/welcome/vehicle1.png" alt="">
                            </div>
                            <div class="section_content">
                                <h3 class="text-capitalize">Our vehicles</h3>
                            </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 mb">
                <a href="{{ route('special_offer') }}">
                    <div class="section_service text-center">
                        <div class="section_image">
                            <img class="img-fluid w-25" src="img/welcome/discount.png" alt="">
                        </div>
                        <div class="section_content">
                            <h3 class="text-capitalize">special offers cars</h3>
                        </div>

                    </div>
                </a>
            </div>




        </div>
        </div>
    </section>



    <!-- Start callto-action Area -->
    <section class="callto-action-area" id="join">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <span class="promo-icon"><img class="img-fluid" src="img/cta/medal.png" alt=""></span>
                        <h3 class="promo-heading">Top Dealer Award</h3>
                        <p>Luxury car made BY professionals with 5 years of work experience.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <span class="promo-icon"><img class="img-fluid" src="img/cta/award.png" alt=""></span>
                        <h3 class="promo-heading">Best Selling Dealer</h3>
                        <p>Our Customer Services Managers will always help you.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <span class="promo-icon"><img class="img-fluid" src="img/cta/award-2.png" alt=""></span>
                        <h3 class="promo-heading">Best Customer Service</h3>
                        <p>In case you are not satisfied with the purchased product, we’ll change it.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <span class="promo-icon"><img class="img-fluid" src="img/cta/award-3.png" alt=""></span>
                        <h3 class="promo-heading">Best Dealer Award</h3>
                        <p>We have a Rank in the industry and got high awards.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End calto-action Area -->

    <!-- start Our Services Area -->
    <section class="our_services section-full">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-40 col-lg-10">
                    <div class="title text-center">
                        <h1 class="mb-10">Our Services</h1>
                        <hr class="lines">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                    <div class="service_item">
                        <div class="section_icon">
                            <i class="fa fa-car fa-2x"></i>
                        </div>
                        <div class="service_item_content">
                            <h3>All Brands</h3>
                            <p>We have a variety group of all brands and logo galley of type and car.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                    <div class="service_item">
                        <div class="section_icon">
                            <i class="fa fa-comments fa-2x"></i>
                        </div>
                        <div class="service_item_content">
                            <h3>Free Support</h3>
                            <p>You Can contact with Admin by Info in the below and we will contact with you.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                    <div class="service_item">
                        <div class="section_icon">
                            <i class="fa fa-key fa-2x"></i>
                        </div>
                        <div class="service_item_content">
                            <h3>DealerShip</h3>
                            <p>We present deal and Comunication between seler and customer who want to buy.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                    <div class="service_item">
                        <div class="section_icon">
                            <i class="fa fa-money fa-2x"></i>
                        </div>
                        <div class="service_item_content">
                            <h3>Transmission</h3>
                            <p>We provid all new kind of trasmission models like Hybrid and Electric cars.</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- End Our Services Area -->


@stop
