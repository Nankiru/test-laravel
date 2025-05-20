@extends('layouts/component')
@section('title', 'Product Details')
@section('contents')



    {{-- Style Transition and duration --}}

    <style>
        #mainImage {
            max-width: 100%;
            max-height: 100vh;
            margin: auto;
            padding: 15px;
            transition: opacity 0.4s ease-in-out;
        }
    </style>


    <!-- content product detail -->
    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                <aside class="col-lg-6">
                    <div class="border rounded-4 mb-3 d-flex justify-content-center align-items-center" data-aos="zoom-in"
                        data-aos-duration="600" style="height: 500px; overflow: hidden;">
                        <a data-fslightbox="mygalley" class="rounded-4" data-type="image"
                            href="{{ asset('uploads/products/galaries/' . $product_detail->image) }}">
                            <img id="mainImage" style="max-width: 100%; max-height: 100vh; margin: auto;padding:15px"
                                class="rounded-4 fit"
                                src="{{ asset('uploads/products/galaries/' . $product_detail->image) }}" />
                        </a>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <a href="#" class=" border item-thumb rounded-2"
                            style="width: 60px; height: 60px; display: inline-block; overflow: hidden;"
                            data-img-src="{{ asset('uploads/products/mainimages/' . $product_detail->img1) }}">
                            <img width="60" height="60" class="item-thumb"
                                src="{{ asset('uploads/products/mainimages/' . $product_detail->img1) }}" />
                        </a>
                        <a href="#" class=" border item-thumb mx-1 rounded-2"
                            style="width: 60px; height: 60px; display: inline-block; overflow: hidden;"
                            data-img-src="{{ asset('uploads/products/mainimages/' . $product_detail->img2) }}">
                            <img width="60" height="60" class="rounded-2"
                                src="{{ asset('uploads/products/mainimages/' . $product_detail->img2) }}" />
                        </a>
                        <a href="#" class=" border item-thumb mx-1 rounded-2"
                            style="width: 60px; height: 60px; display: inline-block; overflow: hidden;"
                            data-img-src="{{ asset('uploads/products/mainimages/' . $product_detail->img3) }}">
                            <img width="60" height="60" class="rounded-2"
                                src="{{ asset('uploads/products/mainimages/' . $product_detail->img3) }}" />
                        </a>
                        <a href="#" class=" border item-thumb mx-1 rounded-2"
                            style="width: 60px; height: 60px; display: inline-block; overflow: hidden;"
                            data-img-src="{{ asset('uploads/products/galaries/' . $product_detail->image) }}">
                            <img width="60" height="60" class="rounded-2"
                                src="{{ asset('uploads/products/galaries/' . $product_detail->image) }}" />
                        </a>
                    </div>
                </aside>
                <main class="col-lg-6">
                    <div class="ps-lg-3">
                        <h4 class="title text-dark">
                            {{ $product_detail->name }}
                            <span>
                                {{ $product_detail->tags }}
                            </span>
                        </h4>
                        <div class="d-flex flex-row my-3">
                            <div class="text-warning mb-1 me-2">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-1">4.5</span>
                            </div>
                            <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
                            <span class="text-success ms-2">In stock</span>
                        </div>

                        <div class="mb-3">
                            <span class="h5 text-primary">${{ $product_detail->price }}</span>
                            <span class="text-muted ">/ <span
                                    class="text-decoration-line-through">${{ $product_detail->discount_price }}</span>
                            </span>
                        </div>
                        @php
                            $total_price = $product_detail->price - $product_detail->discount_price;
                        @endphp
                        <div class="row mt-3">

                            <dt class="col-3 text-black" style="color: black">Brand</dt>
                            <dd class="col-9">{{ $product_detail->brand }}</dd>

                            <dt class="col-3 text-black" style="color: black">Ram</dt>
                            <dd class="col-9">{{ $product_detail->ram }}</dd>

                            <dt class="col-3 text-black" style="color: black">Storage</dt>
                            <dd class="col-9">{{ $product_detail->storage }}</dd>

                            <dt class="col-3 text-black " style="color: black;white-space: nowrap; vertical-align: center;">
                                OS</dt>
                            <dd class="col-9">Window 11</dd>

                            <dt class="col-3 text-black" style="color: black"
                                style="white-space: nowrap; vertical-align: center;">CPU</dt>
                            <dd class="col-9">{{ $product_detail->cpu }}</dd>

                            <dt class="col-3 text-black" style="color: black">Screen</dt>
                            <dd class="col-9">{{ $product_detail->screen_size }}</dd>

                            <dt class="col-3 text-black" style="color: black">Total Price</dt>
                            <dd class="col-9">${{ number_format($total_price, 2) }}</dd>
                        </div>
                        <p>
                            {{ $product_detail->description }}
                        </p>
                        {{-- @php
                            $desc = $product_detail->description;
                            $locale = app()->getLocale();
                            $description = is_array($desc) ? $desc[$locale] ?? ($desc['en'] ?? '') : $desc;
                        @endphp

                        <p>{{ $description }}</p> --}}

                        <hr />

                        <form action="{{ url('add_to_cart', $product_detail->id) }}" method="POST">
                            @csrf

                            <div class="row mb-4">
                                <div class="col-md-4 col-6">
                                    <label for="quantitySelect" class="form-label">Quantity In <span
                                            style="color:blue">Stock</span></label>
                                    <select name="quantity" id="quantitySelect" class="form-select">
                                        @for ($i = 1; $i <= $product_detail->stock; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <small class="text-muted">In stock: {{ $product_detail->stock }}</small>
                                </div>
                            </div>



                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-warning shadow-0 font-khmer">Buy now</a>

                                @auth
                                    <button type="submit" class="btn btn-primary shadow-0 font-khmer">
                                        <i class="me-1 fa fa-shopping-basket font-khmer-loy"></i>
                                        {{ __('frontend/messages.add_to_cart') }}
                                    </button>
                                @else
                                    <div>
                                        <button type="button" class="btn shadow-0 btn-sm btn-outline-primary font-khmer"
                                            data-bs-toggle="modal" data-bs-target="#loginModal">
                                            <i class="fa-solid fa-cart-plus"></i>
                                            {{ __('frontend/messages.add_to_cart') }}
                                        </button>
                                    </div>
                                @endauth

                                <a href="#"
                                    class="btn btn-light border border-secondary py-2 icon-hover px-3 font-khmer">
                                    <i class="me-1 fa fa-heart fa-lg"></i> Save
                                </a>
                            </div>
                        </form>


                    </div>
                </main>
            </div>
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
                        <i class="zmdi zmdi-sign-in me-2 font-khmer-loy"></i> {{ __('frontend/messages.login_now') }}

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


    <script>
        document.querySelectorAll('.password-toggle').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const input = this.parentElement.querySelector('input');
                const icon = this.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });
    </script>




    <!-- Similar Items -->
    <section class="bg-light border-top py-4">
        <div class="container">
            <h5 class="mb-4">Similar Items</h5>
            <div class="row g-3">
                @if ($similar_items->isEmpty())
                    <p class="text-center">Will be soon....😘</p>
                @endif
                @foreach ($similar_items as $item)
                    <div class="col-6 col-sm-6 col-md-4 col-20 d-flex justify-content-center" data-aos="zoom-in"
                        data-aos-duration="600">
                        <div class="card text-center border-0 shadow-sm">
                            <div class="image-wrapper" style="overflow: hidden;">
                                <a href="{{ url('/product-detail', $item->id) }}">
                                    <img src="{{ asset('uploads/products/galaries/' . $item->image) }}"
                                        alt="{{ $item->name }}" class="card-img-top img-fluid hover-scale"
                                        style="height: 180px; object-fit: contain; background-color: #f8f9fa; padding: 10px;" />
                                </a>
                            </div>
                            <div class="card-body p-2">
                                <a href="{{ url('/product-detail', $item->id) }}"
                                    class="text-dark d-block fw-semibold mb-1">
                                    {{ \Illuminate\Support\Str::limit($item->name, 35) }}
                                </a>
                                <div class="text-primary fw-bold">${{ number_format($item->price, 2) }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Section Comments --}}
    {{-- Comments check count --}}
    @if ($comments->isNotEmpty() || auth()->check())
        {{-- <section class="container"> --}}
        @if ($comments->isNotEmpty())
            <div class="d-flex align-items-center gap-2 my-4">
                <i class="fas fa-comments text-primary"></i>
                <h5 class="mb-0 fw-bold text-dark">All Comments</h5>
                <div class="flex-grow-1 border-bottom border-2 border-primary opacity-25"></div>
            </div>


            <div id="commentsList">
                @foreach ($comments as $index => $comment)
                    @php
                        $createdTime = $comment->created_at->setTimezone('Asia/Phnom_Penh')->format('h:i:s A');
                        $user = $comment->user;

                        $userImage = $user->img
                            ? asset('uploads/users/' . $user->img)
                            : ($user->gender === 'female'
                                ? 'https://st3.depositphotos.com/9998432/13335/v/450/depositphotos_133352104-stock-illustration-default-placeholder-profile-icon.jpg'
                                : ($user->gender === 'male'
                                    ? 'https://cdn.vectorstock.com/i/preview-1x/50/19/gray-man-silhouette-vector-26185019.jpg'
                                    : asset('uploads/users/default.png')));
                    @endphp

                    <div class="card-footer bg-white border-0 mb-3 {{ $index >= 5 ? 'd-none extra-comment' : '' }}">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <img src="{{ $userImage }}" alt="User Avatar" class="rounded-circle shadow me-3"
                                    width="60" height="60">
                                <div>
                                    <h6 class="fw-bold text-primary mb-1">{{ $user->name }}</h6>
                                    <p class="text-muted small mb-0">
                                        {{ $createdTime }}<br>{{ $comment->created_at->format('d-M-Y') }}</p>
                                </div>
                            </div>
                            <p class="mb-0 font-khmer-loy">{{ $comment->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($comments->count() > 5)
                <div class="text-center">
                    <button id="showAllComments" class="btn btn-outline-primary btn-sm">Show All Comments</button>
                </div>

                @once
                    <script>
                        document.getElementById('showAllComments')?.addEventListener('click', function() {
                            document.querySelectorAll('.extra-comment').forEach(el => el.classList.remove('d-none'));
                            this.remove();
                        });
                    </script>
                @endonce
            @endif
        @else
            <div class="text-center my-5">
                <div class="d-inline-block p-4 rounded-3 shadow-sm bg-light">
                    <i class="fas fa-comments-slash fa-2x text-muted mb-2 d-block animate__animated animate__fadeIn"></i>
                    <p class="text-muted fw-semibold mb-0 font-khmer-loy">{{ __('frontend/messages.no_cmt') }}</p>
                </div>
            </div>
        @endif

        {{-- Comment form --}}
        @auth
            @php
                $user = Auth::user();
                $image = $user->img
                    ? asset('uploads/users/' . $user->img)
                    : ($user->gender === 'female'
                        ? 'https://st3.depositphotos.com/9998432/13335/v/450/depositphotos_133352104-stock-illustration-default-placeholder-profile-icon.jpg'
                        : ($user->gender === 'male'
                            ? 'https://cdn.vectorstock.com/i/preview-1x/50/19/gray-man-silhouette-vector-26185019.jpg'
                            : asset('uploads/users/default.png')));
            @endphp
            <div class="card-footer bg-white border-0 py-2 pb-5">
                <form id="commentForm" action="{{ url('comments') }}" method="POST">
                    @csrf
                    <div class="d-flex align-items-start font-khmer-loy">
                        <img src="{{ $image }}" alt="User Avatar" class="rounded-circle shadow me-3" width="60"
                            height="60">
                        <div class="form-floating w-100 font-khmer-loy">
                            <textarea class="form-control font-khmer-loy" name="content" id="commentTextarea" placeholder="Leave a comment here"
                                style="height: 100px;"></textarea>
                            <label for="commentTextarea font-khmer-loy">{{ __('frontend/messages.write_comment') }}</label>
                        </div>
                    </div>
                    <div class="text-end mt-3">
                        <button type="submit"
                            class="btn btn-primary btn-sm me-2 font-khmer-loy">{{ __('frontend/messages.post_comment') }}</button>
                        <button type="reset"
                            class="btn btn-outline-secondary btn-sm font-khmer-loy">{{ __('frontend/messages.cancel') }}</button>
                    </div>
                </form>
            </div>
        @else
            <p class="text-center my-2">{{ __('frontend/messages.please') }} <a
                    href="{{ url('signin') }}">{{ __('frontend/messages.signin') }}</a>
                {{ __('frontend/messages.login_to_comment') }}</p>
        @endauth

        <!-- Your existing comment form here -->
        </section>
    @endif


    <!-- Modern Dynamic Alert Modal -->
    <div class="modal fade" id="dynamicAlertModal" tabindex="-1" aria-labelledby="dynamicAlertLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow rounded-4">
                <div class="modal-header" id="dynamicAlertHeader">
                    <h5 class="modal-title" id="dynamicAlertLabel">Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="dynamicAlertBody">
                    <!-- Message will be injected here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        // Bootstrap 5 modal instance for alerts (reuse your existing modal)
        const alertModalEl = document.getElementById('dynamicAlertModal');
        const alertModal = new bootstrap.Modal(alertModalEl);

        function showAlertModal(message, title = 'Alert') {
            document.getElementById('dynamicAlertLabel').textContent = title;
            document.getElementById('dynamicAlertBody').textContent = message;
            alertModal.show();
        }

        document.getElementById('commentForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const content = document.getElementById('commentTextarea').value.trim();

            if (content.length === 0) {
                showAlertModal('Comment cannot be empty.', 'Error');
                return;
            }
            if (content.length > 100) {
                showAlertModal('Comment cannot be longer than 100 characters.', 'Error');
                return;
            }

            const formData = new FormData(this);

            fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showAlertModal('Comment posted successfully!', 'Success');

                        // Clear textarea
                        document.getElementById('commentTextarea').value = '';

                        // Append new comment to #commentsList
                        const comment = data.comment;
                        const commentsList = document.getElementById('commentsList');

                        const newCommentHTML = `
          <div class="card-footer bg-white border-0 mb-3">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <img src="${comment.user.img}" alt="User Avatar" class="rounded-circle shadow me-3" width="60" height="60">
                <div>
                  <h6 class="fw-bold text-primary mb-1">${comment.user.name}</h6>
                  <p class="text-muted small mb-0">${comment.created_at.replace(' ', '<br>')}</p>
                </div>
              </div>
              <p class="mb-0 font-khmer-loy">${comment.content}</p>
            </div>
          </div>
        `;

                        commentsList.insertAdjacentHTML('afterbegin', newCommentHTML);
                    } else if (data.errors) {
                        const firstError = Object.values(data.errors)[0];
                        showAlertModal(firstError, 'Error');
                    } else {
                        showAlertModal('An unexpected error occurred.', 'Error');
                    }
                })
                .catch(() => {
                    showAlertModal('Network error. Please try again.', 'Error');
                });
        });
    </script>














    <style>
        .hover-scale {
            transition: transform 0.4s ease-in-out;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }
    </style>




    <style>
        .icon-hover:hover {
            border-color: #3b71ca !important;
            background-color: white !important;
            color: #3b71ca !important;
        }

        .icon-hover:hover i {
            color: #3b71ca !important;
        }
    </style>



    {{-- Add qty --}}
    <script>
        const input = document.getElementById('quantityInput');
        document.getElementById('button-minus').addEventListener('click', () => {
            if (input.value > 1) input.value--;
        });
        document.getElementById('button-plus').addEventListener('click', () => {
            input.value++;
        });
    </script>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainImage = document.getElementById('mainImage');
            const thumbnails = document.querySelectorAll('.item-thumb');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function(e) {
                    e.preventDefault();

                    const newSrc = this.getAttribute('data-img-src');

                    // Fade out
                    mainImage.style.opacity = 0;

                    setTimeout(() => {
                        // Change image source
                        mainImage.src = newSrc;

                        // Fade in
                        mainImage.style.opacity = 1;
                    }, 400); // Match this to the CSS transition duration
                });
            });
        });
    </script>
    {{-- <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js') }}"></script> --}}



@endsection
