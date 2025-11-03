@extends('frontend.layouts.app')
@section('title', 'About')
@section('css')
<style>
    /* Custom styling for client logos to maintain original colors */
    .client-logo-area-two .client-logo-item.style-three {
        background: rgba(255, 255, 255, 0.95);
        border: 1.2px solid rgba(255, 255, 255, 0.2);
        padding: 20px;
        transition: all 0.3s ease;
    }
    
    .client-logo-area-two .client-logo-item.style-three:hover {
        background: #ffffff;
        transform: translateY(-5px);
        box-shadow: 0px 15px 40px rgba(0, 0, 0, 0.2);
    }
    
    .client-logo-area-two .client-logo-item img {
        filter: none !important;
        max-width: 100%;
        height: auto;
    }
</style>
@endsection
@section('content')
    <!-- header area -->
    @include('frontend.includes.headers.headerOne')
    <!-- header area end -->

    <!-- Page Banner Start -->
        <section class="page-banner-area overlay py-250 rpy-120 rel z-1 bgs-cover text-center" style="background-image: url({{ asset('assets/images/hero.png') }});">
            <div class="container">
                <div class="banner-inner pt-70 rpt-60 text-white">
                    <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">About PT Smartplus Indonesia</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">About PT Smartplus Indonesia</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
       
        
        <!-- About Area Start -->
        <section class="about-area py-90 rpy-60">
            <div class="container">
                <div class="row gap-90 align-items-center">
                    <div class="col-lg-6">
                        <div class="about-content mt-40 rmt-15" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title mb-30">
                                <h2>PT Smartplus Indonesia - Leading IoT Solutions Provider</h2>
                            </div>
                            <p>PT Smartplus Indonesia is a pioneering company in IoT solutions and smart manufacturing technologies. We specialize in SMT Auto Soldering, innovative IoT products, and comprehensive IT support services. Our mission is to empower Indonesian businesses with cutting-edge technology that drives efficiency, connectivity, and innovation in the Industry 4.0 era</p>
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row pt-30">
                                <div class="col-sm-6">
                                    <div class="counter-item counter-text-wrap counted">
                                        <span class="count-text percent" data-speed="3000" data-stop="95">95</span>
                                        <h5 class="counter-title">SMT & IoT Integration</h5>
                                        <div class="text">Advanced surface mount technology and IoT device integration</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="counter-item counter-text-wrap counted">
                                        <span class="count-text percent" data-speed="3000" data-stop="85">85</span>
                                        <h5 class="counter-title">IT Support Solutions</h5>
                                        <div class="text">Comprehensive IT infrastructure and technical support services</div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Area End -->
        
        
        <!-- Features Area Start -->
        <section class="about-features-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
                        <div class="iconic-box style-seven border">
                            <div class="icon-title">
                                <i class="far fa-cloud-upload"></i>
                                <h5><a href="{{ route('serviceDetails') }}">IoT Connectivity</a></h5>
                            </div>
                            <div class="content">
                                <p>Real-time IoT device monitoring and cloud-based data management solutions</p>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/iconic-box-seven-bg2.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                        <div class="iconic-box style-seven border">
                            <div class="icon-title">
                                <i class="far fa-bullseye-arrow"></i>
                                <h5><a href="{{ route('serviceDetails') }}">Smart Manufacturing</a></h5>
                            </div>
                            <div class="content">
                                <p>Advanced SMT Auto Soldering and automated manufacturing technologies</p>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/iconic-box-seven-bg2.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
                        <div class="iconic-box style-seven border">
                            <div class="icon-title">
                                <i class="far fa-layer-group"></i>
                                <h5><a href="{{ route('serviceDetails') }}">IT Solutions</a></h5>
                            </div>
                            <div class="content">
                                <p>Comprehensive IT infrastructure, support, and custom software solutions</p>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/iconic-box-seven-bg2.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Features Area End -->
        
        
        <!-- Data Analytics Area Start -->
        <section class="data-analytics-area pt-60 rpt-30 pb-90 rpb-60">
            <div class="container">
                <div class="row gap-110 align-items-center">
                    <div class="section-title mb-30 text-center" style="padding-top: 10px;">
                                <h2>IoT-Driven Smart Solutions for Modern Industry</h2>
                            </div>
                            <p>Transform your business operations with our IoT-enabled devices and smart manufacturing solutions. PT Smartplus Indonesia provides end-to-end integration of cutting-edge technologies that connect, monitor, and optimize your industrial processes</p>
                    <div class="col-lg-6">
                        <div class="data-analytics-content mt-40 rmb-20" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <ul class="icon-list style-two">
                                <li><i class="fal fa-check"></i> Real-time monitoring and analytics for all connected devices</li>
                                <li><i class="fal fa-check"></i> Seamless integration with existing manufacturing systems</li>
                            </ul>
                            <a href="#" class="theme-btn style-four mt-50">Learn More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Data Analytics Area End -->
        
        
        <!-- CTA Area Start -->
        <section class="cta-area bgs-cover py-130 rpy-100" style="background-image: url({{ asset('assets/images/backgrounds/compare.jpg') }});">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-6 col-lg-8">
                        <div class="cta-content text-white rmb-35" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title mb-40">
                                <span class="subtitle d-block mb-10">IoT Solutions</span>
                                <h2>Ready to Transform Your Business with Smart IoT Solutions?</h2>
                            </div>
                            <a href="{{ route('contact') }}" class="theme-btn">Contact Us <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cta-btn text-lg-center text-start ps-lg-0 ps-2" data-aos="zoom-in-right" data-aos-duration="1500">
                            <a href="https://www.youtube.com/watch?v=9Y7ma241N8k" class="mfp-iframe video-play"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA Area End -->
        
        
        
        <!-- Team Area Start -->
        <section class="team-area pt-130 rpt-100 pb-85 rpb-55">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="section-title text-center mb-55" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Let’s Meet Our Professionals Team Members</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="team-member" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/team/member1.png') }}" alt="Team">
                                <div class="social-media">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="description">
                                <h5>Jerome C. Ramirez</h5>
                                <span class="designation">CEO & Founder</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="team-member" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/team/member2.png') }}" alt="Team">
                                <div class="social-media">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="description">
                                <h5>Reginald F. Richardson</h5>
                                <span class="designation">Senior Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="team-member" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/team/member3.png') }}" alt="Team">
                                <div class="social-media">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="description">
                                <h5>Patrick D. Kozlowski</h5>
                                <span class="designation">Web Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="team-member" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/team/member4.png') }}" alt="Team">
                                <div class="social-media">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="description">
                                <h5>Patrick M. Piazza</h5>
                                <span class="designation">Junior manager</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team Area End -->
        
  
        <!-- Client Logos Area Start -->
        <section class="client-logo-area-two pt-130 rpt-100 pb-95 rpb-65 bgc-navyblue">
            <div class="section-title text-center text-white mb-40" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <h4>Our Partners</h4>
            </div>
            <div class="container">
                <div class="row justify-content-center row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2">
                    <div class="col" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
                        <div class="client-logo-item style-three">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-1.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-offset="50">
                        <div class="client-logo-item style-three">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-2.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                        <div class="client-logo-item style-three">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-3.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000" data-aos-offset="50">
                        <div class="client-logo-item style-three">
                            <a href="#"><img src="{{ asset('/assets/images/partners/maxwell.jpeg') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
                        <div class="client-logo-item style-three">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-5.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
                        <div class="client-logo-item style-three">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-6.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-offset="50">
                        <div class="client-logo-item style-three">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-7.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                        <div class="client-logo-item style-three">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-8.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000" data-aos-offset="50">
                        <div class="client-logo-item style-three">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-9.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
                        <div class="client-logo-item style-three">
                            <a href="#"><img src="{{ asset('/assets/images/partners/client-10.png') }}" alt="Client Logo"></a>
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
