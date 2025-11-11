@extends('frontend.layouts.app')
@section('title', 'Service Details')
@section('content')
    <!-- header area -->
    @include('frontend.includes.headers.headerOne')
    <!-- header area end -->

        <!-- Page Banner Start -->
        <section class="page-banner-area overlay py-250 rpy-120 rel z-1 bgs-cover text-center" style="background-image: url({{ asset('assets/images/hero.png') }});">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-11">
                        <div class="banner-inner pt-70 rpt-60 text-white">
                            <h2 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Unlock Your Digital Potential  Our Expert Digital Marketing Services</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Service Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
       
        
        <!-- Service Management Area Start -->
        <section class="service-mamagement-area pt-60 rpt-30 pb-90 rpb-60">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="service-mamagement-content mt-40 rmb-20" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title mb-30">
                                <h2>Best Digital Marketing Solutions for Next-Level Online Success</h2>
                            </div>
                            <p>Elevate your brand's online presence with our comprehensive digital marketing services, tailored to boost engagement & drive measurable results.</p>
                            <div class="row pt-25">
                                <div class="col-sm-6">
                                    <div class="feature-icon-box style-two">
                                        <div class="icon">
                                            <i class="far fa-check"></i>
                                        </div>
                                        <div class="content">
                                            <h5>Turn ideas into reality</h5>
                                            <p>Nam libero tempore solut nobis estmpedit maxime placeat</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="feature-icon-box style-two">
                                        <div class="icon">
                                            <i class="far fa-check"></i>
                                        </div>
                                        <div class="content">
                                            <h5>Engage your audience</h5>
                                            <p>Nam libero tempore solut nobis estmpedit maxime placeat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="management-images float-lg-end my-40" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <img src="{{ asset('/assets/images/about/service-management.png') }}" alt="Management">
                            <div class="management-over">
                                <img src="{{ asset('/assets/images/about/management2.png') }}" alt="Management" data-aos="fade-right" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Service Management Area End -->
        
        
        <!-- Marketing Solutions Area Start -->
        <section class="marketing-solutions-area pb-80 rpb-50">
            <div class="container">
                <div class="row gap-90 align-items-center">
                    <div class="col-lg-6">
                        <div class="marketing-solutions-images mb-50" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <img class="br-20" src="{{ asset('/assets/images/about/marketing-solutions.png') }}" alt="About">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="marketing-solutions-content" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title mb-30">
                                <h2>Strategic Digital Marketing Solutions Unleash Your Brand's Potential</h2>
                            </div>
                            <p>Elevate your brand's online presence with our comprehensive digital marketing services, tailored to boost engagement & drive measurable results.</p>
                            <a href="{{ route('contact') }}" class="theme-btn mt-25">Get Started <i class="far fa-arrow-right"></i></a>
                            <div class="row pt-40">
                                <div class="col-6">
                                    <div class="counter-item counter-text-wrap">
                                        <span class="count-text k-plus" data-speed="3000" data-stop="25">95</span>
                                        <div class="text">100% Satisficed Clients</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="counter-item counter-text-wrap counted">
                                        <span class="count-text k-plus" data-speed="3000" data-stop="38">85</span>
                                        <div class="text">Task Complete For Global Clients</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Marketing Solutions Area End -->
        
        
        <!-- CTA Area Start -->
        <section class="cta-area bgs-cover py-130 rpy-100" style="background-image: url({{ asset('assets/images/backgrounds/cta.jpg') }});">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-6 col-lg-8">
                        <div class="cta-content text-white rmb-35" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title mb-40">
                                <span class="subtitle d-block mb-10">Website Builder</span>
                                <h2>Ready Work Together to Create Website?</h2>
                            </div>
                            <a href="{{ route('contact') }}" class="theme-btn">Contact Us <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cta-btn text-lg-center text-start ps-lg-0 ps-2" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <a href="https://www.youtube.com/watch?v=9Y7ma241N8k" class="mfp-iframe video-play"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA Area End -->
        
        
        <!-- Features Area Start -->
        <section class="about-features-area pt-130 rpt-100">
            <div class="container">
               <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-11">
                        <div class="section-title text-center mb-45" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Driving Growth Through Data Our Comprehensive Digital Marketing Services</h2>
                            <div class="row justify-content-center">
                                <div class="col-xl-9 col-lg-11">
                                    <p>Our digital marketing experts employ data-driven strategies to optimize your online campaigns, ensuring maximum ROI and customer engagement. Elevate your brand's online presence with our comprehensive  digital marketing services, tailored to boost engagement & drive</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="iconic-box style-seven border">
                            <div class="icon-title">
                                <i class="far fa-cloud-upload"></i>
                                <h5><a href="{{ route('serviceDetails') }}">Real-Time Updates</a></h5>
                            </div>
                            <div class="content">
                                <p>Marketing agencies, for example, focus on promoting products or services</p>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/iconic-box-seven-bg2.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                        <div class="iconic-box style-seven border">
                            <div class="icon-title">
                                <i class="far fa-bullseye-arrow"></i>
                                <h5><a href="{{ route('serviceDetails') }}">Align Money & Goals</a></h5>
                            </div>
                            <div class="content">
                                <p>They leverage the digital marketing social media, SEO, traditional advertising</p>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/iconic-box-seven-bg2.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                        <div class="iconic-box style-seven border">
                            <div class="icon-title">
                                <i class="far fa-layer-group"></i>
                                <h5><a href="{{ route('serviceDetails') }}">Quietly Powerful</a></h5>
                            </div>
                            <div class="content">
                                <p>Agencies offer specialized expertise in areas such as management, finance</p>
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
        
        
        <!-- FAQs area start -->
        <section class="faqs-area pt-100 rpt-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="faq-content-four rmb-65" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title pb-20">
                                <h2>Uncover Solutions to Frequently Asked Questions About Our Services</h2>
                            </div>
                            <div class="accordion" id="accordionOne">
                                <div class="accordion-item">
                                    <h5 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne1">
                                           How To Get Our Services?
                                        </button>
                                    </h5>
                                    <div id="collapseOne1" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>At vero eoset accusamus etiusto dignissimos duci blanditiis praesentium corrupti dignissimos duci blanditiis praesentium corrupti dolores molest excepturi sint occaecati cupiditate</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h5 class="accordion-header">
                                        <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne2">
                                            What Is Data Analysis For Business ?
                                        </button>
                                    </h5>
                                    <div id="collapseOne2" class="accordion-collapse collapse show" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>At vero eoset accusamus etiusto dignissimos duci blanditiis praesentium corrupti dignissimos duci blanditiis praesentium corrupti dolores molest excepturi sint occaecati cupiditate</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h5 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne3">
                                           Why Need Marketing Data Analysis ?
                                        </button>
                                    </h5>
                                    <div id="collapseOne3" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>At vero eoset accusamus etiusto dignissimos duci blanditiis praesentium corrupti dolores molest excepturi sint occaecati cupiditate</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h5 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne4">
                                           Have Any Dedicated Support Team ?
                                        </button>
                                    </h5>
                                    <div id="collapseOne4" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>At vero eoset accusamus etiusto dignissimos duci blanditiis praesentium corrupti dolores molest excepturi sint occaecati cupiditate</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="faq-images-part ms-lg-auto" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/faq/faq1.png') }}" alt="FAQs">
                            </div>
                            <div class="row gap-20">
                                <div class="col-6">
                                    <div class="image">
                                        <img src="{{ asset('/assets/images/faq/faq2.png') }}" alt="FAQs">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="image">
                                        <img src="{{ asset('/assets/images/faq/faq3.png') }}" alt="FAQs">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FAQs area End -->
        
        
        <!-- Client Logos Area Start -->
        <section class="client-logo-area-two pt-110 rpt-80 pb-95 rpb-65">
            <div class="section-title text-center mb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <h4>I’ve <span>1253</span>+ Global Clients & lot’s of Project Complete</h4>
            </div>
            <div class="container">
                <div class="row justify-content-center row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2">
                    <div class="col">
                        <div class="client-logo-item style-three" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="{{ asset('/assets/images/client-logos/client-logo-two1.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="{{ asset('/assets/images/client-logos/client-logo-two2.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="{{ asset('/assets/images/client-logos/client-logo-two3.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="{{ asset('/assets/images/client-logos/client-logo-two4.png') }}" alt="Client Logo"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="{{ asset('/assets/images/client-logos/client-logo-two9.png') }}" alt="Client Logo"></a>
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