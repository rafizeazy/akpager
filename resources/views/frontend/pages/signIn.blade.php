@extends('frontend.layouts.app')
@section('title', 'Sign In')
@section('content')
    <!-- header area -->
    @include('frontend.includes.headers.headerOne')
    <!-- header area end -->

        <!-- Page Banner Start -->
        <section class="page-banner-area overlay py-250 rpy-120 rel z-1 bgs-cover text-center" style="background-image: url({{ asset('assets/images/backgrounds/banner.jpg') }});">
            <div class="container">
                <div class="banner-inner pt-70 rpt-60 text-white">
                    <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Sign In</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Sign In</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
       
        
        <!-- Sign In Area Start -->
        <section class="sign-in-section py-130 rpy-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10">
                        <div class="sign-in-up-wrapper">
                            <form action="#">
                                <h4 class="form-title">Log In To Your Account</h4>
                                <div class="form-group">
                                    <label for="username"><i class="far fa-user"></i></label>
                                    <input id="username" type="text" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="password"><i class="far fa-lock"></i></label>
                                    <input id="password" type="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <button class="theme-btn w-100" type="submit">Log In</button>
                                </div>
                                <div class="form-note">
                                    <p>New to Akpager? <a href="{{ route('signUp') }}">Sign Up</a></p>
                                </div>
                            </form>
                            <div class="forgot-password">
                                <a href="#">Forgot your password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sign In Area End -->

    <!-- footer area -->
    @include('frontend.includes.footers.footerOne')
    <!-- footer area end -->
@endsection