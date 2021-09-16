@extends('master')
@section('content')


    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Change Password
                    </h1>
                    <p class="text-white link-nav"><a href="/">Home </a> <span class="lnr lnr-arrow-right"></span> <a
                            href="javascript:void(0);"> Change Password</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start post Area -->
    <section class="post-area section-full">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-3 sidebar">
                    <div class="single-slidebar-profile">
                        <figure>
                            <a href="#" class="employer-dashboard-thumb"><img src="img/avatar_15.jpg" alt=""></a>
                            <figcaption>
                                <h2>Hellan Rebecca</h2>
                                <p>Super Samurai Hyundai Los Angeles, Usa</p>
                                <ul class="share_link">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                </ul>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="single-slidebar">

                        <ul class="cat-list">
                            <li><a class="justify-content-between d-flex text_active" href="user_profile.html">
                                    <p><i class="fa fa-user-o pr-2"></i> User Profile</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="upload_products.html">
                                    <p><i class="fa fa-file-word-o pr-2"></i> Upload Products</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="manage_products.html">
                                    <p><i class="fa fa-heart-o pr-2"></i> Manage Products</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="product_notification.html">
                                    <p><i class="fa fa-briefcase pr-2"></i> Notifications</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="product_message.html">
                                    <p><i class="fa fa-bell-o pr-2"></i> Messages</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="favourite_products.html">
                                    <p><i class="fa fa-id-card-o pr-2"></i> Favourite Products</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="withdraw.html">
                                    <p><i class="fa fa-money pr-2"></i> Withdraws</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex text-active" href="change_password.html">
                                    <p><i class="fa fa-lock pr-2"></i> Change Password</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="index.html">
                                    <p><i class="fa fa-sign-out pr-2"></i> Logout</p>
                                </a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-9 post-list">
                    <div class="profile_job_content col-lg-12">
                        <div class="headline">
                            <h3> Change Password</h3>
                        </div>
                        <div class="profile_job_detail">
                            <div class="row">
                                <div class="col-md-12 col-sm-6">
                                    <div class="submit-field">
                                        <h5>Old Password *</h5>
                                        <input class="form-control" type="Password">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="submit-field">
                                        <h5>New Password *</h5>
                                        <input class="form-control" type="Password">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="submit-field">
                                        <h5>Confirm New Password *</h5>
                                        <input class="form-control" type="Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="profile_job_content col-lg-12 mt-5">
                        <div class="headline">
                            <h3>Secuirty Questions</h3>
                        </div>
                        <div class="profile_job_detail">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="submit-field">
                                        <h5>Question No1 :</h5>
                                        <select class="form-control">
                                            <option>What is your Mother Name?</option>
                                            <option>What is your Father Name?</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="submit-field">
                                        <h5>Answer :</h5>
                                        <input class="form-control" type="text" placeholder="Julia C">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="submit-field">
                                        <h5>Question No2 :</h5>
                                        <select class="form-control">
                                            <option>Your place of Birth?</option>
                                            <option>Your place of Birth?</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="submit-field">
                                        <h5>Answer :</h5>
                                        <input class="form-control" type="text" placeholder="London">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="submit-field">
                                        <h5>Question No3 :</h5>
                                        <select class="form-control">
                                            <option>Your favorite Teacher Name?</option>
                                            <option>Your favorite Teacher Name?</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="submit-field">
                                        <h5>Answer :</h5>
                                        <input class="form-control" type="text" placeholder="Ms.Angelina">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add_job_btn col-lg-12 mt-5">
                        <div class="submit-field">
                            <button type="submit" class="job_detail_btn">Update Password</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End post Area -->

@stop
