@extends('layouts/component')
@section('title', 'Product Carts')
@section('contents')

    <!-- Bootstrap & FontAwesome -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script>
        < script >
            document.querySelectorAll('.remove-item').forEach(item => {
                item.addEventListener('click', function() {
                    const productId = this.getAttribute('data-id');

                    fetch(`/remove-from-cart/${productId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                            body: JSON.stringify({})
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                location.reload();
                            } else {
                                alert('Failed to remove item.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            }); <
        />
    </script>
    @php
        $cartItems = session('cart', []);
        $totalQuantity = array_sum(array_column($cartItems, 'quantity'));
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        $shipping = 0;
        $shipping = 0;
    @endphp
    <style>
        .payment-info {
            background: blue;
            padding: 10px;
            border-radius: 6px;
            color: #fff;
            font-weight: bold;
        }

        .product-details {
            padding: 10px;
        }

        body {
            background: #eee;
        }

        .cart {
            background: #fff;
        }

        .p-about {
            font-size: 12px;
        }

        .table-shadow {
            -webkit-box-shadow: 5px 5px 15px -2px rgba(0, 0, 0, 0.42);
            box-shadow: 5px 5px 15px -2px rgba(0, 0, 0, 0.42);
        }

        .type {
            font-weight: 400;
            font-size: 10px;
        }

        label.radio {
            cursor: pointer;
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none;
        }

        label.radio span {
            padding: 1px 12px;
            border: 2px solid #ada9a9;
            display: inline-block;
            color: #8f37aa;
            border-radius: 3px;
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 300;
        }

        label.radio input:checked+span {
            border-color: #fff;
            background-color: blue;
            color: #fff;
        }

        .credit-inputs {
            background: rgb(102, 102, 221);
            color: #fff !important;
            border-color: rgb(102, 102, 221);
        }

        .credit-inputs::placeholder {
            color: #fff;
            font-size: 13px;
        }

        .credit-card-label {
            font-size: 9px;
            font-weight: 300;
        }

        .form-control.credit-inputs:focus {
            background: rgb(102, 102, 221);
            border: rgb(102, 102, 221);
        }

        .line {
            border-bottom: 1px solid rgb(102, 102, 221);
        }

        .information span {
            font-size: 12px;
            font-weight: 500;
        }

        .information {
            margin-bottom: 5px;
        }

        .items {
            -webkit-box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.25);
            box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.08);
        }

        .spec {
            font-size: 11px;
        }


        .items {
            background-color: #f8f9fa;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .items .remove-item:hover {
            color: red;
            cursor: pointer;
        }
    </style>
    <div class="container mt-5 p-3 rounded cart">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="product-details mr-2">
                    <a href="{{ url('index') }}" class="d-flex flex-row align-items-center text-decoration-none"><i
                            class="fa fa-long-arrow-left me-2"></i><span class="ml-4 font-khmer-loy">{{ __('frontend/messages.continue_shopping') }}</span></a>
                    <hr>
                    <h6 class="mb-0">Shopping cart</h6>
                    @php
                        $cartItems = session('cart', []);
                        $totalQuantity = array_sum(array_column($cartItems, 'quantity'));
                    @endphp

                    <div class="d-flex justify-content-between">
                        <span>You have {{ $totalQuantity }} item{{ $totalQuantity > 1 ? "'s" : '' }} in your cart</span>

                    </div>

                    @php
                        $cart = session('cart', []);
                    @endphp

                    @if (count($cart) > 0)
                        @foreach ($cartItems as $id => $item)
                            <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                                <div class="d-flex flex-row">
                                    <img class="rounded" src="{{ asset('uploads/products/galaries/' . $item['image']) }}"
                                        width="40" alt="Product Image">
                                    <div class="ml-2">
                                        <span class="font-weight-bold d-block">{{ $item['name'] }}</span>
                                        <span class="spec">
                                            {{ $item['storage'] ?? 'Unknown Storage' }}, {{ $item['ram'] ?? 'Unknown RAM' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center justify-content-center">
                                    <span class="d-block" style="margin-right: 10px">{{ $item['quantity'] }}</span>
                                    <span class="d-block ml-5 font-weight-bold " style="margin-right: 20px">
                                        ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                    </span>
                                    <a href="javascript:void(0)" class="remove-item ml-3 text-black-50"
                                        data-id="{{ $id }}" data-name="{{ $item['name'] }}">
                                        <i class="fa fa-trash-o" style="color: red"></i>
                                    </a>

                                    <form id="remove-form-{{ $id }}" action="{{ route('cart.remove', $id) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center text-muted p-3">
                            Your cart is empty.
                        </div>
                    @endif


                </div>
            </div>

            <form action="" class="col-md-4" method="POST">
                @csrf

                <div class="payment-info">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Card details</span>
                        <img class="rounded" src="{{ url('uploads/admin/' . session('img')) }}" width="30">
                    </div>

                    <span class="type d-block mt-3 mb-1">Card type</span>

                    <label class="radio">
                        <input type="radio" name="card_type" value="mastercard" checked>
                        <span><img width="30" src="https://img.icons8.com/color/48/000000/mastercard.png" /></span>
                    </label>

                    <label class="radio">
                        <input type="radio" name="card_type" value="visa">
                        <span><img width="30" src="https://img.icons8.com/officel/48/000000/visa.png" /></span>
                    </label>

                    <label class="radio">
                        <input type="radio" name="card_type" value="amex">
                        <span><img width="30" src="https://img.icons8.com/ultraviolet/48/000000/amex.png" /></span>
                    </label>

                    <label class="radio">
                        <input type="radio" name="card_type" value="paypal">
                        <span><img width="30" src="https://img.icons8.com/officel/48/000000/paypal.png" /></span>
                    </label>

                    <div class="mt-3">
                        <label class="credit-card-label">Name on card</label>
                        <input type="text" name="card_name" class="form-control credit-inputs" placeholder="Name"
                            required>
                    </div>

                    <div>
                        <label class="credit-card-label">Card number</label>
                        <input type="text" name="card_number" class="form-control credit-inputs"
                            placeholder="0000 0000 0000 0000" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="credit-card-label">Expiry Date</label>
                            <input type="text" name="expiry_date" class="form-control credit-inputs" placeholder="MM/YY"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label class="credit-card-label">CVV</label>
                            <input type="text" name="cvv" class="form-control credit-inputs" placeholder="123"
                                required>
                        </div>
                    </div>

                    <hr class="line">

                    <div class="d-flex justify-content-between information">
                        <span>Price</span>
                        <span>${{ number_format($subtotal, 2) }}</span>
                    </div>

                    <div class="d-flex justify-content-between information">
                        <span>Fee</span>
                        <span>${{ number_format($shipping, 2) }}</span>
                    </div>

                    <div class="d-flex justify-content-between information">
                        <span>Total Price</span>
                        <span>${{ number_format($subtotal + $shipping, 2) }}</span>
                    </div>


                    <button type="submit" class="btn btn-primary btn-block d-flex justify-content-between mt-3">
                        <span>${{ number_format(($subtotal ?? 0) + ($shipping ?? 20.0), 2) }}</span>
                        <span>Checkout <i class="fa fa-long-arrow-right ml-1"></i></span>
                    </button>
                </div>
            </form>


        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        document.querySelectorAll('.remove-item').forEach(item => {
            item.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');

                fetch(`/remove-from-cart/${productId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify({
                            id: productId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
    <script>
        document.getElementById('sortBy').addEventListener('change', function() {
            const sortBy = this.value; // price-asc or price-desc

            // Reload the page with the selected sort option
            window.location.href = window.location.pathname + "?sort=" + sortBy;
        });
    </script>



    // Delete

    <script>
    document.querySelectorAll('.remove-item').forEach(button => {
        button.addEventListener('click', function () {
            const itemId = this.getAttribute('data-id');
            const itemName = this.getAttribute('data-name');
            Swal.fire({
                title: 'Are you sure?',
                text: `You want to remove "${itemName}" from the cart?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`remove-form-${itemId}`).submit();
                }
            });
        });
    });
</script>




@endsection
