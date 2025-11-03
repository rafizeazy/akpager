@extends('frontend.layouts.app')
@section('title', 'Pricing')
@section('content')
    <!-- header area -->
    @include('frontend.includes.headers.headerOne')
    <!-- header area end -->

        <!-- Page Banner Start -->
        <section class="page-banner-area overlay py-250 rpy-120 rel z-1 bgs-cover text-center" style="background-image: url({{ asset('assets/images/backgrounds/banner.jpg') }});">
            <div class="container">
                <div class="banner-inner pt-70 rpt-60 text-white">
                    <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Pricing Package</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Pricing Plan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
        
        
        <!-- Pricing Area Start -->
        <section class="pricing-area pt-125 rpt-95 pb-100 rpb-70 rel z-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-9 col-md-11">
                        <div class="section-title text-center mb-55" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Explore Our Pricing Package and choose your plan</h2>
                            <p>We Provide Best Pricing package to grow your lead capture development</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-md-6 col-sm-10">
                        <div class="pricing-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="circle"><img src="{{ asset('/assets/images/shapes/price-circle.png') }}" alt="Shape"></div>
                            <div class="price"><span class="prev">$</span>19<span class="next">/month</span></div>
                            <div class="text">Smart Pricing for good services</div>
                            <h4 class="title">Regular Plan</h4>
                            <ul class="list">
                                <li>Email marketing</li>
                                <li>Unlimited chat history</li>
                                <li>Unlimited landing pages</li>
                                <li>Automation templates</li>
                                <li>Great Customer Support</li>
                                <li>Unlimited lead funnels</li>
                            </ul>
                            <a href="#" class="theme-btn">Choose Package <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-sm-10">
                        <div class="pricing-item bgc-primary text-white" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <div class="circle"><img src="{{ asset('/assets/images/shapes/price-circle.png') }}" alt="Shape"></div>
                            <div class="price"><span class="prev">$</span>39<span class="next">/month</span></div>
                            <div class="text">Smart Pricing for good services</div>
                            <h4 class="title">Standard Plan</h4>
                            <ul class="list">
                                <li>Email marketing</li>
                                <li>Unlimited chat history</li>
                                <li>Unlimited landing pages</li>
                                <li>Automation templates</li>
                                <li>Great Customer Support</li>
                                <li>Unlimited lead funnels</li>
                            </ul>
                            <a href="#" class="theme-btn">Choose Package <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-sm-10">
                        <div class="pricing-item text-white bgc-navyblue" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <div class="circle"><img src="{{ asset('/assets/images/shapes/price-circle.png') }}" alt="Shape"></div>
                            <div class="price"><span class="prev">$</span>93<span class="next">/month</span></div>
                            <div class="text">Smart Pricing for good services</div>
                            <h4 class="title">Premium Plan</h4>
                            <ul class="list">
                                <li>Email marketing</li>
                                <li>Unlimited chat history</li>
                                <li>Unlimited landing pages</li>
                                <li>Automation templates</li>
                                <li>Great Customer Support</li>
                                <li>Unlimited lead funnels</li>
                            </ul>
                            <a href="#" class="theme-btn style-two">Choose Package <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing Area End -->
        
        
        <!-- Price Three Area Start -->
        <section class="pricing-three-area bgc-lighter bgp-bottom pt-130 rpt-100 pb-100 rpb-70 rel z-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-9 col-md-11">
                        <div class="section-title text-center mb-45" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Explore Our Pricing Package and choose your plan</h2>
                        </div>
                    </div>
                    <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                        <span class="save-percent" style="background-image: url({{ asset('assets/images/shapes/title-shape.png') }});">Save 40%</span>
                        <ul class="nav pricing-tab mb-55" role="tablist">
                            <li>
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#monthly">Monthly</button>
                            </li>
                            <li>
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#yearly">Yearly</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade" id="monthly">
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <div class="pricing-item style-three">
                                    <div class="circle"><img src="{{ asset('/assets/images/shapes/price-circle.png') }}" alt="Shape"></div>
                                    <div class="price"><span class="prev">$</span>19<span class="next">/month</span></div>
                                    <div class="text">Smart Pricing for good services</div>
                                    <a href="#" class="theme-btn">Choose Package <i class="far fa-arrow-right"></i></a>
                                    <h4 class="title">Regular Plan</h4>
                                    <ul class="list">
                                        <li>Email marketing</li>
                                        <li>Unlimited chat history</li>
                                        <li>Unlimited landing pages</li>
                                        <li class="hide">Automation templates</li>
                                        <li class="hide">Great Customer Support</li>
                                        <li class="hide">Unlimited lead funnels</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                                <div class="pricing-item style-three">
                                    <div class="circle"><img src="{{ asset('/assets/images/shapes/price-circle.png') }}" alt="Shape"></div>
                                    <div class="price"><span class="prev">$</span>39<span class="next">/month</span></div>
                                    <div class="text">Smart Pricing for good services</div>
                                    <a href="#" class="theme-btn">Choose Package <i class="far fa-arrow-right"></i></a>
                                    <h4 class="title">Standard Plan</h4>
                                    <ul class="list">
                                        <li>Email marketing</li>
                                        <li>Unlimited chat history</li>
                                        <li>Unlimited landing pages</li>
                                        <li>Automation templates</li>
                                        <li>Great Customer Support</li>
                                        <li>Unlimited lead funnels</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                                <div class="pricing-item style-three">
                                    <div class="circle"><img src="{{ asset('/assets/images/shapes/price-circle.png') }}" alt="Shape"></div>
                                    <div class="price"><span class="prev">$</span>93<span class="next">/month</span></div>
                                    <div class="text">Smart Pricing for good services</div>
                                    <a href="#" class="theme-btn">Choose Package <i class="far fa-arrow-right"></i></a>
                                    <h4 class="title">Premium Plan</h4>
                                    <ul class="list">
                                        <li>Email marketing</li>
                                        <li>Unlimited chat history</li>
                                        <li>Unlimited landing pages</li>
                                        <li>Automation templates</li>
                                        <li>Great Customer Support</li>
                                        <li>Unlimited lead funnels</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade yearly show active" id="yearly">
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <div class="pricing-item style-three">
                                    <div class="circle"><img src="{{ asset('/assets/images/shapes/price-circle.png') }}" alt="Shape"></div>
                                    <div class="price"><span class="prev">$</span>19<span class="next">/month</span></div>
                                    <div class="text">Smart Pricing for good services</div>
                                    <a href="#" class="theme-btn">Choose Package <i class="far fa-arrow-right"></i></a>
                                    <h4 class="title">Regular Plan</h4>
                                    <ul class="list">
                                        <li>Email marketing</li>
                                        <li>Unlimited chat history</li>
                                        <li>Unlimited landing pages</li>
                                        <li class="hide">Automation templates</li>
                                        <li class="hide">Great Customer Support</li>
                                        <li class="hide">Unlimited lead funnels</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                                <div class="pricing-item style-three">
                                    <div class="circle"><img src="{{ asset('/assets/images/shapes/price-circle.png') }}" alt="Shape"></div>
                                    <div class="price"><span class="prev">$</span>39<span class="next">/month</span></div>
                                    <div class="text">Smart Pricing for good services</div>
                                    <a href="#" class="theme-btn">Choose Package <i class="far fa-arrow-right"></i></a>
                                    <h4 class="title">Standard Plan</h4>
                                    <ul class="list">
                                        <li>Email marketing</li>
                                        <li>Unlimited chat history</li>
                                        <li>Unlimited landing pages</li>
                                        <li>Automation templates</li>
                                        <li>Great Customer Support</li>
                                        <li>Unlimited lead funnels</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                                <div class="pricing-item style-three">
                                    <div class="circle"><img src="{{ asset('/assets/images/shapes/price-circle.png') }}" alt="Shape"></div>
                                    <div class="price"><span class="prev">$</span>93<span class="next">/month</span></div>
                                    <div class="text">Smart Pricing for good services</div>
                                    <a href="#" class="theme-btn">Choose Package <i class="far fa-arrow-right"></i></a>
                                    <h4 class="title">Premium Plan</h4>
                                    <ul class="list">
                                        <li>Email marketing</li>
                                        <li>Unlimited chat history</li>
                                        <li>Unlimited landing pages</li>
                                        <li>Automation templates</li>
                                        <li>Great Customer Support</li>
                                        <li>Unlimited lead funnels</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pricing-three-shapes">
                <div class="shape one">
                    <img src="{{ asset('/assets/images/shapes/price1.png') }}" alt="Shape">
                </div>
                <div class="shape two">
                    <img src="{{ asset('/assets/images/shapes/price2.png') }}" alt="Shape">
                </div>
            </div>
        </section>
        <!-- Price Three Area End -->
        
        
        <!-- Pricing Area Start -->
        <section class="pricing-area-six overflow-hidden rel z-1 pt-125 rpt-95 pb-100 rpb-70">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9 col-md-11">
                        <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Easy to Start, Easy to Scale Website Builder Plans</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="pricing-item style-five">
                            <div class="title-price">
                                <h5 class="title">Regular</h5>
                                <div class="price"><span class="prev">$</span>15.<span class="next">/m</span></div>
                            </div>
                            <hr>
                            <div class="text">Data curation involve the careful election organization, and maintenance</div>
                            <ul class="icon-list">
                                <li><i class="fal fa-check"></i> 2 Limited sites available</li>
                                <li><i class="fal fa-check"></i> 1 GB storage per site</li>
                                <li><i class="fal fa-check"></i> Up to 5 pages per site</li>
                                <li class="hide"><i class="fal fa-check"></i> Free SSL for custom domain</li>
                                <li class="hide"><i class="fal fa-check"></i> Connect custom domain</li>
                            </ul>
                            <a href="#" class="theme-btn style-two">Choose Package <i class="far fa-arrow-right"></i></a>
                            <div class="footer-text">No credit card required</div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                        <div class="pricing-item style-five">
                            <div class="title-price">
                                <h5 class="title color-two">Standard</h5>
                                <div class="price"><span class="prev">$</span>35.<span class="next">/m</span></div>
                            </div>
                            <hr>
                            <div class="text">Data curation involve the careful election organization, and maintenance</div>
                            <ul class="icon-list">
                                <li><i class="fal fa-check"></i> 2 Limited sites available</li>
                                <li><i class="fal fa-check"></i> 1 GB storage per site</li>
                                <li><i class="fal fa-check"></i> Up to 5 pages per site</li>
                                <li><i class="fal fa-check"></i> Free SSL for custom domain</li>
                                <li class="hide"><i class="fal fa-check"></i> Connect custom domain</li>
                            </ul>
                            <a href="#" class="theme-btn style-two">Choose Package <i class="far fa-arrow-right"></i></a>
                            <div class="footer-text">No credit card required</div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                        <div class="pricing-item style-five">
                            <div class="title-price">
                                <h5 class="title color-four">Diamond</h5>
                                <div class="price"><span class="prev">$</span>98.<span class="next">/m</span></div>
                            </div>
                            <hr>
                            <div class="text">Data curation involve the careful election organization, and maintenance</div>
                            <ul class="icon-list">
                                <li><i class="fal fa-check"></i> 2 Limited sites available</li>
                                <li><i class="fal fa-check"></i> 1 GB storage per site</li>
                                <li><i class="fal fa-check"></i> Up to 5 pages per site</li>
                                <li><i class="fal fa-check"></i> Free SSL for custom domain</li>
                                <li><i class="fal fa-check"></i> Connect custom domain</li>
                            </ul>
                            <a href="#" class="theme-btn style-two">Choose Package <i class="far fa-arrow-right"></i></a>
                            <div class="footer-text">No credit card required</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing Area End -->

    <!-- footer area -->
    @include('frontend.includes.footers.footerOne')
    <!-- footer area end -->
@endsection