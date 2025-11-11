@extends('frontend.layouts.app')
@section('title', 'Contact')
@section('content')
    <!-- header area -->
    @include('frontend.includes.headers.headerOne')
    <!-- header area end -->

        <!-- Page Banner Start -->
        <section class="page-banner-area overlay py-250 rpy-120 rel z-1 bgs-cover text-center" style="background-image: url({{ asset('assets/images/hero.png') }});">
            <div class="container">
                <div class="banner-inner pt-70 rpt-60 text-white">
                    <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Contact Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
        
        
        <!-- Contact Page Start -->
        <section class="contact-page py-130 rpy-100">
            <div class="container">
                <div class="row gap-100 align-items-center">
                    <div class="col-lg-5">
                        <div class="contact-info-part">
                            <div class="section-title mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h2>Feel Free to Contact Us, Get In Touch</h2>
                                <p>We're here to assist you in any way we can. Whether you have questions, feedback, or just want to say hello</p>
                            </div>
                            <div class="contact-info-item style-two" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                <div class="icon">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="content">
                                    <span class="title">Location</span>
                                    <span class="text">Grand Cikarang City Blok G12 No.04, Bekasi, Indonesia</span>
                                </div>
                            </div>
                            <div class="contact-info-item style-two" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                                <div class="icon">
                                    <i class="far fa-envelope-open-text"></i>
                                </div>
                                <div class="content">
                                    <span class="title">Email Address</span>
                                    <span class="text">
                                        <a href="mailto:support@gmail.com">agusds@cvsmartplus.com</a>
                                    </span>
                                </div>
                            </div>
                            <div class="contact-info-item style-two" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                                <div class="icon">
                                    <i class="fal fa-phone-volume"></i>
                                </div>
                                <div class="content">
                                    <span class="title">Make A Call</span>
                                    <span class="text">
                                        <a href="calto:+000(123)456889">(021) 89120117</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="contact-form br-10 bgc-lighter rmt-60" name="contact-form" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <form id="contactForm" class="contactForm" name="contactForm" action="assets/php/form-process.php" method="post">
                                <img class="shape-one" src="{{ asset('/assets/images/shapes/star-yellow-shape.png') }}" alt="Star Shape">
                                <img class="shape-two" src="{{ asset('/assets/images/shapes/star-black-shape.png') }}" alt="Star Shape">
                                <h5>Send Us Message</h5>
                                <p>Questions or you would just like to say hello, contact us.</p>
                                <div class="row mt-30">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input type="text" id="name" name="name" class="form-control" value="" placeholder="Agus Dedi Supriyadi" required data-error="Please enter your Name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" value="" placeholder="agusds@cvsmartplus.com" required data-error="Please enter your Email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <input type="text" id="subject" name="subject" class="form-control" value="" placeholder="I like to discussed" required data-error="Please enter your Subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea name="message" id="message" class="form-control" rows="4" placeholder="Write Message" required data-error="Please enter your Message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-0">
                                            <button type="submit" class="theme-btn">Send Us Message <i class="far fa-arrow-right"></i></button>
                                            <div id="msgSubmit" class="hidden"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Page End -->
        
       
        <!-- Location Map Area Start -->
        <div class="contact-page-map">
            <div class="our-location">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31728.31541366821!2d107.174332!3d-6.258537!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6985b021ecbf8b%3A0xffacd8916d798018!2sSmartplus%20Workshop!5e0!3m2!1sid!2sid!4v1762702290596!5m2!1sid!2sid" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <!-- Location Map Area End -->

    <!-- footer area -->
    @include('frontend.includes.footers.footerOne')
    <!-- footer area end -->
@endsection
