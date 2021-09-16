@extends('master')
@section('content')


    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        User Profile
                    </h1>
                    <p class="text-white link-nav"><a href="/">Home </a> <span class="lnr lnr-arrow-right"></span> <a
                            href="javascript:void(0);"> User Profile</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start post Area -->
    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-3 sidebar">
                    <div class="single-slidebar-profile">
                        <figure>
                            <a href="#" class="employer-dashboard-thumb"><img src="img/avatar_15.jpg" alt=""></a>
                            <figcaption>
                                <h2>Reem Kh</h2>
                                <p>Super Samurai Hyundai Damascus, Syria</p>
                                <ul class="share_link">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                </ul>
                            </figcaption>
                        </figure>
                    </div>


                </div>
                <div class="col-lg-9 post-list">
                    <div class="profile_job_content col-lg-12">
                        <div class="headline">
                            <h3> Welcome User</h3>
                        </div>
                        <div class="profile_job_detail">
                            <div class="row">

                                <div class="col-md-6 col-sm-6">
                                    <div class="submit-field">
                                        <h5>Account Name *</h5>
                                        <input class="form-control" type="text" placeholder="Account Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="submit-field">
                                        <h5>Website *</h5>
                                        <input class="form-control" type="text" placeholder="website name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="submit-field">
                                        <h5>New Password *</h5>
                                        <input class="form-control" type="password" placeholder="new password">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="submit-field">
                                        <h5>Confirm Password *</h5>
                                        <input class="form-control" type="password" placeholder="confirm password">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <div class="submit-field">
                                        <h5>Email *</h5>
                                        <input class="form-control" type="email" placeholder="example@example.com">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="submit-field">
                                        <h5>Profile Image *</h5>
                                        <div class="careerfy-fileUpload">
                                            <span class="clr_b"><i class="fa fa-plus careerfy-add"></i> Upload
                                                Photo</span>
                                            <input type="file" class="careerfy-upload">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="submit-field">
                                        <h5>Country *</h5>
                                        <select class="form-control">
                                            <option>Select Country</option>
                                            <option>China</option>
                                            <option>Srilanka</option>
                                            <option>Bangladesh</option>
                                            <option>Pakistan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="submit-field">
                                        <h5>Description *</h5>
                                        <textarea class="form-control" rows="5"
                                            placeholder="Nulla bibendum commodo rhoncus. Sed mattis magna nunc, ac varius quam pharetra vitae. Praesent vitae ipsum eu magna pretium aliquam. Curabitur interdum quis velit non tincidunt.Donec pretium gravida erat, a faucibus velit egestas eget."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="add_job_btn col-lg-12 mt-5">
                        <div class="submit-field">
                            <button type="submit" class="job_detail_btn">Submit</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- End post Area -->

@stop
