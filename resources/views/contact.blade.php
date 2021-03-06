@extends('master')
@section('content')


    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Contact Us
                    </h1>
                    <p class="text-white"><a href="/">Home </a> <span class="lnr lnr-arrow-right"></span> <a
                            href="javascript:void(0);"> Contact Us</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start contact-page Area -->
    <section class="contact-page-area section-full">
        <div class="container">
            <div class="row">
                <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>
                <div class="col-lg-4 col-md-6 d-flex flex-column">
                    <a class="contact-btns" href="about-us.html">About Company</a>
                    <a class="contact-btns" href="sell_an_item.html">Sell Cars</a>
                    <a class="contact-btns" href="signup.html">Create New Account</a>
                </div>
                <div class="col-lg-8">
                    <form class="form-area contact-form text-right" id="myForm" action="mail.php" method="post">
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control"
                                    required="" type="text">

                                <input name="email" placeholder="Enter email address"
                                    pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"
                                    class="common-input mb-20 form-control" required="" type="email">

                                <input name="subject" placeholder="Enter your subject" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control"
                                    required="" type="text">
                                <textarea class="common-textarea mt-10 form-control" name="message" placeholder="Messege"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
                                    required=""></textarea>
                                <button class="primary-btn mt-20 text-white" style="float: right;">Send Message</button>
                                <div class="mt-20 alert-msg" style="text-align: left;"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End contact-page Area -->


@stop
