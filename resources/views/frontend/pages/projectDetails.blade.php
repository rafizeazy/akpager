@extends('frontend.layouts.app')
@section('title', 'Project Details')
@section('content')
    <!-- header area -->
    @include('frontend.includes.headers.headerOne')
    <!-- header area end -->

        <!-- Page Banner Start -->
        <section class="page-banner-area overlay py-250 rpy-120 rel z-1 bgs-cover text-center" style="background-image: url({{ asset('assets/images/hero.png') }});">
            <div class="container">
                <div class="banner-inner pt-70 rpt-60 text-white">
                    <h2 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Digital Product Design & Branding</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Project Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
        
        
        <!-- Project Details Area Start -->
        <section class="project-details-area pt-130 rpt-100 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="project-details-content pb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title mb-30">
                                <span class="subtitle-one mb-10 p-0 shadow-none">Design, Branding</span>
                                <h2>Introduction Of Projects Overview</h2>
                            </div>
                            <div class="row mb-20">
                                <div class="col-xl-10">
                                    <p>Designing a digital product and branding project involves several key steps and considerations to create a successful and cohesive user experience. Below is an overview of the project details and the typical steps involved</p>
                                </div>
                            </div>
                            <h5>Project Initiation</h5>
                            <ul class="icon-list mt-20 mb-35">
                                <li><i class="fal fa-check"></i> Define the project scope, goals, and objectives</li>
                                <li><i class="fal fa-check"></i> Identify the target audience and market research.</li>
                                <li><i class="fal fa-check"></i> Determine the budget, timeline, and available resources.</li>
                            </ul>
                            <h5>Project Initiation</h5>
                            <ul class="icon-list mt-20 mb-35">
                                <li><i class="fal fa-check"></i> Conduct user research to understand the needs and preferences of the target audience</li>
                                <li><i class="fal fa-check"></i> Analyze competitors and industry trends.</li>
                                <li><i class="fal fa-check"></i> Create user personas and user journeys to guide design decisions.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="project-details-info rmb-55" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <h5>Project Information's</h5>
                            <hr class="mb-30">
                            <table>
                                <tr>
                                    <td>Clients</td>
                                    <td><b>Ross M. Evans</b></td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td><b>Design & Branding</b></td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td><b>September, 2023</b></td>
                                </tr>
                                <tr>
                                    <td>Location</td>
                                    <td><b>USA</b></td>
                                </tr>
                                <tr>
                                    <td>Duration</td>
                                    <td><b>2 month</b></td>
                                </tr>
                            </table>
                            <div class="project-share mt-20">
                                <h5>Project Share</h5>
                                <div class="social-style-one">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="image mb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <img src="{{ asset('/assets/images/projects/project-details1.png') }}" alt="Project Details">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="image mb-30" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <img src="{{ asset('/assets/images/projects/project-details2.png') }}" alt="Project Details">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="project-details-content mt-15" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h5>Branding</h5>
                            <ul class="icon-list mt-20 mb-35">
                                <li><i class="fal fa-check"></i> Develop or refine the brand identity, including logo, colors, typography, and brand guidelines.</li>
                                <li><i class="fal fa-check"></i> Ensure the brand reflects the values and messaging of the product</li>
                            </ul>
                            <h5>User Experience (UX) Design:</h5>
                            <p>Throughout the project, effective communication and collaboration among the project team members, including designers, developers, marketers, and stakeholders, are crucial for its success. Regular reviews and feedback loops should be established to ensure that the digital product and branding align with the project's goals and objectives.</p>
                            <ul class="icon-list mt-25 mb-35">
                                <li><i class="fal fa-check"></i> Create wireframes and prototypes to visualize the product's layout and functionality</li>
                                <li><i class="fal fa-check"></i> Design the user interface (UI) based on the wireframes, incorporating the brand identity.</li>
                                <li><i class="fal fa-check"></i> Conduct usability testing to refine the design and user flow</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Project Details Area End -->
        
        
        <!-- Related Projects Area Start -->
        <section class="related-project-area py-85 rpy-55">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-xl-9 col-lg-11">
                        <div class="section-title mb-60" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Related Projects</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-6 item design">
                        <div class="project-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/projects/project-grid7.jpg') }}" alt="Project Grid">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('projectDetails') }}">Digital Product Design</a></h5>
                                <span class="category">Design, Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 item marketing seo">
                        <div class="project-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/projects/project-grid2.jpg') }}" alt="Project Grid">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('projectDetails') }}">Website Development</a></h5>
                                <span class="category">Design, Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 item seo design">
                        <div class="project-item" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/projects/project-grid9.jpg') }}" alt="Project Grid">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('projectDetails') }}">Digital Product Design</a></h5>
                                <span class="category">Design, Branding</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related Projects Area End -->

    <!-- footer area -->
    @include('frontend.includes.footers.footerOne')
    <!-- footer area end -->
@endsection