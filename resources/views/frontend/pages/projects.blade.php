@extends('frontend.layouts.app')
@section('title', 'Projects')
@section('content')
    <!-- header area -->
    @include('frontend.includes.headers.headerOne')
    <!-- header area end -->

        <!-- Page Banner Start -->
        <section class="page-banner-area overlay py-250 rpy-120 rel z-1 bgs-cover text-center" style="background-image: url({{ asset('assets/images/backgrounds/banner.jpg') }});">
            <div class="container">
                <div class="banner-inner pt-70 rpt-60 text-white">
                    <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Project Grid</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Project Grid</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
        
        
        <!-- Project Grid Area Start -->
        <section class="project-grid-area pt-130 rpt-100 pb-85 rpb-55">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-xl-9 col-lg-11">
                        <div class="section-title mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Revolutionizing Your Digital Landscape Our Dynamic Marketing Project</h2>
                        </div>
                    </div>
                </div>
                <ul class="project-nav mb-40" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                    <li data-filter="*" class="active">Show All</li>
                    <li data-filter=".design">Design</li>
                    <li data-filter=".marketing">Marketing</li>
                    <li data-filter=".branding">Branding</li>
                    <li data-filter=".seo">SEO</li>
                </ul>
                <div class="row project-active">
                    <div class="col-xl-4 col-md-6 item marketing">
                        <div class="project-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/projects/project-grid1.jpg') }}" alt="Project Grid">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('projectDetails') }}">Digital Product Design</a></h5>
                                <span class="category">Design, Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 item design seo">
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
                    <div class="col-xl-4 col-md-6 item branding">
                        <div class="project-item" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/projects/project-grid3.jpg') }}" alt="Project Grid">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('projectDetails') }}">Digital Product Design</a></h5>
                                <span class="category">Design, Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 item design seo">
                        <div class="project-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/projects/project-grid4.jpg') }}" alt="Project Grid">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('projectDetails') }}">Website Development</a></h5>
                                <span class="category">Design, Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 item marketing branding">
                        <div class="project-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/projects/project-grid5.jpg') }}" alt="Project Grid">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('projectDetails') }}">Digital Product Design</a></h5>
                                <span class="category">Design, Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 item branding seo design">
                        <div class="project-item" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/projects/project-grid6.jpg') }}" alt="Project Grid">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('projectDetails') }}">Website Development</a></h5>
                                <span class="category">Design, Branding</span>
                            </div>
                        </div>
                    </div>
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
                                <img src="{{ asset('/assets/images/projects/project-grid8.jpg') }}" alt="Project Grid">
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
        <!-- Project Grid Area End -->

    <!-- footer area -->
    @include('frontend.includes.footers.footerOne')
    <!-- footer area end -->
@endsection