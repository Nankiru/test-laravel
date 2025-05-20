@extends('layouts.component')
@section('title')
@section('contents')


    <style>
        img[data-aos] {
            transition: transform 0.3s ease;
        }

        img[data-aos]:hover {
            transform: scale(1.1);
        }
    </style>
    <style>
        .single-slider {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease, transform 1s ease;
        }

        .single-slider.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    <script>
        window.addEventListener("DOMContentLoaded", function() {
            const sliders = document.querySelectorAll('.single-slider');

            sliders.forEach((slider, index) => {
                setTimeout(() => {
                    slider.classList.add('active');
                }, index * 300); // Delay between slides (optional)
            });
        });
    </script>

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
                                        <a href="#shop" class="btn scroll">Shop Now</a>
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
                                        <a href="#" class="btn">Shop Now</a>
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
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding " data-aos="zoom-in">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner"
                                style="background-image: url('https://www.allphones.com.au/media/catalog/category/macbook_pro.jpg');">
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
                        <div class="col-lg-12 col-md-6 col-12" data-aos="zoom-in">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner style2"
                                style="background-image:url('https://www.khmertimeskh.com/wp-content/uploads/2019/01/e-Gen-top-pix.jpg')">
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

    @if ($products->count())
        <section id="scroll" class="trending-product section py-5" style="margin-top: 12px;">
            <div class="container">
                <!-- Section Header -->
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <div class="section-title">
                            <h2 data-aos="zoom-in" data-aos-duration="600" class="font-khmer-loy">
                                {{ __('frontend/messages.all_products') }}</h2>
                            <p class="font-khmer-loy" data-aos="fade-up" data-aos-duration="600">
                                {{ __('frontend/messages.product_description') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="row g-3">
                    @foreach ($products as $product)
                        @php
                            $total = $product->price - $product->discount_price;
                        @endphp
                        <div class="col-6 col-sm-6 col-md-4 col-20 d-flex justify-content-center" data-aos="zoom-in"
                            data-aos-duration="600">
                            <div class="card">
                                <div class="image-container">
                                    <div class="first">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="wishlist1">
                                                <i class="lni lni-heart"></i>
                                            </span>
                                            @if (Carbon::parse($product->created_at)->isToday())
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
                                        @php
                                            $isLoggedIn = Auth::check();
                                        @endphp

                                        @if ($isLoggedIn)
                                            <form action="{{ url('add_to_cart', $product->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-primary font-khmer">
                                                    {{ __('frontend/messages.add_to_cart') }}
                                                </button>
                                            </form>
                                        @else
                                            <button type="button" class="btn btn-sm btn-outline-primary font-khmer"
                                                data-bs-toggle="modal" data-bs-target="#loginModal">
                                                {{ __('frontend/messages.add_to_cart') }}
                                            </button>
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif



    <!-- Modern Login Alert Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4 rounded-4 shadow-lg border-0">
                <div class="modal-header border-0">
                    <h5 class="modal-title w-100 text-center fw-bold font-khmer-loy" id="loginModalLabel">
                        <i class="zmdi zmdi-lock-outline me-2"></i> {{ __('frontend/messages.login_required') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center">
                    <p class="text-muted mb-4 font-khmer-loy">{{ __('frontend/messages.login_to_add_cart') }}
                    </p>
                    <a href="{{ url('signin') }}" class="btn btn-primary rounded-pill px-4 py-2 font-khmer-loy">
                        <i class="zmdi zmdi-sign-in me-2 "></i> {{ __('frontend/messages.login_now') }}

                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .modal-content {
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .modal-body p {
            font-size: 1rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4a90e2, #007bff);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #3c7edb, #0056b3);
        }
    </style>




    <!-- End Hot Products -->


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

    <!-- Client 1 - Bootstrap Brain Component -->
    <section class="py-3 py-md-5 py-xl-8">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="mb-4 display-5 text-center">Clients</h2>
                    <p class="text-secondary mb-5 text-center">Our clients are the backbone of our business. We are proud
                        to work with a wide range of companies, from small businesses to Fortune 500 enterprises.</p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>

        <div class="container overflow-hidden">
            <div class="row gy-5">
                <div class="col-6 col-md-3 align-self-center text-center" data-aos="zoom-in" data-aos-duration="600">
                    <img class="img-fluid client-logo"
                        src="https://static.wixstatic.com/media/ebf785_36812a5a587445479be6145284aecfa9~mv2.jpg/v1/fill/w_705,h_240,al_c,q_80/aba.jpg"
                        alt="">
                </div>
                <div class="col-6 col-md-3 align-self-center text-center" data-aos="zoom-in" data-aos-duration="600">
                    <img class="img-fluid client-logo"
                        src="https://static.wixstatic.com/media/d098c7_2b27aff5f559425aab51dde7a1616e98~mv2.jpg/v1/fill/w_640,h_218,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/Otres%20Resort.jpg"
                        alt="">
                </div>
                <div class="col-6 col-md-3 align-self-center text-center" data-aos="zoom-in" data-aos-duration="600">
                    <img class="img-fluid client-logo"
                        src="https://hrincjobs-pro.s3.amazonaws.com/media/public/filer_public/b3/fb/b3fbde04-ff95-401d-8243-076a2c388e69/cimb-bank.jpg"
                        alt="">
                </div>
                <div class="col-6 col-md-3 align-self-center text-center" data-aos="zoom-in" data-aos-duration="600">
                    <img class="img-fluid client-logo"
                        src="https://ibccambodia.com/wp-content/uploads/2019/09/Wing-Bank-01-scaled.jpg.webp"
                        alt="">
                </div>
                <div class="col-6 col-md-3 align-self-center text-center" data-aos="zoom-in" data-aos-duration="600">
                    <img class="img-fluid client-logo"
                        src="https://cdn.prod.website-files.com/5ed5d70bbc49f0900dfaaaae/65f022466cc15b76c4978972_Vattanac%20Bank%20Logo%20low.jpg"
                        alt="">
                </div>
                <div class="col-6 col-md-3 align-self-center text-center" data-aos="zoom-in" data-aos-duration="600">
                    <img class="img-fluid client-logo"
                        src="https://ixopay-adapters-prod.cdn.ixocreate.com/logos/method/TRUE/6285d905d7e28/TRUE_social.png"
                        alt="">
                </div>
                <div class="col-6 col-md-3 align-self-center text-center" data-aos="zoom-in" data-aos-duration="600">
                    <img class="img-fluid client-logo"
                        src="https://e8wm23is9ki.exactdn.com/wp-content/uploads/2014/06/paypal_logo.jpg?strip=all&lossy=1&resize=1920%2C708&ssl=1"
                        alt="">
                </div>
                <div class="col-6 col-md-3 align-self-center text-center" data-aos="zoom-in" data-aos-duration="600">
                    <img data-aos="zoom-in" data-aos-duration="600" class="img-fluid client-logo"
                        src="https://thisisbp.com/web/image/46222/logos.png"
                        alt="">
                </div>
            </div>
        </div>
    </section>

    <style>
        @keyframes zoomIn {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .client-logo {
            animation: zoomIn 0.6s ease forwards;
            opacity: 0;
            transition: transform 0.3s ease;
        }

        .client-logo:hover {
            transform: scale(1.1);
        }
    </style>


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
                                <a href="#" class="btn">Shop Now</a>
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


    {{-- Alert Check Login Or Not --}}

    <script>
        function showLoginAlert() {
            Swal.fire({
                icon: 'info',
                title: 'Login Required',
                text: 'Please log in to add items to your cart.',
                confirmButtonText: 'Login Now',
                showCancelButton: true,
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ url('signin') }}"; // Adjust to your login route
                }
            });
        }
    </script>



@endsection
