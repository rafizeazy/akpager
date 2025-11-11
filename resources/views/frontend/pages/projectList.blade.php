@extends('frontend.layouts.app')
@section('title', 'Project List')
@section('content')
    <!-- header area -->
    @include('frontend.includes.headers.headerOne')
    <!-- header area end -->

        <!-- Page Banner Start -->
        <section class="page-banner-area overlay py-250 rpy-120 rel z-1 bgs-cover text-center" style="background-image: url({{ asset('assets/images/hero.png') }});">
            <div class="container">
                <div class="banner-inner pt-70 rpt-60 text-white">
                    <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Project List</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Project List</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
        
        
        <!-- Project List Area Start -->
        <section class="project-list-area py-130 rpy-100">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-xl-9 col-lg-11">
                        <div class="section-title mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Revolutionizing Your Digital Landscape Our Dynamic Marketing Project</h2>
                        </div>
                    </div>
                </div>
                <div class="project-item style-two">
                    <div class="image" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <img src="{{ asset('/assets/images/projects/project-list1.jpg') }}" alt="Project List">
                    </div>
                    <div class="content" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <a class="category" href="#">Design, Branding</a>
                        <h2><a href="{{ route('projectDetails') }}">Digital Product Design and Branding</a></h2>
                        <p>Sed ut perspiciatis unde omnis natus voluptatem accusantium doloremque laudantium totamto aperiame eaque ipsa quae abillo inventore veritatis</p>
                        <a href="{{ route('projectDetails') }}" class="details-btn"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="project-item style-two">
                    <div class="content" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <a class="category" href="#">Design, Branding</a>
                        <h2><a href="{{ route('projectDetails') }}">Website Design and Development</a></h2>
                        <p>Sed ut perspiciatis unde omnis natus voluptatem accusantium doloremque laudantium totamto aperiame eaque ipsa quae abillo inventore veritatis</p>
                        <a href="{{ route('projectDetails') }}" class="details-btn"><i class="far fa-arrow-right"></i></a>
                    </div>
                    <div class="image" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <img src="{{ asset('/assets/images/projects/project-list2.jpg') }}" alt="Project List">
                    </div>
                </div>
                <div class="project-item style-two">
                    <div class="image" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <img src="{{ asset('/assets/images/projects/project-list3.jpg') }}" alt="Project List">
                    </div>
                    <div class="content" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <a class="category" href="#">Design, Branding</a>
                        <h2><a href="{{ route('projectDetails') }}">Digital Product Design and Branding</a></h2>
                        <p>Sed ut perspiciatis unde omnis natus voluptatem accusantium doloremque laudantium totamto aperiame eaque ipsa quae abillo inventore veritatis</p>
                        <a href="{{ route('projectDetails') }}" class="details-btn"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="project-item style-two">
                    <div class="content" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <a class="category" href="#">Design, Branding</a>
                        <h2><a href="{{ route('projectDetails') }}">Digital Product Design and Branding</a></h2>
                        <p>Sed ut perspiciatis unde omnis natus voluptatem accusantium doloremque laudantium totamto aperiame eaque ipsa quae abillo inventore veritatis</p>
                        <a href="{{ route('projectDetails') }}" class="details-btn"><i class="far fa-arrow-right"></i></a>
                    </div>
                    <div class="image" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <img src="{{ asset('/assets/images/projects/project-list4.jpg') }}" alt="Project List">
                    </div>
                </div>
                <div class="project-item style-two">
                    <div class="image" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <img src="{{ asset('/assets/images/projects/project-list5.jpg') }}" alt="Project List">
                    </div>
                    <div class="content" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <a class="category" href="#">Design, Branding</a>
                        <h2><a href="{{ route('projectDetails') }}">Digital Product Design and Branding</a></h2>
                        <p>Sed ut perspiciatis unde omnis natus voluptatem accusantium doloremque laudantium totamto aperiame eaque ipsa quae abillo inventore veritatis</p>
                        <a href="{{ route('projectDetails') }}" class="details-btn"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="project-item style-two">
                    <div class="content" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <a class="category" href="#">Design, Branding</a>
                        <h2><a href="{{ route('projectDetails') }}">Digital Product Design and Branding</a></h2>
                        <p>Sed ut perspiciatis unde omnis natus voluptatem accusantium doloremque laudantium totamto aperiame eaque ipsa quae abillo inventore veritatis</p>
                        <a href="{{ route('projectDetails') }}" class="details-btn"><i class="far fa-arrow-right"></i></a>
                    </div>
                    <div class="image" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <img src="{{ asset('/assets/images/projects/project-list6.jpg') }}" alt="Project List">
                    </div>
                </div>
                <div class="more-btn text-center" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <a href="#" class="theme-btn">View More <i class="far fa-arrow-right"></i></a>
                </div>
            </div>
        </section>
        <!-- Project List Area End -->

    <!-- footer area -->
    @include('frontend.includes.footers.footerOne')
    <!-- footer area end -->
@endsection