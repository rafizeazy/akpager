@extends('frontend.layouts.app')
@section('title', '404')
@section('content')
    <!-- header area -->
    @include('frontend.includes.headers.headerTwo')
    <!-- header area end -->

           <!-- 404 Error Area Start -->
        <section class="error-area py-150 rpy-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7">
                       <div class="error-content mt-80 rmt-60">
                            <div class="image" data-aos="zoom-in-up" data-aos-duration="1500" data-aos-offset="50">
                                <img src="{{ asset('/assets/images/Others/404-error.png') }}" alt="404 Error">
                            </div>
                            <h1 data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Page not found</h1>
                            <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">It looks like you've ventured into uncharted territory. The page you were looking for may have been moved, deleted, or never existed in the first place. But don't worry, you're not lost for long.</p>
                            <form class="newsletter-form style-three" action="#" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                                <label for="search"><i class="far fa-search fa-fw"></i></label>
                                <input id="search" type="search" placeholder="Search" required="">
                                <button type="submit">Search <i class="far fa-arrow-right"></i></button>
                            </form>
                       </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- 404 Error Area End -->

    <!-- footer area -->
    @include('frontend.includes.footers.footerOne')
    <!-- footer area end -->
@endsection
