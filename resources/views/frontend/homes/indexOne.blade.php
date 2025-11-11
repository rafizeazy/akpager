@extends('frontend.layouts.app')
@section('title', 'Index One')
@section('css')
<style>
   
</style>
@endsection
@section('content')

    <!-- header area -->
    @include('frontend.includes.headers.headerOne')
    <!-- header area end -->

    <!-- Hero area start -->
    <section class="hero-area bgs-cover py-250 rpy-150 overlay" style="background-image: url({{ asset('assets/images/hero.png') }});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-10 col-md-11">
                    <div class="hero-content text-center text-white">
                        <span class="subtitle-one mb-20" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"><i class="fas fa-rocket-launch"></i> IoT Solution & Services</span>
                        <h1 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">Smart Solutions for Modern Manufacturing & IoT Innovation</h1>
                        <div class="hero-btns" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1500" data-aos-offset="50">
                            <a href="{{ route('about') }}" class="theme-btn">Learn More <i class="far fa-arrow-right"></i></a>
                            <a href="{{ route('services') }}" class="theme-btn style-two">Our Services <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero area End -->
    
    
    <!-- Services Area Start -->
    <section class="services-area bgp-bottom bgc-navyblue pb-55 rel z-2" style="background-image: url({{ asset('assets/images/backgrounds/wave-shape.png') }});">
        <div class="container">
            <div class="services-wrap">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="iconic-box">
                            <div class="icon">
                                <i class="flaticon-customer-service-1"></i>
                            </div>
                            <div class="content">
                                <h4><a href="{{ route('serviceDetails') }}">SMT Auto Soldering</a></h4>
                                <p>Professional surface mount technology and automated soldering solutions for precision manufacturing</p>
                                <hr>
                                <a href="{{ route('serviceDetails') }}" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/iconic-box-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                        <div class="iconic-box">
                            <div class="icon">
                                <i class="flaticon-idea"></i>
                            </div>
                            <div class="content">
                                <h4><a href="{{ route('serviceDetails') }}">IoT Product</a></h4>
                                <p>Innovative Internet of Things devices and solutions for smart connectivity and automation</p>
                                <hr>
                                <a href="{{ route('serviceDetails') }}" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/iconic-box-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                        <div class="iconic-box">
                            <div class="icon">
                                <i class="flaticon-earning"></i>
                            </div>
                            <div class="content">
                                <h4><a href="{{ route('serviceDetails') }}">IT Support Solution</a></h4>
                                <p>Comprehensive IT infrastructure and technical support services for business continuity</p>
                                <hr>
                                <a href="{{ route('serviceDetails') }}" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/iconic-box-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <blockquote class="blockquote-one text-white" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
                        <div class="text">PT Smartplus Indonesia is committed to delivering cutting-edge IoT solutions and manufacturing technologies. We specialize in SMT Auto Soldering, innovative IoT products, and comprehensive IT support services. Our mission is to empower businesses with smart, connected technologies that drive efficiency and innovation in the modern industrial landscape</div>
                        <div class="author">
                            <img src="{{ asset('/assets/images/blog/blockquote.png') }}" alt="Author">
                            <div class="name"><h5>AGUS DEDI S /</h5> <span>CEO & FOUNDER</span></div>
                        </div>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Area End -->
    
    
    <!-- About Area Start -->
    <section class="about-area py-90 rpy-60">
        <div class="container">
            <div class="row gap-90 align-items-center">
                <div class="col-lg-6">
                    <div class="about-images my-40" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <img src="{{ asset('/assets/images/about/about.jpg') }}" alt="About">
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content mt-40 rmt-15" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-30">
                            <h2>Leading IoT Solutions Provider in Indonesia</h2>
                        </div>
                        <p>PT Smartplus Indonesia is a pioneer in IoT solutions and smart manufacturing technology. We provide integrated services ranging from SMT Auto Soldering to cutting-edge IoT products and comprehensive IT support, helping businesses transform into smart, connected enterprises</p>
                        <div class="row pt-30">
                            <div class="col-sm-6">
                                <div class="counter-item counter-text-wrap counted">
                                    <span class="count-text percent" data-speed="3000" data-stop="95">95</span>
                                    <h5 class="counter-title">IoT Integration</h5>
                                    <div class="text">Seamless IoT device integration and connectivity solutions</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="counter-item counter-text-wrap counted">
                                    <span class="count-text percent" data-speed="3000" data-stop="85">85</span>
                                    <h5 class="counter-title">Manufacturing Excellence</h5>
                                    <div class="text">Advanced SMT and automated soldering technology</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->
    
    
    <!-- Solutions Area End -->
    <section class="solutions-area pb-100 rpb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9 col-md-11">
                    <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h2>Comprehensive IoT Solutions Tailored to Your Industry</h2>
                        <p>From smart manufacturing to connected devices, we provide end-to-end IoT solutions that transform your business operations and drive digital innovation</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-md-6 col-sm-10">
                    <div class="fancy-box" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
                        <div class="image">
                            <img src="{{ asset('/assets/images/products/smt.png') }}" alt="Fancy Box">
                        </div>
                        <div class="content">
                            <div class="icon-title">
                                <i class="flaticon-meeting"></i>
                                <h5><a href="{{ route('serviceDetails') }}">SMT Auto Soldering</a></h5>
                            </div>
                            <div class="inner-content">
                                <p>Advanced surface mount technology and automated soldering for precision electronics</p>
                                <a href="{{ route('serviceDetails') }}" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/fancy-box-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-10">
                    <div class="fancy-box" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                        <div class="image">
                            <img src="{{ asset('/assets/images/products/iot.png') }}" alt="Fancy Box">
                        </div>
                        <div class="content">
                            <div class="icon-title">
                                <i class="flaticon-financial-advisor"></i>
                                <h5><a href="{{ route('serviceDetails') }}">IoT Products</a></h5>
                            </div>
                            <div class="inner-content" style="display: none;">
                                <p>Innovative IoT devices and sensors for smart connectivity and automation</p>
                                <a href="{{ route('serviceDetails') }}" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/fancy-box-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-10">
                    <div class="fancy-box" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
                        <div class="image">
                            <img src="{{ asset('/assets/images/products/it-support.png') }}" alt="Fancy Box">
                        </div>
                        <div class="content">
                            <div class="icon-title">
                                <i class="flaticon-meeting"></i>
                                <h5><a href="{{ route('serviceDetails') }}">IT Support Solution</a></h5>
                            </div>
                            <div class="inner-content" style="display: none;">
                                <p>Comprehensive IT infrastructure management and technical support services</p>
                                <a href="{{ route('serviceDetails') }}" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/fancy-box-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-10">
                    <div class="fancy-box" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
                        <div class="image">
                            <img src="{{ asset('/assets/images/products/smart.jpg') }}" alt="Fancy Box">
                        </div>
                        <div class="content">
                            <div class="icon-title">
                                <i class="flaticon-brand-identity"></i>
                                <h5><a href="{{ route('serviceDetails') }}">Smart Manufacturing</a></h5>
                            </div>
                            <div class="inner-content" style="display: none;">
                                <p>Industry 4.0 solutions for automated and connected manufacturing processes</p>
                                <a href="{{ route('serviceDetails') }}" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/fancy-box-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-10">
                    <div class="fancy-box" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                        <div class="image">
                            <img src="{{ asset('/assets/images/products/iot-integration.png') }}" alt="Fancy Box">
                        </div>
                        <div class="content">
                            <div class="icon-title">
                                <i class="flaticon-technology"></i>
                                <h5><a href="{{ route('serviceDetails') }}">IoT Integration</a></h5>
                            </div>
                            <div class="inner-content" style="display: none;">
                                <p>Seamless integration of IoT devices with existing business systems</p>
                                <a href="{{ route('serviceDetails') }}" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/fancy-box-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-10">
                    <div class="fancy-box" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
                        <div class="image">
                            <img src="{{ asset('/assets/images/products/it-app.png') }}" alt="Fancy Box">
                        </div>
                        <div class="content">
                            <div class="icon-title">
                                <i class="flaticon-talent-search"></i>
                                <h5><a href="{{ route('serviceDetails') }}">IT Application</a></h5>
                            </div>
                            <div class="inner-content" style="display: none;">
                                <p>Develop Custom desktop, mobile or web application that can solve customer requirement</p>
                                <a href="{{ route('serviceDetails') }}" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/fancy-box-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Solutions Area End -->
    
    
    <!-- CTA Area Start -->
    <section class="cta-area bgs-cover py-130 rpy-100" style="background-image: url({{ asset('assets/images/backgrounds/compare.jpg') }});">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-6 col-lg-8">
                    <div class="cta-content text-white rmb-35" data-aos="fade-left" data-aos-duration="1000" data-aos-offset="50">
                        <div class="section-title mb-40">
                            <span class="subtitle d-block mb-10">IoT Solutions</span>
                            <h2>Ready to Transform Your Business with IoT?</h2>
                        </div>
                        <a href="{{ route('contact') }}" class="theme-btn">Contact Us <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cta-btn text-lg-center text-start ps-lg-0 ps-2" data-aos="zoom-in-right" data-aos-duration="1000">
                        <a href="https://www.youtube-nocookie.com/embed/W5WUFIzT-50?autoplay=1&rel=0"
                            class="mfp-iframe video-play"><i class="fas fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Area End -->
    
    
    <!-- Recent Projects Area End -->
    <section class="project-area pt-130 rpt-100 pb-100 rpb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h2>Our Latest IoT Projects & Case Studies</h2>
                        <p>Explore how we've helped businesses transform with cutting-edge IoT solutions and smart manufacturing technologies</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="fancy-box style-two" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                        <div class="image">
                            <img src="{{ asset('/assets/images/services/iot-1.jpg') }}" alt="Fancy Box">
                        </div>
                        <div class="content">
                            <a href="#" class="category">SMT Auto Soldering</a>
                            <h6><a href="{{ route('serviceDetails') }}">Automated Soldering Implementation</a></h6>
                            <div class="inner-content">
                                <a href="{{ route('serviceDetails') }}" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/fancy-box-two-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="fancy-box style-two" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                        <div class="image">
                            <img src="{{ asset('/assets/images/services/iot-2.jpg') }}" alt="Fancy Box">
                        </div>
                        <div class="content">
                            <a href="#" class="category">IoT Products</a>
                            <h6><a href="{{ route('serviceDetails') }}">Smart Sensor Network Deployment</a></h6>
                            <div class="inner-content">
                                <a href="{{ route('serviceDetails') }}" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/fancy-box-two-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="fancy-box style-two" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
                        <div class="image">
                            <img src="{{ asset('/assets/images/services/it-2.jpg') }}" alt="Fancy Box">
                        </div>
                        <div class="content">
                            <a href="#" class="category">IT Solutions</a>
                            <h6><a href="{{ route('serviceDetails') }}">Enterprise IT Infrastructure Upgrade</a></h6>
                            <div class="inner-content">
                                <a href="{{ route('serviceDetails') }}" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/fancy-box-two-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="fancy-box style-two" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000" data-aos-offset="50">
                        <div class="image">
                            <img src="{{ asset('/assets/images/services/smt-3.jpg') }}" alt="Fancy Box">
                        </div>
                        <div class="content">
                            <a href="#" class="category">Manufacturing</a>
                            <h6><a href="{{ route('serviceDetails') }}">Smart Factory Transformation</a></h6>
                            <div class="inner-content">
                                <a href="{{ route('serviceDetails') }}" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                            </div>
                            <div class="bg">
                                <img src="{{ asset('/assets/images/shapes/fancy-box-two-bg.png') }}" alt="Shape">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recent Projects Area End -->
    
    
    <!-- Counter TimeLine Area Start -->
    <div class="counter-timeline-area">
        <div class="container">
            <div class="counter-timeline-wrap">
                <div class="row no-gap justify-content-center">
                    <div class="col-lg-4 col-sm-6">
                        <div class="counter-timeline-item counter-text-wrap" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                            <div class="icon"><i class="flaticon-review"></i></div>
                            <span class="dots">
                                <img src="{{ asset('/assets/images/shapes/counter-dots.png') }}" alt="Shape">
                            </span>
                            <div class="content">
                                <span class="count-text k-plus" data-speed="3000" data-stop="25">0</span>
                                <span class="counter-title">100% Satisficed Clients</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="counter-timeline-item counter-text-wrap" data-aos="fade-down" data-aos-duration="1000" data-aos-offset="50">
                            <div class="content">
                                <span class="count-text k-plus" data-speed="3000" data-stop="235">0</span>
                                <span class="counter-title">Task Complete For Global Clients</span>
                            </div>
                            <span class="dots">
                                <img src="{{ asset('/assets/images/shapes/counter-dots.png') }}" alt="Shape">
                            </span>
                            <div class="icon"><i class="flaticon-layers-1"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="counter-timeline-item counter-text-wrap" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
                            <div class="icon"><i class="flaticon-online-registration"></i></div>
                            <span class="dots">
                                <img src="{{ asset('/assets/images/shapes/counter-dots.png') }}" alt="Shape">
                            </span>
                            <div class="content">
                                <span class="count-text plus" data-speed="3000" data-stop="1052">0</span>
                                <span class="counter-title">Regular Free Registation</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counter TimeLine Area End -->
    
    
    <!-- Latest Blog Area Start -->
    @if(isset($latestPosts) && $latestPosts->count() > 0)
    <section class="blog-area pt-130 rpt-100 pb-70 rpb-40">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <span class="subtitle-one style-two mb-20"><i class="fas fa-rocket"></i> Latest News & Insights</span>
                        <h2>Stay Updated with IoT & Technology Trends</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($latestPosts as $post)
                    <div class="col-xl-4 col-md-6">
                        <div class="blog-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                @if($post->featured_image)
                                    <img src="{{ asset('assets/' . $post->featured_image) }}" alt="{{ $post->title }}">
                                @else
                                    <img src="{{ asset('assets/images/blog/blog-standard1.png') }}" alt="{{ $post->title }}">
                                @endif
                            </div>
                            <div class="content">
                                <ul class="blog-meta">
                                    @if($post->category)
                                        <li>
                                            <a class="category" href="{{ route('blog') }}?category={{ $post->category->slug }}">
                                                {{ $post->category->name }}
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <i class="far fa-calendar-alt"></i> 
                                        <a href="#">{{ $post->published_at->format('F d, Y') }}</a>
                                    </li>
                                </ul>
                                <h5>
                                    <a href="{{ route('blogDetails', ['post' => $post->id]) }}">{{ $post->title }}</a>
                                </h5>
                                <a href="{{ route('blogDetails', ['post' => $post->id]) }}" class="read-more">
                                    Read More <i class="far fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="blog-more-btn text-center mt-20" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <a href="{{ route('blog') }}" class="theme-btn">View All Articles <i class="far fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
    @endif
    <!-- Latest Blog Area End -->
    
    
    <!-- Management Area Start -->
    <section class="management-area bgp-bottom bgc-navyblue py-60" style="background-image: url({{ asset('assets/images/backgrounds/wave-shape.png') }});">
        <div class="container">
            <div class="row gap-110 align-items-center">
                <div class="col-lg-6">
                    <div class="management-content text-white mt-40" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-30">
                            <h2>Take Control of Your Smart Manufacturing Journey</h2>
                        </div>
                        <p>Transform your operations with IoT-enabled solutions and smart manufacturing technologies from PT Smartplus Indonesia</p>
                        <div class="row gap-50 pt-25">
                            <div class="col-md-6">
                                <div class="iconic-box style-nine text-white">
                                    <div class="icon">
                                        <i class="fal fa-laptop-code"></i>
                                    </div>
                                    <div class="content">
                                        <h5><a href="{{ route('serviceDetails') }}">IoT Connectivity</a></h5>
                                        <p>Seamless device connectivity and real-time monitoring solutions</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="iconic-box style-nine text-white">
                                    <div class="icon">
                                        <i class="fal fa-cog"></i>
                                    </div>
                                    <div class="content">
                                        <h5><a href="{{ route('serviceDetails') }}">Smart Automation</a></h5>
                                        <p>Advanced automation systems for enhanced productivity</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="management-images my-40" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <img src="{{ asset('/assets/images/about/sas.png') }}" alt="Management">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Management Area End -->
    
    
    <br>
    <br>
    
    
    <!-- Blog Area Start -->
   
    <!-- Blog Area End -->
    
    
    <!-- Client Logos Area Start -->
    <section class="client-logo-area pb-90 rpb-65">
        <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
            <h4>Trusted by Leading Companies in Indonesia</h4>
        </div>
        <div class="client-logo-wrap">
            <div class="client-logo-item" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
                <a href="#"><img src="{{ asset('/assets/images/client-logos/client-1.png') }}" alt="Client Logo"></a>
            </div>
            <div class="client-logo-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-offset="50">
                <a href="#"><img src="{{ asset('/assets/images/client-logos/client-2.png') }}" alt="Client Logo"></a>
            </div>
            <div class="client-logo-item" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                <a href="#"><img src="{{ asset('/assets/images/client-logos/client-3.png') }}" alt="Client Logo"></a>
            </div>
            <div class="client-logo-item" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000" data-aos-offset="50">
                <a href="#"><img src="{{ asset('/assets/images/client-logos/client-4.png') }}" alt="Client Logo"></a>
            </div>
            <div class="client-logo-item" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
                <a href="#"><img src="{{ asset('/assets/images/client-logos/client-5.png') }}" alt="Client Logo"></a>
            </div>
            <div class="client-logo-item" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000" data-aos-offset="50">
                <a href="#"><img src="{{ asset('/assets/images/client-logos/client-6.png') }}" alt="Client Logo"></a>
            </div>
            <div class="client-logo-item" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000" data-aos-offset="50">
                <a href="#"><img src="{{ asset('/assets/images/client-logos/client-7.png') }}" alt="Client Logo"></a>
            </div>
            
        </div>
    </section>
    <!-- Client Logos Area End -->
    <!-- footer area -->
    @include('frontend.includes.footers.footerOne')
    <!-- footer area end -->
@endsection
