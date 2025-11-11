@extends('frontend.layouts.app')
@section('title', 'Project Masonry')
@section('content')
    <!-- header area -->
    @include('frontend.includes.headers.headerOne')
    <!-- header area end -->

        <!-- Page Banner Start -->
        <section class="page-banner-area overlay py-250 rpy-120 rel z-1 bgs-cover text-center" style="background-image: url({{ asset('assets/images/hero.png') }});">
            <div class="container">
                <div class="banner-inner pt-70 rpt-60 text-white">
                    <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Project Masonry</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Project Masonry</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
        
        
        <!-- Project Masonry Area Start -->
        <section class="project-masonry-area py-130 rpy-100">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-xl-9 col-lg-11">
                        <div class="section-title mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Revolutionizing Your Digital Landscape Our Dynamic Marketing Project</h2>
                        </div>
                    </div>
                </div>
                <div class="row project-masonry">
                    <div class="col-xl-4 col-md-6 item">
                        <div class="project-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/projects/project-masonry1.jpg') }}" alt="Project Masonry">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('projectDetails') }}">Digital Product Design</a></h5>
                                <span class="category">Design, Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 item">
                        <div class="project-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/projects/project-masonry2.jpg') }}" alt="Project Masonry">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('projectDetails') }}">Digital Product Design</a></h5>
                                <span class="category">Design, Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 item">
                        <div class="project-item" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/projects/project-masonry3.jpg') }}" alt="Project Masonry">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('projectDetails') }}">Digital Product Design</a></h5>
                                <span class="category">Design, Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 item">
                        <div class="project-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/projects/project-masonry5.jpg') }}" alt="Project Masonry">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('projectDetails') }}">Digital Product Design</a></h5>
                                <span class="category">Design, Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 item">
                        <div class="project-item" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/projects/project-masonry6.jpg') }}" alt="Project Masonry">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('projectDetails') }}">Digital Product Design</a></h5>
                                <span class="category">Design, Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 item">
                        <div class="project-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/projects/project-masonry4.jpg') }}" alt="Project Masonry">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('projectDetails') }}">Digital Product Design</a></h5>
                                <span class="category">Design, Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 item">
                        <div class="project-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/projects/project-masonry8.jpg') }}" alt="Project Masonry">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('projectDetails') }}">Digital Product Design</a></h5>
                                <span class="category">Design, Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 item">
                        <div class="project-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/projects/project-masonry7.jpg') }}" alt="Project Masonry">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('projectDetails') }}">Digital Product Design</a></h5>
                                <span class="category">Design, Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 item">
                        <div class="project-item" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/projects/project-masonry9.jpg') }}" alt="Project Masonry">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('projectDetails') }}">Digital Product Design</a></h5>
                                <span class="category">Design, Branding</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="more-btn pt-20 text-center" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <a href="#" class="theme-btn">View More <i class="far fa-arrow-right"></i></a>
                </div>
            </div>
        </section>
        <!-- Project Masonry Area End -->

    <!-- footer area -->
    @include('frontend.includes.footers.footerOne')
    <!-- footer area end -->
@endsection