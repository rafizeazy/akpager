@extends('frontend.layouts.app')
@section('title', 'Team Member')
@section('content')
    <!-- header area -->
    @include('frontend.includes.headers.headerOne')
    <!-- header area end -->

        <!-- Page Banner Start -->
        <section class="page-banner-area overlay py-250 rpy-120 rel z-1 bgs-cover text-center" style="background-image: url({{ asset('assets/images/hero.png') }});">
            <div class="container">
                <div class="banner-inner pt-70 rpt-60 text-white">
                    <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Team Member</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Team Member</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
       
        
        <!-- Innovation Dedication Area Start -->
        <section class="innovation-dedication-area py-130 rpy-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="innovation-dedication-content rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title mb-30">
                                <h2>Get to Know the Faces Fueling Our Innovation and Dedication</h2>
                            </div>
                            <p>At our core, we are a diverse and dynamic team of passionate individuals who bring a wealth of expertise to the table. Each member of our team is carefully selected not only for their professional qualifications dedication</p>
                            <a href="{{ route('contact') }}" class="theme-btn mt-25">Become a Team Member <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="innovation-dedication-images">
                            <div class="image-one" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                                <img src="{{ asset('/assets/images/about/innovation1.png') }}" alt="Innovation">
                            </div>
                            <div class="image-two" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                                <img src="{{ asset('/assets/images/about/innovation2.png') }}" alt="Innovation">
                            </div>
                            <div class="image-three" data-aos="zoom-in" data-aos-delay="400" data-aos-duration="1500">
                                <img src="{{ asset('/assets/images/about/innovation3.png') }}" alt="Innovation">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Innovation Dedication Area End -->
        
        
        <!-- Team Area Start -->
        <section class="team-area pb-80 rpb-50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="section-title text-center mb-55" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Let’s Meet Our Professionals Team Members</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="team-member" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/team/member1.png') }}" alt="Team">
                                <div class="social-media">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="description">
                                <h5>Jerome C. Ramirez</h5>
                                <span class="designation">CEO & Founder</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="team-member" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/team/member2.png') }}" alt="Team">
                                <div class="social-media">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="description">
                                <h5>Reginald F. Richardson</h5>
                                <span class="designation">Senior Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="team-member" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/team/member3.png') }}" alt="Team">
                                <div class="social-media">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="description">
                                <h5>Patrick D. Kozlowski</h5>
                                <span class="designation">Web Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="team-member" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/team/member4.png') }}" alt="Team">
                                <div class="social-media">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="description">
                                <h5>Patrick M. Piazza</h5>
                                <span class="designation">Junior manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="team-member" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/team/member5.png') }}" alt="Team">
                                <div class="social-media">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="description">
                                <h5>Miles, Esther</h5>
                                <span class="designation">Senior Software Engineer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="team-member" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/team/member6.png') }}" alt="Team">
                                <div class="social-media">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="description">
                                <h5>Flores, Juanita</h5>
                                <span class="designation">Vice President</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="team-member" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/team/member7.png') }}" alt="Team">
                                <div class="social-media">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="description">
                                <h5>Nguyen, Shane</h5>
                                <span class="designation">Project Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="team-member" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/team/member8.png') }}" alt="Team">
                                <div class="social-media">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="description">
                                <h5>Cooper, Kristin</h5>
                                <span class="designation">Programmer Analyst</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="team-member" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/team/member9.png') }}" alt="Team">
                                <div class="social-media">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="description">
                                <h5>Jerome C. Ramirez</h5>
                                <span class="designation">CEO & Founder</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="team-member" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/team/member10.png') }}" alt="Team">
                                <div class="social-media">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="description">
                                <h5>Reginald F. Richardson</h5>
                                <span class="designation">Senior Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="team-member" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/team/member11.png') }}" alt="Team">
                                <div class="social-media">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="description">
                                <h5>Black, Marvin</h5>
                                <span class="designation">Technical Specialist</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="team-member" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/team/member12.png') }}" alt="Team">
                                <div class="social-media">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="description">
                                <h5>Henry, Arthur</h5>
                                <span class="designation">System Analyst</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team Area End -->
        
        
        <!-- Countries Area Start -->
        <section class="countries-area rel z-1 pb-70 rpb-40">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-7 col-md-9 col-sm-11">
                        <div class="section-title text-center mb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Trusted by Millions in 45+ countries.</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="marquee-slider-right style-three iconic-slider-right">
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag1.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">United States</h6>
                    </div>
                </div>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag2.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">South Africa</h6>
                    </div>
                </div>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag3.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">Russia</h6>
                    </div>
                </div>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag4.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">Brazil</h6>
                    </div>
                </div>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag5.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">Australia</h6>
                    </div>
                </div>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag6.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">China</h6>
                    </div>
                </div>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag7.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">Argentina</h6>
                    </div>
                </div>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag8.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">Kazakhstan</h6>
                    </div>
                </div>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag9.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">Algeria</h6>
                    </div>
                </div>
            </div>
            
            <div class="marquee-slider-left style-three iconic-slider-left" dir="rtl">
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag10.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">Denmark</h6>
                    </div>
                </div>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag11.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">Saudi Arabia</h6>
                    </div>
                </div>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag12.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">Mexico</h6>
                    </div>
                </div>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag13.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">Indonesia</h6>
                    </div>
                </div>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag14.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">Sudan</h6>
                    </div>
                </div>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag15.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">Mongolia</h6>
                    </div>
                </div>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag16.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">Colombia</h6>
                    </div>
                </div>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag17.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">Ethiopia</h6>
                    </div>
                </div>
                <div class="marquee-iconic-box">
                    <div class="image">
                        <img src="{{ asset('/assets/images/marquee-box/flag18.png') }}" alt="Flag">
                    </div>
                    <div class="content">
                        <h6 class="title">Nigeria</h6>
                    </div>
                </div>
            </div>
            
            <div class="container">
                <div class="image mt-40 text-center" data-aos="zoom-in-up" data-aos-duration="1500">
                    <img src="{{ asset('/assets/images/backgrounds/map-locations.png') }}" alt="Map Locations">
                </div>
            </div>
        </section>
        <!-- Countries Area End -->

    <!-- footer area -->
    @include('frontend.includes.footers.footerOne')
    <!-- footer area end -->
@endsection