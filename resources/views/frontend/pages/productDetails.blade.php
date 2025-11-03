@extends('frontend.layouts.app')
@section('title', 'Product Details')
@section('content')
    <!-- header area -->
    @include('frontend.includes.headers.headerOne')
    <!-- header area end -->

        <!-- Page Banner Start -->
        <section class="page-banner-area overlay py-250 rpy-120 rel z-1 bgs-cover text-center" style="background-image: url({{ asset('assets/images/backgrounds/banner.jpg') }});">
            <div class="container">
                <div class="banner-inner pt-70 rpt-60 text-white">
                    <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Product Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Product Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
        
        
        <!-- Product Details Start -->
        <section class="product-details pb-10 pt-130 rpt-100">
            <div class="container">
                <div class="row gap-110">
                    <div class="col-lg-7">
                        <div class="product-details-images rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="tab-content preview-images">
                                <div class="tab-pane fade preview-item active show" id="preview1">
                                    <img src="{{ asset('/assets/images/products/preview1.png') }}" alt="Perview">
                                </div>
                                <div class="tab-pane fade preview-item" id="preview2">
                                    <img src="{{ asset('/assets/images/products/preview1.png') }}" alt="Perview">
                                </div>
                                <div class="tab-pane fade preview-item" id="preview3">
                                    <img src="{{ asset('/assets/images/products/preview1.png') }}" alt="Perview">
                                </div>
                            </div>
                            <div class="nav thumb-images rmb-20">
                                <a href="#preview1" data-bs-toggle="tab" class="thumb-item active show">
                                    <img src="{{ asset('/assets/images/products/thumb1.png') }}" alt="Thumb">
                                </a>
                                <a href="#preview2" data-bs-toggle="tab" class="thumb-item">
                                    <img src="{{ asset('/assets/images/products/thumb2.png') }}" alt="Thumb">
                                </a>
                                <a href="#preview3" data-bs-toggle="tab" class="thumb-item">
                                    <img src="{{ asset('/assets/images/products/thumb3.png') }}" alt="Thumb">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="product-details-content" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <div class="ratting mb-10">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="section-title">
                                <h2>Summer M T-Shirt</h2>
                            </div>
                            <span class="price mb-30">$13.00</span>
                            <p>Doloremque laudantium, totam rem aperiam, eaque ipsa quae abillo inventore veritatis quasi architecto beatae vitae dicta sunt explicabo Nemo enim ipsam voluptatem quia to voluptas sit aspernatur aut odit autfugite</p>
                            <form action="#" class="add-to-cart pt-15">
                                <input type="number" value="01" min="1" max="20" onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;" required>
                                <button type="submit" class="theme-btn">Add to Cart <i class="far fa-arrow-right"></i></button>
                            </form>
                            <ul class="category-tags pt-45 rpt-20">
                                <li>
                                    <h5>Categories  : </h5>
                                    <a href="#">T-Shirt</a>
                                    <a href="#">Bag</a>
                                    <a href="#">Shoe</a>
                                </li>
                                <li>
                                    <h5>Popular Tags : </h5>
                                   <div class="tag-coulds">
                                        <a href="#">Shop</a>
                                        <a href="#">Men</a>
                                        <a href="#">Women</a>
                                   </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav nav advanced-tab style-two product-info-tab mt-90 mb-40" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <li><a href="#details" data-bs-toggle="tab" class="active show">Descrptions <i class="far fa-arrow-right"></i></a></li>
                    <li><a href="#reviews" data-bs-toggle="tab"> Reviews <i class="far fa-arrow-right"></i></a></li>
                    <li><a href="#information" data-bs-toggle="tab">Additional Information's <i class="far fa-arrow-right"></i></a></li>
                </ul>
                <div class="tab-content pb-30" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                    <div class="tab-pane fade active show" id="details">
                        <p>Must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally</p>
                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam</p>
                    </div>
                    <div class="tab-pane fade" id="reviews">
                        <h5>2 Reviews</h5>
                        <div class="comments">
                            <div class="comment-body">
                                <div class="author-thumb">
                                    <img src="{{ asset('/assets/images/blog/comment-author1.png') }}" alt="Author">
                                </div>
                                <div class="content">
                                    <ul class="comment-header">
                                        <li>
                                            <h6>William L. Jackson</h6>
                                        </li>
                                        <li>
                                            <a href="#">Sep 25, 2023</a>
                                        </li>
                                    </ul>
                                    <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse molestiae consequatur qui dolorem eum fugiat voluptas</p>
                                    <div class="ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-body">
                                <div class="author-thumb">
                                    <img src="{{ asset('/assets/images/blog/comment-author2.png') }}" alt="Author">
                                </div>
                                <div class="content">
                                    <ul class="comment-header">
                                        <li>
                                            <h6>James M. Stovall</h6>
                                        </li>
                                        <li>
                                            <a href="#">February 25, 2024</a>
                                        </li>
                                    </ul>
                                    <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse molestiae consequatur qui dolorem eum fugiat voluptas</p>
                                    <div class="ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="information">
                        <h5>Additional information</h5>
                        <p>Circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses</p>
                        <ul class="list mt-20">
                            <li>T-Shirt</li>
                            <li>Leather Bag</li>
                            <li>Man Smart Watch</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product Details End -->
        
        
        <!-- Related Product Area Start -->
        <section class="related-product-area py-80 rpy-50">
            <div class="container">
                <div class="section-title text-center mb-55" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h2>Related Product</h2>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="product-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/products/product1.png') }}" alt="Product">
                            </div>
                            <div class="content">
                               <div class="ratting">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h5><a href="{{ route('productDetails') }}">Summer M T-Shirt</a></h5>
                                <span class="price">$13.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="product-item" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/products/product2.png') }}" alt="Product">
                            </div>
                            <div class="content">
                               <div class="ratting">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h5><a href="{{ route('productDetails') }}">Men Leather Shoe</a></h5>
                                <span class="price">$13.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="product-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/products/product4.png') }}" alt="Product">
                            </div>
                            <div class="content">
                               <div class="ratting">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h5><a href="{{ route('productDetails') }}">Summer M T-Shirt</a></h5>
                                <span class="price">$13.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="product-item" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('/assets/images/products/product5.png') }}" alt="Product">
                            </div>
                            <div class="content">
                               <div class="ratting">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h5><a href="{{ route('productDetails') }}">Modern smart watch</a></h5>
                                <span class="price">$13.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related Product Area End -->

    <!-- footer area -->
    @include('frontend.includes.footers.footerOne')
    <!-- footer area end -->
@endsection