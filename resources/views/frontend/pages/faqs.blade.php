@extends('frontend.layouts.app')
@section('title', 'Faq')
@section('content')
    <!-- header area -->
    @include('frontend.includes.headers.headerOne')
    <!-- header area end -->

        <!-- Page Banner Start -->
        <section class="page-banner-area overlay py-250 rpy-120 rel z-1 bgs-cover text-center" style="background-image: url({{ asset('assets/images/backgrounds/banner.jpg') }});">
            <div class="container">
                <div class="banner-inner pt-70 rpt-60 text-white">
                    <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">FAQs</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">FAQs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
        
        
        <!-- FAQs Area Start -->
        <section class="faqs-area pt-130 rpt-100">
            <div class="container">
                <div class="row gap-70">
                    <div class="col-lg-5">
                        <div class="faq-left-content rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title mb-30">
                                <h2>Digital Marketing Faq Your Roadmap to Success</h2>
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus voluptatem accusantium doloremque laudantium totamto aperiame eaque ipsa quae ab illo inventore veritatis</p>
                            <a href="#" class="theme-btn mt-30">Contact Us <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="accordion faq-page" id="accordionOne" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne1">
                                       How To Get Our Services?
                                    </button>
                                </h5>
                                <div id="collapseOne1" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                    <div class="accordion-body">
                                        <p>At vero eoset accusamus etiusto dignissimos duci blanditiis praesentium corrupti dolores molest excepturi sint occaecati cupiditate</p>
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
                                        <p>At vero eoset accusamus etiusto dignissimos duci blanditiis praesentium corrupti dolores molest excepturi sint occaecati cupiditate</p>
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
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne5">
                                       Why Join Our Courses ?
                                    </button>
                                </h5>
                                <div id="collapseOne5" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                    <div class="accordion-body">
                                        <p>At vero eoset accusamus etiusto dignissimos duci blanditiis praesentium corrupti dolores molest excepturi sint occaecati cupiditate</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne6">
                                       Have Any Dedicated Support Team ?
                                    </button>
                                </h5>
                                <div id="collapseOne6" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                    <div class="accordion-body">
                                        <p>At vero eoset accusamus etiusto dignissimos duci blanditiis praesentium corrupti dolores molest excepturi sint occaecati cupiditate</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FAQs Area End -->
        
        
        <!-- FAQs Area Start -->
        <section class="faqs-area pt-115 rpt-85 pb-100 rpb-70">
            <div class="container">
                <div class="row gap-70">
                    <div class="col-lg-5">
                        <div class="faq-left-content rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title mb-30">
                                <h2>Navigating the Digital Marketing Landscape FAQs Unveiled</h2>
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus voluptatem accusantium doloremque laudantium totamto aperiame eaque ipsa quae ab illo inventore veritatis</p>
                            <a href="#" class="theme-btn style-four mt-30">Contact Us <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="accordion faq-page" id="accordionTwo" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo1">
                                       What is digital marketing, and why is it important ?
                                    </button>
                                </h5>
                                <div id="collapseTwo1" class="accordion-collapse collapse" data-bs-parent="#accordionTwo">
                                    <div class="accordion-body">
                                        <p>At vero eoset accusamus etiusto dignissimos duci blanditiis praesentium corrupti dolores molest excepturi sint occaecati cupiditate</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseTwo2">
                                        What are the key components of a successful Marketing ?
                                    </button>
                                </h5>
                                <div id="collapseTwo2" class="accordion-collapse collapse show" data-bs-parent="#accordionTwo">
                                    <div class="accordion-body">
                                        <p>At vero eoset accusamus etiusto dignissimos duci blanditiis praesentium voluptatum corrupti dolores molest excepturi sint occaecati cupiditate</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo3">
                                       How can I improve my website's search engine ?
                                    </button>
                                </h5>
                                <div id="collapseTwo3" class="accordion-collapse collapse" data-bs-parent="#accordionTwo">
                                    <div class="accordion-body">
                                        <p>At vero eoset accusamus etiusto dignissimos duci blanditiis praesentium corrupti dolores molest excepturi sint occaecati cupiditate</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo4">
                                       What is the importance of social media in digital marketing?
                                    </button>
                                </h5>
                                <div id="collapseTwo4" class="accordion-collapse collapse" data-bs-parent="#accordionTwo">
                                    <div class="accordion-body">
                                        <p>At vero eoset accusamus etiusto dignissimos duci blanditiis praesentium corrupti dolores molest excepturi sint occaecati cupiditate</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo5">
                                       How can I measure the effectiveness of my digital marketing ?
                                    </button>
                                </h5>
                                <div id="collapseTwo5" class="accordion-collapse collapse" data-bs-parent="#accordionTwo">
                                    <div class="accordion-body">
                                        <p>At vero eoset accusamus etiusto dignissimos duci blanditiis praesentium corrupti dolores molest excepturi sint occaecati cupiditate</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo6">
                                       Have Any Dedicated Support Team ?
                                    </button>
                                </h5>
                                <div id="collapseTwo6" class="accordion-collapse collapse" data-bs-parent="#accordionTwo">
                                    <div class="accordion-body">
                                        <p>At vero eoset accusamus etiusto dignissimos duci blanditiis praesentium corrupti dolores molest excepturi sint occaecati cupiditate</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FAQs Area End -->
        
        
        <!-- CTA Area Start -->
        <section class="faq-cta-area">
            <div class="container">
                <hr>
                <div class="row pt-110 rpt-80 pb-130 rpb-100 justify-content-center text-center">
                    <div class="col-xl-7 col-lg-9 col-md-11">
                        <div class="section-title mb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Don’t Heisted to Contact Us</h2>
                            <p>Sed ut perspiciatis unde omnis iste natus voluptatem accusantium doloremque laudantium totamto aperiame eaque epsa quae abillo inventore veritatis</p>
                        </div>
                        <a href="#" class="theme-btn" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">Contact Us <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA Area End -->

    <!-- footer area -->
    @include('frontend.includes.footers.footerOne')
    <!-- footer area end -->
@endsection