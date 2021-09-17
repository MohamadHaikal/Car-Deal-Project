<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <!-- Author Meta -->
    <meta name="author" content="">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Car-Deal</title>
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Mina') }}" rel="stylesheet">
    <!-- CSS ============================================= -->
    <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carousel_advance.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rangeslider.css') }}">
    <!-- App CSS -->

    <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/menu.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <!--======= Responsive Bootstrap Carousel StyleSheet =========-->
    <link href="{{ asset('css/testimonial_speech_bubble_border_carousel.css') }}" rel="stylesheet" media="all">
</head>

<body>

    <!-- #header Start-->
    <header id="header">
        <div class="header-top bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-xs-12 hide_column">
                        <div class="header-top-menu">

                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-xs-12 ">
                        <div class="header-top-right text-right">
                            <ul class="account">
                                @guest

                                    <li><a href="{{ route('login') }}" style="color:red;">Signin Page</a></li>
                                    <li><a href="{{ route('register') }}" style="color:red;">Signup Page</a></li>

                                @endguest

                                @auth('client')


                                    <li>
                                        <a href="#">
                                            <img src="{{ asset('img/boogyman.png') }}" alt="">
                                            @guest
                                                <span> ccc <i class="fa fa-angle-down"> </i></span>
                                            @endguest

                                            @auth('client')
                                                <span> {{ Auth::guard('client')->user()->first_name }} <i
                                                        class="fa fa-angle-down"> </i></span>
                                            @endauth


                                        </a>
                                        <ul class="profile">
                                            {{-- <li><a href="{{ route('user-profile') }}">User Profile</a></li> --}}
                                            <li><a href="{{ route('favourite-car') }}">Favourite Car</a></li>
                                            {{-- <li><a href="{{ route('change-password') }}">Change Password</a></li> --}}
                                            <li><a href="{{ route('logout') }}">Sign Out</a></li>
                                        </ul>
                                    </li>
                                @endauth

                            </ul>
                            @auth('client')


                                <ul class="notification_icons">

                                    <li>
                                        <a href="{{ route('report_of_requests') }}">
                                            <i class="fa fa-shopping-basket"></i>
                                        </a>
                                    </li>

                                </ul>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="row align-items-center d-flex">
                    <div class="col-lg-2 col-md-2">
                        <div id="logo">
                            <a class="logo"><span style="color:black; font-size: 45px;">Car<span
                                        style="color:red;">Deal</span></span><i class="zmdi zmdi-layers"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-2">
                        <nav id="nav-menu-container">
                            <ul class="nav-menu float-right">
                                <li class="menu-has-children"><a href="{{ route('hom') }}">Home</a>
                                </li>


                                <li class="menu-has-children"><a href="javascript:void(0);">Car Listing</a>
                                    <ul>
                                        <li><a href="{{ route('vehicle_buy') }}">Buy List</a></li>
                                        <li><a href="{{ route('vehicle_rent') }}">Rent List</a></li>

                                    </ul>
                                </li>
                                <li class="menu-has-children"><a href="javascript:void(0);">Special Offer Listing</a>
                                    <ul>
                                        <li><a href="{{ route('special_buy') }}">Buy List</a></li>
                                        <li><a href="{{ route('special_rent') }}">Rent List</a></li>
                                    </ul>
                                </li>

                                <li class="menu-has-children"><a href="{{ route('about-us') }}">About</a>
                                </li>
                                <li><a href="{{ route('terms-and-conditions') }}">Terms & Conditions</a></li>
                            </ul>



                        </nav>
                        <!-- #nav-menu-container -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- #header -->



    @yield('content')

    <!-- start footer Area -->
    <footer class="footer-area footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-6">
                    <div class="single-footer-widget newsletter">
                        <img class="w-50 img-fluid mb-3" src="{{ asset('img/logo.png') }}" alt="">
                        <p>We provide everything you need to build an amazing dealership website developed especially
                            for car sellers dealers or auto motor retailers.</p>
                        <ul class="social-footer">
                            <li><a class="facebook" href="javascript:void(0);"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a class="twitter" href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a class="linkedin" href="javascript:void(0);"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li><a class="google-plus" href="javascript:void(0);"><i
                                        class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Useful Links</h6>
                        <ul class="footer-nav">
                            <li><a href="{{ route('login') }}">LogIn</a></li>
                            <li><a href="{{ route('register') }}">signUp</a></li>
                            <li><a href="{{ route('change-password') }}">Change</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>


                        </ul>
                    </div>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Our Service</h6>
                        <ul class="footer-nav">
                            <li><a href="{{ route('about-us') }}">About Us</a></li>
                            <li><a href="{{ route('terms-and-conditions') }}">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">Keep In Touch</h6>
                        <ul class="footer-nav">
                            <li>
                                <strong><i class="fa fa-map-marker"></i></strong><span class="pl-2">IT
                                    Engineering, Damascus, Syria</span>
                            </li>
                            <li>
                                <strong><i class="fa fa-mobile"></i></strong><span class="pl-2">+963
                                    938045918</span>
                            </li>

                            <li>
                                <strong><i class="fa fa-envelope-o"></i></strong><span class="pl-2"><a
                                        href="javascript:void(0);">mohamadmhaikal@gmail.com</a></span>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="bottom_footer_info">
                        <p> &copy; Copyright 2021. All rights reserved</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="bottom_footer_logo">
                        <ul class="list-inline">

                            <li class="list-inline-item">
                                <a href="{{ route('terms-and-conditions') }}">Terms And Condition &nbsp;|</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('about-us') }}">About Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End footer Area -->

    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js') }}"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA') }}">
    </script>
    <script src="{{ asset('js/easing.min.js') }}"></script>
    <script src="{{ asset('js/hoverIntent.js') }}"></script>
    <!--======= Touch Swipe =========-->
    <script src="{{ asset('js/jquery.touchSwipe.min.js') }}"></script>
    <!--======= Customize =========-->
    <script src="{{ asset('js/responsive_bootstrap_carousel.js') }}"></script>
    <script src="{{ asset('js/superfish.min.js') }}"></script>
    <script src="{{ asset('js/rangeslider.js') }}"></script>
    <script src="{{ asset('js/rangeslider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/parallax.min.js') }}"></script>
    <script src="{{ asset('js/mail-script.js') }}"></script>
    <script src="{{ asset('js/jquery.touchSwipe.min.js') }}"></script>
    <script src="{{ asset('js/responsive_bootstrap_carousel.js') }}"></script>
    <script src="{{ asset('js/paradise_slider_min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
