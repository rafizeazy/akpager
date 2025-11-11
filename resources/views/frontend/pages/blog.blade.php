@extends('frontend.layouts.app')
@section('title', 'Blog - IoT Solution & Services')
@section('css')
<style>
    /* Fixed size for blog card images */
    .blog-item .image {
        width: 100%;
        height: 290px;
        overflow: hidden;
        position: relative;
        border-radius: 8px;
    }
    
    .blog-item .image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: all 0.5s ease;
        transform: scale(1);
    }
    
    /* Hover effects */
    .blog-item:hover .image img {
        transform: scale(1.15);
    }
    
    /* Overlay effect on hover */
    .blog-item .image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.7) 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 1;
        pointer-events: none;
    }
    
    .blog-item:hover .image::before {
        opacity: 1;
    }
    
    /* Card hover effect */
    .blog-item {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .blog-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    
    /* Title styling - fixed height untuk konsistensi */
    .blog-item .content h5 {
        min-height: 60px;
        max-height: 60px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        line-height: 1.5;
        margin-bottom: 15px;
    }
    
    /* Title link hover effect - underline */
    .blog-item .content h5 a {
        position: relative;
        display: inline;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .blog-item .content h5 a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -2px;
        left: 0;
        background-color: currentColor;
        transition: width 0.3s ease;
    }
    
    .blog-item .content h5 a:hover::after {
        width: 100%;
    }
    
    .blog-item .content h5 a:hover {
        color: #ff6b6b;
    }
</style>
@endsection
@section('content')
    <!-- header area -->
    @include('frontend.includes.headers.headerOne')
    <!-- header area end -->

    <!-- Page Banner Start -->
    <section class="page-banner-area overlay py-120 rpy-80 rel z-1 bgs-cover text-center" style="background-image: url({{ asset('assets/images/hero.png') }});">
        <div class="container">
            <div class="banner-inner pt-70 rpt-60 text-white">
                <h2 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Our Blog</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Page Banner End -->
    
    <!-- Blog Area Start -->
    <section class="blog-area py-130 rpy-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if($posts->count() > 0)
                        <div class="row">
                            @foreach($posts as $post)
                                <div class="col-md-6">
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
                                                <li>
                                                    <a class="category" href="#">
                                                        @if($post->category)
                                                            {{ $post->category->name }}
                                                        @else
                                                            Uncategorized
                                                        @endif
                                                    </a>
                                                </li>
                                                <li>
                                                    <i class="far fa-calendar-alt"></i> 
                                                    <a href="#">{{ $post->published_at->format('F d, Y') }}</a>
                                                </li>
                                            </ul>
                                            <h5>
                                                <a href="{{ route('blogDetails', ['post' => $post->id]) }}">{{ $post->title }}</a>
                                            </h5>
                                            <p>{{ $post->excerpt ? Str::limit($post->excerpt, 120) : Str::limit(strip_tags($post->content), 120) }}</p>
                                            <a href="{{ route('blogDetails', ['post' => $post->id]) }}" class="read-more">
                                                Read More <i class="far fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- Pagination -->
                        @if($posts->hasPages())
                            <div class="pagination-area pt-50">
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}
                                    @if ($posts->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link"><i class="far fa-angle-left"></i></span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $posts->previousPageUrl() }}"><i class="far fa-angle-left"></i></a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($posts->links()->elements[0] as $page => $url)
                                        @if ($page == $posts->currentPage())
                                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                        @else
                                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($posts->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $posts->nextPageUrl() }}"><i class="far fa-angle-right"></i></a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link"><i class="far fa-angle-right"></i></span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        @endif
                    @else
                        <div class="alert alert-info">
                            <p>No blog posts available at the moment. Please check back later!</p>
                        </div>
                    @endif
                </div>
                
                <div class="col-lg-4">
                    <div class="main-sidebar rmt-75">
                        <div class="widget widget-search" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <h5 class="widget-title">Search</h5>
                            <form action="{{ route('blog') }}" method="GET" class="default-search-form">
                                <input type="text" name="search" placeholder="Search posts..." value="{{ request('search') }}">
                                <button type="submit" class="searchbutton far fa-search"></button>
                            </form>
                        </div>
                        
                        @if($categories->count() > 0)
                            <div class="widget widget-category" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="widget-title">Categories</h5>
                                <ul>
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{ route('blog') }}?category={{ $category->slug }}">
                                                {{ $category->name }} 
                                                <span>({{ $category->posts_count }})</span>
                                                <i class="far fa-arrow-right"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        @if($recentPosts->count() > 0)
                            <div class="widget widget-recent-news" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                <h4 class="widget-title">Recent Posts</h4>
                                <ul>
                                    @foreach($recentPosts as $recentPost)
                                        <li>
                                            <div class="image">
                                                @if($recentPost->featured_image)
                                                    <img src="{{ asset('assets/' . $recentPost->featured_image) }}" alt="{{ $recentPost->title }}">
                                                @else
                                                    <img src="{{ asset('assets/images/widget/news1.jpg') }}" alt="{{ $recentPost->title }}">
                                                @endif
                                            </div>
                                            <div class="content">
                                                <span class="date">{{ $recentPost->published_at->format('F d, Y') }}</span>
                                                <h6><a href="{{ route('blogDetails', $recentPost->slug) }}">{{ Str::limit($recentPost->title, 50) }}</a></h6>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        @if($popularTags->count() > 0)
                            <div class="widget widget-tag-cloud" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                <h4 class="widget-title">Popular Tags</h4>
                                <div class="tag-coulds">
                                    @foreach($popularTags as $tag)
                                        <a href="{{ route('blog') }}?tag={{ $tag->slug }}">{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        
                        <div class="widget widget-cta" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <h3>Need IoT Solutions for Your Business?</h3>
                            <a href="{{ route('contact') }}" class="theme-btn">Contact Us <i class="far fa-arrow-right"></i></a>
                            <div class="man"><img src="{{ asset('assets/images/widget/cta-man.png') }}" alt="CTA"></div>
                            <div class="bg bgs-cover" style="background-image: url({{ asset('assets/images/widget/cta-bg.png') }});"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End -->

    <!-- footer area -->
    @include('frontend.includes.footers.footerOne')
    <!-- footer area end -->
@endsection
