@extends('layouts/component')
@section('title')
@section('contents')

    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                            <!-- Start Single Slider -->
                            <div class="single-slider" style="background-image: url(assets1/images/hero/slider-bg1.jpg);">
                                <div class="content">
                                    <h2><span>No restocking fee ($35 savings)</span>
                                        M75 Sport Watch
                                    </h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                    <h3><span>Now Only</span> $320.99</h3>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                            <!-- Start Single Slider -->
                            <div class="single-slider" style="background-image: url(assets1/images/hero/slider-bg2.jpg);">
                                <div class="content">
                                    <h2><span>Big Sale Offer</span>
                                        Get the Best Deal on CCTV Camera
                                    </h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                    <h3><span>Combo Only:</span> $590.00</h3>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner"
                                style="background-image: url('assets1/images/hero/slider-bnr.jpg');">
                                <div class="content">
                                    <h2>
                                        <span>New line required</span>
                                        iPhone 12 Pro Max
                                    </h2>
                                    <h3>$259.99</h3>
                                </div>
                            </div>
                            <!-- End Small Banner -->
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>Weekly Sale!</h2>
                                    <p>Saving up to 50% off all online store items this week.</p>
                                    <div class="button">
                                        <a class="btn" href="product-grids.html">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Small Banner -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    @php
    use Carbon\Carbon;
@endphp


    <!-- Start Hot Products -->

@if($new_products->count())
    <section class="trending-product section py-5" style="margin-top: 12px;">
        <div class="container">
            <!-- Section Header -->
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h2>New Products</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                            alteration in some form.</p>
                    </div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="row g-3">
                @foreach ($new_products as $product)
                    @php
                        $total = $product->price - $product->discount_price;
                    @endphp
                    <div class="col-6 col-sm-6 col-md-4 col-20 d-flex justify-content-center">
                        <div class="card">
                            <div class="image-container">
                                <div class="first">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="wishlist1">
                                            <i class="lni lni-heart"></i>
                                        </span>
                                        @if($product->hot_date == Carbon::today()->toDateString())
                                            <span class="badge bg-primary">🔥Hot</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="image-container d-flex justify-content-center align-items-center"
                                    style="height: 200px; background-color: #f8f9fa; padding: 10px;">
                                    <a href="{{ url('/product-detail', $product->id) }}">
                                        <img src="{{ asset('uploads/products/galaries/' . $product->image) }}"
                                            class="img-fluid rounded-top thumbnail-image" alt="{{ $product->name }}"
                                            style="width: 100%; height: 200px; object-fit: contain; background-color: #f8f9fa; padding: 10px;">
                                    </a>
                                </div>
                            </div>

                            <div class="product-detail-container p-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="dress-name">{{ $product->name }}</h5>
                                    <div class="d-flex flex-column mb-2">
                                        <span class="new-price">${{ number_format($product->price, 0) }}</span>
                                        <small class="fs-7 text-decoration-line-through text-muted">
                                            ${{ number_format($product->discount_price, 0) }}
                                        </small>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center pt-1">
                                    <p class="mb-0">New Stock</p>
                                    <p class="text-primary fw-semibold mb-0">${{ $total }}</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center pt-1">
                                    <div>
                                        <i class="fa fa-star-o rating-star"></i>
                                        <span class="rating-number">{{ $product->category }}</span>
                                    </div>
                                    <form action="{{ url('add_to_cart', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-primary">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

    <!-- End Hot Products -->

    <!-- Start Laptop Products -->
    @if(isset($laptops))
        <section class="trending-product section py-5" style="margin-top: 12px;">
            <div class="container">
                <!-- Section Header -->
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <div class="section-title">
                            <h2>Laptop Products</h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                                alteration in some form.</p>
                        </div>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="row g-3">
                    @foreach ($laptops as $laptop)
                        @php
                            $total = $laptop->price - $laptop->discount_price;
                        @endphp
                        {{-- <div class="col-6 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center"> --}}
                            <div class="col-6 col-sm-6 col-md-4 col-20 d-flex justify-content-center">
                                <div class="card">

                                    <div class="image-container">
                                        <div class="first">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="wishlist1">
                                                    <i class="lni lni-heart"></i>
                                                </span>
                                                @if($laptop->hot_date == Carbon::today()->toDateString())
                                                    <span class="badge bg-primary">🔥Hot</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="image-container d-flex justify-content-center align-items-center"
                                            style="height: 200px; background-color: #f8f9fa; padding: 10px;">
                                            <a href="{{ url('/product-detail', $laptop->id) }}">
                                                <img src="{{ asset('uploads/products/galaries/' . $laptop->image) }}"
                                                    class="img-fluid rounded-top thumbnail-image" alt="{{ $laptop->name }}"
                                                    style="width: 100%; height: 200px; object-fit: contain; background-color: #f8f9fa; padding: 10px;">
                                            </a>
                                        </div>
                                    </div>


                                    <div class="product-detail-container p-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="dress-name">{{ $laptop->name }}</h5>
                                            <div class="d-flex flex-column mb-2">
                                                <span class="new-price">${{ number_format($laptop->price, 0) }}</span>
                                                <small class="fs-7 text-decoration-line-through text-muted">
                                                    ${{ number_format($laptop->discount_price, 0) }}
                                                </small>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center pt-1">
                                            <p class="mb-0">New Stock</p>
                                            <p class="text-primary fw-semibold mb-0">${{ $total }}</p>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center pt-1">
                                            <div>
                                                <i class="fa fa-star-o rating-star"></i>
                                                <span class="rating-number">{{ $laptop->category }}</span>
                                            </div>
                                            <form action="{{ url('add_to_cart', $laptop->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-primary">Add to Cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    </div>
                </div>
        </section>
    @endif
    <!--End Laptop Products -->
    @if(isset($tablets))
        <section class="trending-product section py-5" style="margin-top: 12px;">
            <div class="container">
                <!-- Section Header -->
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <div class="section-title">
                            <h2>Tablet Products</h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                                alteration in some form.</p>
                        </div>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="row g-3">
                    @foreach ($tablets as $tablet)
                        @php
                            $total = $tablet->price - $tablet->discount_price;
                        @endphp
                        {{-- <div class="col-6 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center"> --}}
                            <div class="col-6 col-sm-6 col-md-4 col-20 d-flex justify-content-center">
                                <div class="card">
                                    <div class="image-container">
                                        <div class="first">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="wishlist1">
                                                    <i class="lni lni-heart"></i>
                                                </span>
                                                @if($tablet->hot_date == Carbon::today()->toDateString())
                                                    <span class="badge bg-primary">🔥Hot</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="image-container d-flex justify-content-center align-items-center"
                                            style="height: 200px; background-color: #f8f9fa; padding: 10px;">
                                            <a href="{{url('product-detail/' . $tablet->id)}}">
                                                <img src="{{ asset('uploads/products/galaries/' . $tablet->image) }}"
                                                    class="img-fluid rounded-top thumbnail-image" alt="{{ $tablet->name }}"
                                                    style="width: 100%; height: 200px; object-fit: contain; background-color: #f8f9fa; padding: 10px;">
                                            </a>

                                        </div>
                                    </div>

                                    <div class="product-detail-container p-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="dress-name">{{ $tablet->name }}</h5>
                                            <div class="d-flex flex-column mb-2">
                                                <span class="new-price">${{ number_format($tablet->price, 0) }}</span>
                                                <small class="fs-7 text-decoration-line-through text-muted">
                                                    ${{ number_format($tablet->discount_price, 0) }}
                                                </small>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center pt-1">
                                            <p class="mb-0">New Stock</p>
                                            <p class="text-primary fw-semibold mb-0">${{ $total }}</p>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center pt-1">
                                            <div>
                                                <i class="fa fa-star-o rating-star"></i>
                                                <span class="rating-number">{{ $tablet->category }}</span>
                                            </div>
                                            <form action="{{ url('add_to_cart', $tablet->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-primary">Add to Cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    </div>
                </div>
        </section>
    @endif
    @if(isset($smartphones))
        <section class="trending-product section py-5" style="margin-top: 12px;">
            <div class="container">
                <!-- Section Header -->
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <div class="section-title">
                            <h2>Smartphone Products</h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                                alteration in some form.</p>
                        </div>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="row g-3">
                    @foreach ($smartphones as $smartphone)
                        @php
                            $total = $smartphone->price - $smartphone->discount_price;
                        @endphp
                        {{-- <div class="col-6 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center"> --}}
                            <div class="col-6 col-sm-6 col-md-4 col-20 d-flex justify-content-center">
                                <div class="card">
                                    <div class="image-container">
                                        <div class="first">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="wishlist1">
                                                    <i class="lni lni-heart"></i>
                                                </span>
                                                @if($smartphone->hot_date == Carbon::today()->toDateString())
                                                    <span class="badge bg-primary">🔥Hot</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="image-container d-flex justify-content-center align-items-center"
                                            style="height: 200px; background-color: #f8f9fa; padding: 10px;">
                                            <a href="{{url('product-detail/' . $smartphone->id)}}">
                                                <img src="{{ asset('uploads/products/galaries/' . $smartphone->image) }}"
                                                    class="img-fluid rounded-top thumbnail-image" alt="{{ $smartphone->name }}"
                                                    style="width: 100%; height: 200px; object-fit: contain; background-color: #f8f9fa; padding: 10px;">
                                            </a>

                                        </div>
                                    </div>

                                    <div class="product-detail-container p-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="dress-name">{{ $smartphone->name }}</h5>
                                            <div class="d-flex flex-column mb-2">
                                                <span class="new-price">${{ number_format($smartphone->price, 0) }}</span>
                                                <small class="fs-7 text-decoration-line-through text-muted">
                                                    ${{ number_format($smartphone->discount_price, 0) }}
                                                </small>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center pt-1">
                                            <p class="mb-0">New Stock</p>
                                            <p class="text-primary fw-semibold mb-0">${{ $total }}</p>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center pt-1">
                                            <div>
                                                <i class="fa fa-star-o rating-star"></i>
                                                <span class="rating-number">{{ $smartphone->category }}</span>
                                            </div>
                                            <form action="{{ url('add_to_cart', $smartphone->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-primary">Add to Cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    </div>
                </div>
        </section>
    @endif

    <!-- End Trending Product Area -->

    <!-- Start Call Action Area -->
    <section class="call-action section">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <div class="inner">
                        <div class="content">
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">Currently You are using free<br>
                                Lite version of ShopGrids</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">Please, purchase full version of the template
                                to get all pages,<br> features and commercial license.</p>
                            <div class="button wow fadeInUp" data-wow-delay=".8s">
                                <a href="javascript:void(0)" class="btn">Purchase Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call Action Area -->

    <!-- Start Banner Area -->
    <section class="banner section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner" style="background-image:url('assets1/images/banner/banner-1-bg.jpg')">
                        <div class="content">
                            <h2>Smart Watch 2.0</h2>
                            <p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
                            <div class="button">
                                <a href="product-grids.html" class="btn">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner custom-responsive-margin"
                        style="background-image:url('assets1/images/banner/banner-2-bg.jpg')">
                        <div class="content">
                            <h2>Smart Headphone</h2>
                            <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                                incididunt ut labore.</p>
                            <div class="button">
                                <a href="product-grids.html" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Shipping Info -->
    <section class="shipping-info">
        <div class="container">
            <ul>
                <!-- Free Shipping -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>Free Shipping</h5>
                        <span>On order over $99</span>
                    </div>
                </li>
                <!-- Money Return -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-support"></i>
                    </div>
                    <div class="media-body">
                        <h5>24/7 Support.</h5>
                        <span>Live Chat Or Call.</span>
                    </div>
                </li>
                <!-- Support 24/7 -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class="media-body">
                        <h5>Online Payment.</h5>
                        <span>Secure Payment Services.</span>
                    </div>
                </li>
                <!-- Safe Payment -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-reload"></i>
                    </div>
                    <div class="media-body">
                        <h5>Easy Return.</h5>
                        <span>Hassle Free Shopping.</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- End Shipping Info -->

@endsection