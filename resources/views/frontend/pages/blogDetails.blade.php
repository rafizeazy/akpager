@extends('frontend.layouts.app')
@section('title', $post->title . ' - PT Smartplus Indonesia')
@section('css')
<style>
    /* Preserve line breaks and white space in blog content */
    .content-body {
        white-space: pre-line;
        word-wrap: break-word;
    }
    
    .content-body p {
        margin-bottom: 1rem;
        line-height: 1.8;
    }
    
    .content-body ul, 
    .content-body ol {
        margin-bottom: 1rem;
        padding-left: 2rem;
    }
    
    .content-body h2,
    .content-body h3,
    .content-body h4 {
        margin-top: 2rem;
        margin-bottom: 1rem;
    }
    
    .content-body blockquote {
        margin: 1.5rem 0;
        padding-left: 1.5rem;
        border-left: 4px solid #e5e7eb;
    }
    
    .content-body code {
        background-color: #f3f4f6;
        padding: 0.2rem 0.4rem;
        border-radius: 0.25rem;
    }
    
    .content-body pre {
        background-color: #1f2937;
        color: #fff;
        padding: 1rem;
        border-radius: 0.5rem;
        overflow-x: auto;
        margin: 1rem 0;
    }
    
    .content-body img {
        max-width: 100%;
        height: auto;
        margin: 1.5rem 0;
        border-radius: 0.5rem;
    }
</style>
@endsection
@section('content')
    <!-- header area -->
    @include('frontend.includes.headers.headerOne')
    <!-- header area end -->

    <!-- Page Banner Start -->
    <section class="page-banner-area overlay py-250 rpy-120 rel z-1 bgs-cover text-center" style="background-image: url({{ $post->featured_image ? asset('assets/' . $post->featured_image) : asset('assets/images/backgrounds/banner.jpg') }});">
        <div class="container">
            <div class="banner-inner pt-70 rpt-60 text-white">
                <h2 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">{{ $post->title }}</h2>
                <ul class="blog-meta" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                    @if($post->category)
                        <li><a class="category" href="#">{{ $post->category->name }}</a></li>
                    @endif
                    @if($post->user)
                        <li>
                            <img src="{{ asset('assets/images/blog/author.png') }}" alt="Author"> 
                            <a href="#">{{ $post->user->name }}</a>
                        </li>
                    @endif
                    <li><i class="far fa-calendar-alt"></i> <a href="#">{{ $post->published_at->format('F d, Y') }}</a></li>
                    <li><i class="far fa-eye"></i> {{ $post->views }} views</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Page Banner End -->
    
    <!-- Blog Details Area Start -->
    <section class="blog-details-area py-130 rpy-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-wrap">
                        <div class="blog-details-content">
                            @if($post->featured_image)
                                <div class="image mb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                    <img src="{{ asset('assets/' . $post->featured_image) }}" alt="{{ $post->title }}">
                                </div>
                            @endif
                            
                            <div class="content-body">
                                {!! $post->content !!}
                            </div>
                            
                            <div class="tag-share pt-15 pb-40">
                                @if($post->tags->count() > 0)
                                    <div class="item" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                                        <b>Tags </b>
                                        <div class="tag-coulds">
                                            @foreach($post->tags as $tag)
                                                <a href="{{ route('blog') }}?tag={{ $tag->slug }}">{{ $tag->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                <div class="item" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                                    <b>Share </b>
                                    <div class="social-style-one">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blogDetails', ['post' => $post->id])) }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blogDetails', ['post' => $post->id])) }}&text={{ urlencode($post->title) }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blogDetails', ['post' => $post->id])) }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . route('blogDetails', ['post' => $post->id])) }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                        </div>
                        
                        @if($post->user)
                            <div class="admin-comment bgc-lighter mt-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <div class="comment-body">
                                    <div class="author-thumb">
                                        <img src="{{ asset('assets/images/blog/admin-author.jpg') }}" alt="{{ $post->user->name }}">
                                    </div>
                                    <div class="content">
                                        <h5>{{ $post->user->name }}</h5>
                                        <p>Author of this article</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        @if($prevPost || $nextPost)
                            <div class="next-prev-blog pt-60 pb-40">
                                @if($prevPost)
                                    <div class="item" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                                        <div class="image">
                                            @if($prevPost->featured_image)
                                                <img src="{{ asset('assets/' . $prevPost->featured_image) }}" alt="{{ $prevPost->title }}">
                                            @else
                                                <img src="{{ asset('assets/images/widget/news4.jpg') }}" alt="{{ $prevPost->title }}">
                                            @endif
                                        </div>
                                        <div class="content">
                                            <span class="date">{{ $prevPost->published_at->format('F d, Y') }}</span>
                                            <h6><a href="{{ route('blogDetails', ['post' => $prevPost->id]) }}">{{ Str::limit($prevPost->title, 50) }}</a></h6>
                                        </div>
                                    </div>
                                @endif
                                
                                @if($nextPost)
                                    <div class="item" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                                        <div class="image">
                                            @if($nextPost->featured_image)
                                                <img src="{{ asset('assets/' . $nextPost->featured_image) }}" alt="{{ $nextPost->title }}">
                                            @else
                                                <img src="{{ asset('assets/images/widget/news5.jpg') }}" alt="{{ $nextPost->title }}">
                                            @endif
                                        </div>
                                        <div class="content">
                                            <span class="date">{{ $nextPost->published_at->format('F d, Y') }}</span>
                                            <h6><a href="{{ route('blogDetails', ['post' => $nextPost->id]) }}">{{ Str::limit($nextPost->title, 50) }}</a></h6>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
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
                                                <h6><a href="{{ route('blogDetails', ['post' => $recentPost->id]) }}">{{ Str::limit($recentPost->title, 50) }}</a></h6>
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
    <!-- Blog Details Area End -->

    <!-- footer area -->
    @include('frontend.includes.footers.footerOne')
    <!-- footer area end -->
@endsection
