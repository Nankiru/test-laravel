@extends('layouts.component')
@section('title', 'Product Details')
@section('contents')
    @php
        use Carbon\Carbon;
    @endphp

    <section class="trending-product section py-5" style="margin-top: 12px;">
        <div class="container">
            <!-- Section Header -->

            @if ($products->count() > 0)
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <div class="section-title">
                            <h2 data-aos="zoom-in" data-aos-duration="600" class="font-khmer-loy">
                                Product{{ $products->count() > 1 ? "'s" : '' }} Brand {{ $brand }}</h2>
                            <p data-aos="fade-up" data-aos-duration="600">A globally recognized technology brand known for
                                its innovative and high-quality smartphones,
                                audio devices, and other electronic products.</p>
                        </div>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="row g-3">
                    @foreach ($products as $product)
                        @php
                            $total = $product->price - $product->discount_price;
                        @endphp
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center" data-aos="zoom-in"
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
                                                style="max-height: 100%; max-width: 100%; object-fit: contain;">
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
            @else
                <!-- No Products Found -->
                <div class="text-center py-5">
                    {{-- <h2>404 - No Products Found</h2>
                    <p>Sorry, we couldn't find any products for category "{{ $category }}".</p>
                    <a href="{{ url('/index') }}" class="btn btn-primary mt-3">Return to Home</a>
                </div> --}}

                    <div class="custom-bg text-dark">
                        <div class="d-flex align-items-center justify-content-center px-2">
                            <div class="text-center">
                                <h1 class="display-1 fw-bold">404</h1>
                                <p class="fs-2 fw-medium mt-4">Oops! Product not found</p>
                                <p class="mt-4 mb-5">The product might have been moved to a different location on the
                                    website or permanently deleted. </p>
                                <a href="{{ url('index') }}"
                                    class="btn btn-light fw-semibold rounded-pill px-4 py-2 custom-btn">
                                    Go Home
                                </a>
                            </div>
                        </div>
                    </div>
            @endif
        </div>
    </section>

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

    {{-- Style Product Not Found --}}
    <style>
        /* .custom-bg {
                                background: linear-gradient(to right, #e2e8f0, #e5e7eb);
                            } */

        .custom-btn:hover {
            background-color: #f3e8ff !important;
            transition: background-color 0.3s ease-in-out;
        }

        @media (prefers-color-scheme: dark) {
            .custom-bg {
                color: black !important;
            }

            .custom-btn {
                background-color: #374151 !important;
                color: white !important;
            }

            .custom-btn:hover {
                background-color: #4b5563 !important;
            }
        }
    </style>

@endsection
