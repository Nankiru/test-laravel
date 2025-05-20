<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title', 'Nan Shop')</title>
    <meta name="description" content="@yield('meta_description', 'Your default description here')" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets1/images/favicon.svg') }}" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('assets1/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets1/css/LineIcons.3.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets1/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets1/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets1/css/main.css') }}" />
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css') }}"
        rel="stylesheet">

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> --}}
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css') }}" rel="stylesheet">
    {{-- <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js') }}"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>



    <!-- Bootstrap 5 Bundle with Popper -->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js') }}"></script>



    <style>
        @import url('https://fonts.googleapis.com/css2?family=Suwannaphum:wght@100;300;400;700;900&display=swap');

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }

        .font-khmer {
            font-family: "Suwannaphum", serif;
        }

        .font-khmer-loy {
            font-family: "Suwannaphum", serif;
            font-weight: 300;
            font-style: normal;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            /* A darker blue for the hover effect */
        }

        .pagination {
            display: flex !important;
            flex-direction: row !important;
            justify-content: center;
            gap: 5px;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }

        .hot-emoji {
            display: inline-block;
            animation: pulse 1s infinite;
        }
    </style>

    <style>
        .wishlist:hover .dropdown-menu {
            display: block;
        }

        @media (min-width: 992px) {
            .col-20 {
                width: 20%;
                flex: 0 0 auto;
            }
        }
    </style>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    {{-- <style>
        .preloader.loaded {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
    </style> --}}
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Start Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Container -->
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-left">
                            <ul class="list-unstyled mb-0 font-khmer-loy">
                                <li class="dropdown text-center ">
                                    @php
                                        $langs = [
                                            'en' => ['name' => 'English', 'flag' => 'gb'],
                                            'khmer' => ['name' => 'ខ្មែរ', 'flag' => 'kh'],
                                            'ch' => ['name' => '中文', 'flag' => 'ch'],
                                        ];
                                        $currentLocale = Session::get('locale', 'en');
                                        $currentLang = $langs[$currentLocale] ?? $langs['en'];
                                    @endphp

                                    <button
                                        class="btn btn-light dropdown-toggle d-flex align-items-center gap-2 border border-gray-300 rounded-pill px-3 py-2"
                                        type="button" id="languageDropdown" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <img src="https://flagcdn.com/w20/{{ $currentLang['flag'] }}.png"
                                            alt="{{ $currentLocale }}" class="rounded-sm" width="20"
                                            height="14">
                                        {{ $currentLang['name'] }}
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                                        @foreach ($langs as $code => $lang)
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2 justify-content-center"
                                                    href="{{ route('lang.changelang', ['changelang' => $code]) }}">
                                                    <img src="https://flagcdn.com/w20/{{ $lang['flag'] }}.png"
                                                        alt="{{ $code }}" class="rounded-sm" width="20"
                                                        height="14">
                                                    {{ $lang['name'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>




                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                            <ul class="useful-links">
                                <li><a class="font-khmer"
                                        href="{{ url('index') }}">{{ __('frontend/messages.home') }}</a></li>
                                <li><a class="font-khmer"
                                        href="about-us.html">{{ __('frontend/messages.about_us') }}</a></li>
                                <li><a class="font-khmer"
                                        href="{{ url('ContactUs') }}">{{ __('frontend/messages.contact_us') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                            <div class="user ">
                                <i class="lni lni-user"></i>
                                <span class="font-khmer">{{ __('frontend/messages.hello') }} @if (Auth::check())
                                        {{ Auth::user()->name }}
                                    @endif
                                </span>
                            </div>
                            <ul class="user-login">
                                {{-- <a class="font-khmer"
                                    href="{{ url('signin') }}">{{ __('frontend/messages.signin') }}</a> --}}
                                <li>
                                    @if (auth()->check())
                                        <a class="font-khmer"
                                            href="{{ url('register') }}">{{ __('frontend/messages.register') }}</a>
                                    @else
                                        <a class="font-khmer"
                                            href="{{ url('signin') }}">{{ __('frontend/messages.signin') }}</a>
                                    @endif
                                </li>
                                <li>
                                    <a href="#" class="font-khmer" onclick="confirmLogout(event)">
                                        {{ __('frontend/messages.logout') }}
                                    </a>
                                </li>



                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Logout alert Modal --}}

        <script>
            function confirmLogout(event) {
                event.preventDefault();
                Swal.fire({
                    title: '{{ __('frontend/messages.logout_confirm_title') }}',
                    text: '{{ __('frontend/messages.logout_confirm_text') }}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: '{{ __('frontend/messages.logout_confirm_button') }}',
                    cancelButtonText: '{{ __('frontend/messages.cancel') }}',
                    customClass: {
                        popup: 'font-khmer text-base',
                        title: 'font-khmer text-lg font-semibold',
                        htmlContainer: 'font-khmer',
                        confirmButton: 'font-khmer',
                        cancelButton: 'font-khmer'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ url('user_logout') }}";
                    }
                });
            }
        </script>





        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('assets1/images/logo/logo.svg') }}" alt="Logo">
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <div class="navbar-search search-style-5">
                                <div class="search-select">
                                    <div class="select-position">
                                        <select id="select1" class="form-select form-control modern-input font-khmer"
                                            name="category" required>
                                            <option class="font-khmer" selected disabled>
                                                {{ __('frontend/messages.select_category') }}
                                            </option>
                                            <option class="font-khmer" value="Laptops">
                                                {{ __('frontend/messages.laptops') }}</option>
                                            <option class="font-khmer" value="Tablets">
                                                {{ __('frontend/messages.tablets') }}</option>
                                            <option class="font-khmer" value="Smartphones"><a
                                                    href="{{ url('all-product/Smartphones') }}">{{ __('frontend/messages.smartphones') }}</a>
                                            </option>

                                        </select>

                                        <script>
                                            document.getElementById('select1').addEventListener('change', function() {
                                                const selectedCategory = this.value;
                                                if (selectedCategory) {
                                                    window.location.href = '/all-product/' + selectedCategory;
                                                }
                                            });
                                        </script>

                                    </div>
                                </div>
                                <form method="GET" action="{{ url('search_index') }}" class="d-flex">
                                    <div class="search-input">
                                        <input class="font-khmer-loy" type="text"
                                            placeholder="{{ __('frontend/messages.search') }}" name="search"
                                            value="{{ request('search') }}">
                                    </div>
                                    <div class="search-btn">
                                        <button type="submit"><i class="lni lni-search-alt"></i></button>
                                    </div>
                                </form>
                            </div>
                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                <i class="lni lni-phone"></i>
                                <h3>Hotline:
                                    <span>(+855) 90207392</span>
                                </h3>
                            </div>
                            <div class="navbar-cart">
                                <div class="wishlist">
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-heart"></i>
                                        <span class="total-items">0</span>
                                    </a>
                                </div>
                                <div class="cart-items">
                                    <a href="javascript:void(0)" class="main-btn position-relative">
                                        <i class="lni lni-cart"></i>
                                        <span class="total-items">{{ count(session('cart', [])) }}</span>
                                    </a>

                                    <!-- Shopping Item -->
                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header d-flex justify-content-between font-khmer">
                                            <span>{{ count(session('cart', [])) }}
                                                {{ __('frontend/messages.item') }}
                                                {{ count(session('cart', [])) > 1 ? "'s" : '' }}</span>
                                            <a href="{{ url('/cart-view') }}">{{ __('frontend/messages.view_cart') }}
                                            </a>
                                        </div>

                                        @if (count(session('cart', [])) > 0)
                                            <ul class="shopping-list">
                                                @foreach (session('cart', []) as $id => $item)
                                                    <li>
                                                        <a href="javascript:void(0)" class="remove"
                                                            title="Remove this item"
                                                            onclick="removeFromCart({{ $id }})">
                                                            <i class="lni lni-close"></i>
                                                        </a>
                                                        <div class="cart-img-head">
                                                            <a class="cart-img"
                                                                href="{{ url('/product-detail', $id) }}">
                                                                {{-- <img
                                                                    src="{{ asset('uploads/products/galaries/' . $item['image']) }}"
                                                                    alt="{{ $item['name'] }}"> --}}
                                                                <img
                                                                    src="{{ asset('uploads/products/galaries/' . $item['image']) }}">
                                                            </a>
                                                        </div>
                                                        <div class="content">
                                                            <h4>
                                                                <a
                                                                    href="{{ url('/product-detail', $id) }}">{{ $item['name'] }}</a>
                                                            </h4>
                                                            <p class="quantity">
                                                                {{ $item['quantity'] }}x -
                                                                <span class="amount">
                                                                    ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>

                                            <div class="bottom">
                                                <div class="total">
                                                    <span>Total</span>
                                                    <span class="total-amount">
                                                        ${{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], session('cart', []))), 2) }}
                                                    </span>
                                                </div>
                                                <div class="button">
                                                    <a href="{{ url('/checkout') }}"
                                                        class="btn animate font-khmer">{{ __('frontend/messages.checkout') }}</a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="p-3 text-center text-muted font-khmer-loy">
                                                <small
                                                    class="">{{ __('frontend/messages.your_cart_is_empty') }}</small>
                                            </div>
                                        @endif
                                    </div>
                                    <!--/ End Shopping Item -->
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
        <!-- Start Header Bottom -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="nav-inner">
                        <!-- Start Mega Category Menu -->
                        <div class="mega-category-menu">
                            <span class="cat-button font-khmer"><i
                                    class="lni lni-menu"></i>{{ __('frontend/messages.all_brand') }}</span>
                            <ul class="sub-category">
                                {{-- <li><a href="{{ url('all-product') }}">All Products</a></li> --}}
                                <li><a href="#">Laptops <i class="lni lni-chevron-right"></i></a>
                                    <ul class="inner-sub-category">
                                        <li><a href="{{ url('all-product/Laptops/Apple') }}">Apple</a></li>
                                        <li><a href="{{ url('all-product/Laptops/Dell') }}">Dell</a></li>
                                        <li><a href="{{ url('all-product/Laptops/Acer') }}">Acer</a></li>
                                        <li><a href="{{ url('all-product/Laptops/Samsung') }}">Samsung</a></li>
                                        <li><a href="{{ url('all-product/Laptops/MSI') }}">MSI</a></li>
                                        <li><a href="{{ url('all-product/Laptops/Asus') }}">Asus</a></li>
                                        <li><a href="{{ url('all-product/Laptops/Alienware') }}">Alienware</a></li>
                                        <li><a href="{{ url('all-product/Laptops/Lenovo') }}">Lenovo</a></li>
                                        <li><a href="{{ url('all-product/Laptops/HP') }}">HP</a></li>
                                        <li><a href="{{ url('all-product/Laptops/Razer') }}">Razer</a></li>
                                    </ul>
                                </li>
                                <li><a href="product-grids.html">Tablets<i class="lni lni-chevron-right"></i></a>
                                    <ul class="inner-sub-category">
                                        <li><a href="{{ url('all-product/Tablet/Apple') }}">Apple</a></li>
                                        <li><a href="{{ url('all-product/Tablet/Samsung') }}">Samsung</a></li>
                                        <li><a href="{{ url('all-product/Tablet/Lenovo') }}">Lenovo</a></li>
                                        <li><a href="{{ url('all-product/Tablet/Asus') }}">Asus</a></li>
                                        <li><a href="{{ url('all-product/Tablet/Realme') }}">Realme</a></li>
                                        <li><a href="{{ url('all-product/Tablet/Huawei') }}">Huawei</a></li>
                                        <li><a href="{{ url('all-product/Tablet/LG') }}">LG</a></li>
                                        <li><a href="{{ url('all-product/Tablet/Xiaomi') }}">Xiaomi</a></li>
                                        <li><a href="{{ url('all-product/Tablet/Ipad') }}">Ipad</a></li>
                                    </ul>
                                </li>
                                <li><a href="product-grids.html">Smartphones<i class="lni lni-chevron-right"></i></a>
                                    <ul class="inner-sub-category">
                                        <li><a href="{{ url('all-product/Smartphone/Apple') }}">Apple</a></li>
                                        <li><a href="{{ url('all-product/Smartphone/Oppo') }}">Oppo</a></li>
                                        <li><a href="{{ url('all-product/Smartphone/Samsung') }}">Samsung</a></li>
                                        <li><a href="{{ url('all-product/Smartphone/Realme') }}">Realme</a></li>
                                        <li><a href="{{ url('all-product/Smartphone/Huawei') }}">Huawei</a></li>
                                        <li><a href="{{ url('all-product/Smartphone/Vivo') }}">Vivo</a></li>
                                        <li><a href="{{ url('all-product/Smartphone/Xiaomi') }}">Xiaomi</a></li>
                                        <li><a href="{{ url('all-product/Smartphone/LG') }}">LG</a></li>
                                    </ul>
                                </li>
                                <li><a href="product-grids.html">Accessories<i class="lni lni-chevron-right"></i></a>
                                    <ul class="inner-sub-category">
                                        <li><a href="{{ url('all-product/Accessories/iPhone Case') }}">iPhone Case</a>
                                        </li>
                                        <li><a href="{{ url('all-product/Accessories/Phone Charger') }}">Phone
                                                Charger</a></li>
                                        <li><a href="{{ url('all-product/Accessories/Earphones') }}">Earphones</a>
                                        </li>
                                        <li><a href="{{ url('all-product/Accessories/Headphone') }}">Headphone</a>
                                        </li>
                                        <li><a href="{{ url('all-product/Accessories/Speaker') }}">Speaker</a></li>
                                        <li><a href="{{ url('all-product/Accessories/iPad & Tablet Case') }}">iPad &
                                                Tablet Case</a></li>

                                    </ul>
                                </li>
                                <li><a href="product-grids.html">Smart Watches<i
                                            class="lni lni-chevron-right"></i></a>
                                    <ul class="inner-sub-category">
                                        <li><a href="{{ url('all-product/Watches/Apple') }}">Apple Watch</a></li>
                                        <li><a href="{{ url('all-product/Watches/Samsung') }}">Samsung Watch</a></li>
                                        <li><a href="{{ url('all-product/Watches/Huawei') }}">Huawei Watch</a></li>
                                        <li><a href="{{ url('all-product/Watches/Oppo') }}">Oppo Watch</a></li>
                                        <li><a href="{{ url('all-product/Watches/Xiaomi') }}">Xiaomi Watch</a></li>
                                    </ul>
                                </li>
                                {{-- <li><a href="product-grids.html">watch</a></li>
                                <li><a href="product-grids.html">man’s product</a></li>
                                <li><a href="product-grids.html">Home Audio & Theater</a></li>
                                <li><a href="product-grids.html">Computers & Tablets </a></li>
                                <li><a href="product-grids.html">Video Games </a></li>
                                <li><a href="product-grids.html">Home Appliances </a></li> --}}
                            </ul>
                        </div>
                        <!-- End Mega Category Menu -->
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="{{ url('index') }}" class="active font-khmer"
                                            aria-label="Toggle navigation">{{ __('frontend/messages.home') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed font-khmer" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-2"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">{{ __('frontend/messages.page') }}</a>
                                        <ul class="sub-menu collapse" id="submenu-1-2">
                                            <li class="nav-item font-khmer"><a
                                                    href="about-us.html">{{ __('frontend/messages.about_us') }}</a>
                                            </li>
                                            <li class="nav-item font-khmer"><a href="faq.html">Faq</a></li>
                                            <li class="nav-item font-khmer"><a
                                                    href="login.html">{{ __('frontend/messages.signin') }}</a></li>
                                            <li class="nav-item font-khmer"><a
                                                    href="{{ url('login') }} }}">{{ __('frontend/messages.register') }}</a>
                                            </li>
                                            <li class="nav-item font-khmer"><a href="mail-success.html">Mail
                                                    Success</a></li>
                                            <li class="nav-item font-khmer"><a href="404.html">404 Error</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-3"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">Shop</a>
                                        <ul class="sub-menu collapse" id="submenu-1-3">
                                            <li class="nav-item"><a href="product-grids.html">Shop Grid</a></li>
                                            <li class="nav-item"><a href="product-list.html">Shop List</a></li>
                                            <li class="nav-item"><a href="product-details.html">shop Single</a></li>
                                            <li class="nav-item"><a href="cart.html">Cart</a></li>
                                            <li class="nav-item"><a href="checkout.html">Checkout</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed font-khmer" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-4"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">{{ __('frontend/messages.brand') }}</a>
                                        <ul class="sub-menu collapse" id="submenu-1-4">
                                            <li class="nav-item"><a
                                                    href="blog-grid-sidebar.html">{{ __('frontend/messages.apple') }}</a>
                                            </li>
                                            <li class="nav-item"><a
                                                    href="blog-single.html">{{ __('frontend/messages.samsung') }}</a>
                                            </li>
                                            <li class="nav-item"><a
                                                    href="blog-single-sidebar.html">{{ __('frontend/messages.huawei') }}</a>
                                            </li>
                                            <li class="nav-item"><a
                                                    href="{{ url('all-product/Smartphone/Oppo') }}">{{ __('frontend/messages.oppo') }}</a>
                                            </li>
                                            <li class="nav-item"><a
                                                    href="blog-single-sidebar.html">{{ __('frontend/messages.lg') }}</a>
                                            </li>
                                            <li class="nav-item"><a
                                                    href="blog-single-sidebar.html">{{ __('frontend/messages.vivo') }}</a>
                                            </li>
                                            <li class="nav-item"><a
                                                    href="blog-single-sidebar.html">{{ __('frontend/messages.realme') }}</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a class="font-khmer" href="{{ url('ContactUs') }}"
                                            aria-label="Toggle navigation">{{ __('frontend/messages.contact_us') }}</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Nav Social -->
                    <div class="nav-social">
                        <h5 class="title font-khmer-loy">{{ __('frontend/messages.follow_us') }}</h5>
                        <ul>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Nav Social -->
                </div>
            </div>
        </div>
        <!-- End Header Bottom -->
    </header>

    <style>
        .thumbnail-image {
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
            /* Ensures smooth transition */
        }

        .thumbnail-image:hover {
            transform: scale(1.1);
            /* Scale the image on hover */
        }
    </style>


    <style>
        /* ========== Card Styles ========== */
        .card {
            overflow: hidden;
            background-color: #fff;
            border: none;
            border-radius: 10px;
            width: 100%;
            max-width: 250px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
        }

        .image-container {
            position: relative;
        }

        .thumbnail-image {
            border-radius: 10px;
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .first {
            position: absolute;
            width: 100%;
            padding: 9px;
            top: 0;
            left: 0;
            z-index: 2;
        }

        .wishlist1 {
            height: 25px;
            width: 25px;
            background-color: #eee;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .dress-name {
            font-size: 0.9rem;
            font-weight: bold;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 170px;
        }

        .new-price {
            font-size: 0.9rem;
            font-weight: bold;
            color: red;
        }

        .old-price,
        .fs-7 {
            font-size: 0.75rem;
            color: grey;
            text-decoration: line-through;
        }

        /* ========== Rating ========== */
        .rating-star {
            font-size: 0.75rem;
            color: #ffa500;
        }

        .rating-number {
            font-size: 0.75rem;
            color: grey;
        }

        /* ========== Product Variant Buttons ========== */
        .btn_card {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            padding: 3px;
            background-color: white;
            border: 2px solid transparent;
            cursor: pointer;
        }

        .btn_card:hover {
            border-width: 3px;
        }

        .btn_card:focus {
            outline: none;
        }

        .creme {
            border-color: grey;
        }

        .red {
            border-color: red;
        }

        .blue {
            border-color: #40C4FF;
        }

        .darkblue {
            border-color: #01579B;
        }

        .yellow {
            border-color: #FFCA28;
        }

        .creme:focus {
            background-color: grey;
        }

        .red:focus {
            background-color: red;
        }

        .blue:focus {
            background-color: #40C4FF;
        }

        .darkblue:focus {
            background-color: #01579B;
        }

        .yellow:focus {
            background-color: #FFCA28;
        }

        /* ========== Size Dot ========== */
        .item-size {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background: #fff;
            border: 1px solid grey;
            font-size: 0.625rem;
            display: flex;
            justify-content: center;
            align-items: center;
            color: grey;
        }

        /* ========== Vouchers (if used) ========== */
        .voutchers {
            background-color: #fff;
            border-radius: 10px;
            width: 100%;
            max-width: 190px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .voutcher-divider {
            display: flex;
        }

        .voutcher-left {
            width: 60%;
        }

        .voutcher-name {
            font-size: 0.5625rem;
            color: grey;
        }

        .voutcher-code {
            font-size: 0.6875rem;
            font-weight: bold;
            color: red;
        }

        .voutcher-right {
            width: 40%;
            background-color: purple;
            color: #fff;
            text-align: center;
        }

        .discount-percent {
            font-size: 0.75rem;
            font-weight: bold;
            position: relative;
            top: 5px;
        }

        .off {
            font-size: 0.875rem;
            position: relative;
            bottom: 5px;
        }

        /* ========== Responsive Layout Fix ========== */
        @media (max-width: 576px) {

            /* Ensure 2 cards per row on phones */
            .col-6 {
                flex: 0 0 auto;
                width: 50%;
            }
        }

        /* Optional: Ensure consistent spacing on very small screens */
        @media (max-width: 400px) {
            .col-6 {
                width: 100%;
            }
        }
    </style>



    <style>
        .btn-primary:hover {
            background-color: #0056b3;
            /* A darker blue for the hover effect */
        }

        .pagination {
            display: flex !important;
            flex-direction: row !important;
            justify-content: center;
            gap: 5px;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }

        .hot-emoji {
            display: inline-block;
            animation: pulse 1s infinite;
        }
    </style>


    {{-- Add yield contents --}}

    @yield('contents')
    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="footer-logo">
                                <a href="{{ url('index') }}">
                                    <img src="{{ asset('assets1/images/logo/white-logo.svg') }}" alt="#">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12">
                            <div class="footer-newsletter">
                                <h4 class="title">
                                    Subscribe to our Newsletter
                                    <span>Get all the latest information, Sales and Offers.</span>
                                </h4>
                                <div class="newsletter-form-head">
                                    <form action="#" method="get" target="_blank" class="newsletter-form">
                                        <input name="EMAIL" placeholder="Email address here..." type="email">
                                        <div class="button">
                                            <button class="btn">Subscribe<span class="dir-part"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <!-- Start Footer Middle -->
        <div class="footer-middle">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact">
                                <h3 class="font-khmer">{{ __('frontend/messages.get_touch') }}</h3>
                                <p class="phone">Phone: (+855) 090207392</p>
                                <ul>
                                    <li><span>Monday-Friday: </span> 9.00 am - 8.00 pm</li>
                                    <li><span>Saturday: </span> 10.00 am - 6.00 pm</li>
                                </ul>
                                <p class="mail">
                                    <a href="mailto:khemsopheanan09@gmail.com">khemsopheanan09@gmail.com</a>
                                </p>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer our-app">
                                <h3 class="font-khmer">{{ __('frontend/messages.our_mobile_app') }}</h3>
                                <ul class="app-btn">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-apple"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">App Store</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-play-store"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">Google Play</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3 class="font-khmer">{{ __('frontend/messages.products') }}</h3>
                                <ul>
                                    <li><a href="{{ url('all-product/Laptops') }}">Laptops</a></li>
                                    <li><a href="{{ url('all-product/Tablets') }}">Tablets</a></li>
                                    <li><a href="{{ url('all-product/Smartphones') }}">Smartphones</a></li>
                                    <li><a href="{{ url('all-product/Accessories') }}">Accessories</a></li>
                                    <li><a href="{{ url('all-product/Watches') }}">Watches</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3 class="font-khmer">{{ __('frontend/messages.shop_departments') }}</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">Computers & Accessories</a></li>
                                    <li><a href="javascript:void(0)">Smartphones & Tablets</a></li>
                                    <li><a href="javascript:void(0)">TV, Video & Audio</a></li>
                                    <li><a href="javascript:void(0)">Cameras, Photo & Video</a></li>
                                    <li><a href="javascript:void(0)">Headphones</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12">
                            <div class="payment-gateway">
                                <span>We Accept:</span>
                                <img src="{{ url('assets1/images/footer/credit-cards-footer.png') }}"
                                    alt="#">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="copyright">
                                <p>Designed and Developed by<a href="https://graygrids.com/" rel="nofollow"
                                        target="_blank">Khem Sopheanan</a></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <ul class="socila">
                                <li>
                                    <span class="font-khmer-loy">{{ __('frontend/messages.follow_us') }}</span>
                                </li>
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- ========================= JS here ========================= -->
    <script src="assets1/js/bootstrap.min.js"></script>
    <script src="assets1/js/tiny-slider.js"></script>
    <script src="assets1/js/glightbox.min.js"></script>
    <script src="assets1/js/main.js"></script>
    <script type="text/javascript">
        //========= Hero Slider
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

        //======== Brand Slider
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });
    </script>

    <script>
        function addToCart(id) {
            fetch(`/add_to_cart/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                }).then(response => response.json())
                .then(data => {
                    // Optionally show a success message
                    alert(data.message);

                    // Optionally refresh part of the cart dropdown using AJAX
                    // or just reload the page:
                    location.reload();
                }).catch(error => {
                    console.error('Error adding to cart:', error);
                });
        }
    </script>
    <script>
        function removeFromCart(id) {
            fetch(`/remove_from_cart/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    location.reload(); // Reload to update cart
                })
                .catch(error => {
                    console.error('Error removing item:', error);
                });
        }
    </script>


    <script>
        const preloader = document.querySelector('.preloader');
        const startTime = performance.now();

        window.addEventListener('load', function() {
            const loadTime = performance.now() - startTime;

            if (loadTime > 1500) {
                // Slow load - show loader a bit longer
                setTimeout(() => {
                    preloader.style.display = 'none';
                }, 1000);
            } else {
                // Fast load - hide immediately
                preloader.style.display = 'none';
            }
        });
    </script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js') }}"></script>

    {{-- <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet"> --}}

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>

</html>
