@extends('frontend.layouts.app')
@section('title', 'Services')
@section('content')
    <!-- header area -->
    @include('frontend.includes.headers.headerOne')
    <!-- header area end -->

        <!-- Page Banner Start -->
        <section class="page-banner-area overlay py-250 rpy-120 rel z-1 bgs-cover text-center" style="background-image: url({{ asset('assets/images/hero.png') }});">
            <div class="container">
                <div class="banner-inner pt-70 rpt-60 text-white">
                    <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Our Services</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Our Services</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
       
        <!-- Feature box Area Start -->
        <section class="feature-box-area pb-90 rpb-70 rel z-1" style="margin-top: 40px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="section-title text-center mb-55" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Powerful approach to project planning and creation</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="iconic-box style-seven">
                            <div class="icon">
                                <i class="fal fa-atom-alt"></i>
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('serviceDetails') }}">SMT Auto Soldering</a></h5>
                                <p>PCB Design, SMT Auto Insert, Manual Soldering, Assembling and Function Testing</p>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/iconic-box-seven-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                        <div class="iconic-box style-seven">
                            <div class="icon">
                                <i class="fal fa-rocket-launch"></i>
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('serviceDetails') }}">IT Product</a></h5>
                                <p>Develop Custom desktop, mobile or web application that can solve customer requirements</p>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/iconic-box-seven-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                        <div class="iconic-box style-seven">
                            <div class="icon">
                                <i class="far fa-bullseye-pointer"></i>
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('serviceDetails') }}">IoT Product</a></h5>
                                <p>Develop IoT solutions that connect devices and enable smart functionalities.</p>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/iconic-box-seven-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="iconic-box style-seven">
                            <div class="icon">
                                <i class="far fa-anchor"></i>
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('serviceDetails') }}">IT Support Solutions</a></h5>
                                <p>Comprehensive IT support services to ensure your systems run smoothly.</p>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/iconic-box-seven-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                        <div class="iconic-box style-seven">
                            <div class="icon">
                                <i class="far fa-layer-group"></i>
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('serviceDetails') }}">Custom Software Development</a></h5>
                                <p>Develop tailored software solutions to meet your business needs.</p>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/iconic-box-seven-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                        <div class="iconic-box style-seven">
                            <div class="icon">
                                <i class="far fa-shield-check"></i>
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('serviceDetails') }}">Vulnerability Assessment</a></h5>
                                <p>Identify and mitigate security vulnerabilities in your systems.</p>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/iconic-box-seven-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Feature box Area End -->
        
        
        
        
        <!-- Client Logos Area Start -->
        <section class="client-logo-area-two pt-130 rpt-100 pb-95 rpb-65">
            <div class="section-title text-center mb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <h4><span>Our</span> Partners across Indonesia</h4>
            </div>
            <div class="container">
                <div class="row justify-content-center row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2">
                    <div class="col">
                        <div class="client-logo-item style-three" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-1.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-2.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-3.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="{{ asset('/assets/images/partners/maxwell.jpeg') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-4.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="client-logo-item style-three" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-5.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-6.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-7.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-8.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-9.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Client Logos Area End -->

    <!-- footer area -->
    @include('frontend.includes.footers.footerOne')
    <!-- footer area end -->
@endsection