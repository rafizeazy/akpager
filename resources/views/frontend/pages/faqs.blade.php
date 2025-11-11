@extends('frontend.layouts.app')
@section('title', 'Faq')
@section('content')
    <!-- header area -->
    @include('frontend.includes.headers.headerOne')
    <!-- header area end -->

        <!-- Page Banner Start -->
        <section class="page-banner-area overlay py-250 rpy-120 rel z-1 bgs-cover text-center" style="background-image: url({{ asset('assets/images/hero.png') }});">
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
                                <h2>Why Us ? And How to Use Our Service</h2>
                            </div>
                            <p>If you want to use our product and service please call aour representatif sales, Below is Some of item that you have to prepare Special before order SMT Auto soldering services</p>
                            <a href="#" class="theme-btn mt-30">Contact Us <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="accordion faq-page" id="accordionOne" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne1">
                                       Prepare Product Document
                                    </button>
                                </h5>
                                <div id="collapseOne1" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                    <div class="accordion-body">
                                        <p>Document product Such as Gerber data , sample product , material List and others suporting document</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne2">
                                        What kind of services do we provide?
                                    </button>
                                </h5>
                                <div id="collapseOne2" class="accordion-collapse collapse show" data-bs-parent="#accordionOne">
                                    <div class="accordion-body">
                                        <p>For auto soldering we provide some service , only mounting fee, include material or all material provide by us</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne3">
                                       Any minimum order?
                                    </button>
                                </h5>
                                <div id="collapseOne3" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                    <div class="accordion-body">
                                        <p>Yes, We have Minimum Order 10 pcs for prototype model, and 1000 pcs for mounting fee only</p>
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
                                        <p>Yes, we have a dedicated support team to assist you with any inquiries or issues you may have.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne5">
                                       What is the turnaround time for SMT Auto Soldering services?
                                    </button>
                                </h5>
                                <div id="collapseOne5" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                    <div class="accordion-body">
                                        <p>The turnaround time varies depending on the complexity of the project and the quantity ordered. Please contact our sales representative for more information.</p>
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
                            <h2>Don’t Hesitate to Contact Us</h2>
                            <p>If you have any questions or need further assistance, feel free to reach out to our team.</p>
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