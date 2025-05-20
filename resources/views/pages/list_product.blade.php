@extends('layouts/master')
@section('title', 'Products List')
@section('contents')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @if (session('success'))
        <style>
            .error-container {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background-color: #f8f9fa;
            }

            .error-content {
                text-align: center;
            }

            .error-content h1 {
                font-size: 6rem;
                font-weight: bold;
                margin-bottom: 1rem;
            }

            .error-content p {
                font-size: 1.5rem;
                margin-bottom: 2rem;
            }

            .lottie-animation {
                width: 300px;
                /* Change to desired width */
                height: 300px;
                /* Change to desired height */
                margin: 0 auto;
            }
        </style>
    @endif

    @if ($products->isEmpty())
        <div class="w-100 d-flex justify-content-center align-items-center" style="padding-top:20px">
            <div class="error-container">
                <div class="lottie-animation"></div>
                <div class="error-content">
                    <h1>404</h1>
                    <p>The account you're trying to access doesn't exist</p>
                    <a href="/form" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    @else
        <div class="d-flex gap-3 justify-content-between align-items-center">
            <button class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#addProductModal">
                Add Product
            </button>

            {{-- Add Product Modal  --}}

            <!-- Add Product Modal -->
            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ url('add-product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row g-3">

                                    <!-- Name -->
                                    <div class="col-md-12">
                                        <label for="productName" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="name" id="productName" required>
                                    </div>

                                    <!-- Price -->
                                    <div class="col-md-6">
                                        <label for="productPrice" class="form-label">Price</label>
                                        <input type="number" step="0.01" class="form-control" name="price"
                                            id="productPrice" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="productPrice" class="form-label">Discount Price</label>
                                        <input type="number" step="0.01" class="form-control" name="discount_price"
                                            id="productPrice" required>
                                    </div>

                                    <!-- Stock -->
                                    <div class="col-md-6">
                                        <label for="productStock" class="form-label">Stock</label>
                                        <input type="number" class="form-control" name="stock" id="productStock"
                                            required>
                                    </div>

                                    <!-- Storage -->
                                    <div class="col-md-6">
                                        <label class="form-label">Storage</label>
                                        <input type="text" class="form-control" name="storage" required>
                                    </div>

                                    <!-- RAM -->
                                    <div class="col-md-6">
                                        <label class="form-label">RAM</label>
                                        <input type="text" class="form-control" name="ram" required>
                                    </div>

                                    <!-- Screen Size -->
                                    <div class="col-md-6">
                                        <label class="form-label">Screen Size</label>
                                        <input type="text" class="form-control" name="screen_size" required>
                                    </div>

                                    <!-- CPU Model -->
                                    <div class="col-md-6">
                                        <label class="form-label">CPU Model</label>
                                        <input type="text" class="form-control" name="cpu" required>
                                    </div>

                                    <!-- Operating System -->
                                    <div class="col-md-6">
                                        <label class="form-label">Operating System</label>
                                        <input type="text" class="form-control" name="os" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select name="category" class="form-select">
                                            <option value="">Select Category</option>
                                            <option value="Laptops">Laptops</option>
                                            <option value="Smartphone">Smartphone</option>
                                            <option value="Tablet">Tablet</option>
                                            <option value="Accessories">Accessories</option>
                                            <option value="Watch">Watch</option>
                                            {{-- @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach --}}
                                        </select>
                                    </div>

                                    <!-- Brand -->
                                    <div class="col-md-6">
                                        <label for="brand_id" class="form-label">Brand</label>
                                        <select name="brand" class="form-select">
                                            <option value="">Select Brand</option>
                                            <option value="Apple">Apple</option>
                                            <option value="Asus">Asus</option>
                                            <option value="Lenovo">Lenovo</option>
                                            <option value="MSI">MSI</option>
                                            <option value="Acer">Acer</option>
                                            <option value="Samsung">Samsung</option>
                                            <option value="Oppo">Oppo</option>
                                            <option value="Realme">Realme</option>
                                            <option value="Huawei">Huawei</option>
                                            <option value="Vivo">Vivo</option>
                                            <option value="Xiaomi">Xiaomi</option>
                                            <option value="LG">LG</option>

                                            {{-- @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach --}}
                                        </select>
                                    </div>

                                    <!-- Main Image -->
                                    <div class="col-md-12">
                                        <label class="form-label">Main Image</label>
                                        <input type="file" class="form-control" name="image" accept="image/*"
                                            required>
                                    </div>

                                    <!-- Gallery Images -->
                                    <div class="col-md-4">
                                        <label class="form-label">Gallery Image 1</label>
                                        <input type="file" class="form-control" name="img1" accept="image/*"
                                            required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Gallery Image 2</label>
                                        <input type="file" class="form-control" name="img2" accept="image/*"
                                            required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Gallery Image 3</label>
                                        <input type="file" class="form-control" name="img3" accept="image/*">
                                    </div>

                                    <!-- Tags -->
                                    <div class="col-md-12">
                                        <label class="form-label">Tags (comma-separated)</label>
                                        <input type="text" class="form-control" name="tags">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="4"></textarea>
                                </div>
                            </div>

                            <div class="modal-footer mt-4">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save Product</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>





            <form method="GET" action="{{ url('seacrh_product') }}" class="pe-3 pt-3">
                <div class="input-group mb-3 me-3">
                    <input type="text" name="search" class="form-control" placeholder="Enter name to search"
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search"></i> Search
                    </button>
                </div>
            </form>
        </div>

        <div style="padding-left: 20px; padding-right: 20px;">
            <div style="overflow-x: auto;">
                <table class="table align-middle mb-0 bg-white ml-4 table-hover" style="margin-top: 20px; min-width: 800px;">
                    <thead class="bg-light">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th class="text-center">Price</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Storage</th>
                            <th class="text-center">Ram</th>
                            <th class="text-center" style="white-space: nowrap;">Screen Size</th>
                            <th class="text-center" style="white-space: nowrap; text-align: center;">CPU Model</th>
                            <th class="text-center">OS</th>
                            <th class="text-center" style="white-space: nowrap; vertical-align: center;">Stock</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $items)
                            <tr>
                                <td>
                                    <img src="{{ asset('uploads/products/galaries/' . $items->image) }}" alt="Profile"
                                        class="" style="width: 80px; height: 60px;" />
                                </td>
                                <td class="fw-bold mb-0" style="white-space: nowrap;">{{ $items->name }}</td>
                                <td>{{ $items->price }}$</td>
                                <td>{{ $items->brand }}</td>
                                <td>{{ $items->category }}</td>
                                <td style="white-space: nowrap; text-align: center;">{{ $items->description }}</td>
                                <td>{{ $items->storage }}</td>
                                <td>{{ $items->ram }}</td>
                                <td>{{ $items->ram }}</td>
                                <td>{{ $items->ram }}</td>
                                <td>{{ $items->ram }}</td>
                                <td class="text-center font-mono">{{ $items->stock }}</td>
                                <td style="white-space: nowrap; vertical-align: center;">
                                    {{ \Carbon\Carbon::parse($items->created_at)->format('d-M-Y') }}
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        {{-- <a href="{{ url('update-product/' . $items->id) }}" class="btn btn-outline-secondary btn-sm"
      title="Edit">
      <i class="fas fa-pen-to-square"></i>
      </a> --}}
                                        <!-- Edit button with data attributes for modal -->
                                        <button type="button" class="btn btn-outline-secondary btn-sm edit-btn"
                                            title="Edit" data-id="{{ $items->id }}"
                                            data-name="{{ $items->name }}" data-description="{{ $items->description }}"
                                            data-price="{{ $items->price }}"
                                            data-discount_price="{{ $items->discount_price }}"
                                            data-stock="{{ $items->stock }}" data-storage="{{ $items->storage }}"
                                            data-screen_size="{{ $items->screen_size }}" data-cpu="{{ $items->cpu }}"
                                            data-os="{{ $items->os }}" data-ram="{{ $items->ram }}"
                                            data-category="{{ $items->category }}" data-brand="{{ $items->brand }}"
                                            data-tags="{{ $items->tags }}" data-bs-toggle="modal"
                                            data-bs-target="#editModal">
                                            {{-- <i class="fas fa-pen-to-square" data-toggle="tooltip" data-placement="top" title="Edit item"></i> --}}
                                            <i class="fas fa-pen-to-square mr-3" data-toggle="tooltip" title="Edit"></i>
                                        </button>

                                        <a href="{{ url('/delete-product', $items->id) }}"
                                            onclick="return confirm('Are you sure?')"
                                            class="btn btn-outline-danger btn-sm" title="Delete">
                                            {{-- <i class="fa-regular fa-trash-can " data-toggle="tooltip" data-placement="top" title="Delete item"></i> --}}
                                            <i class="fa-regular fa-trash-can mr-2" data-toggle="tooltip" title="Delete item"></i>
                                        </a>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-muted">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Pagination Links -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $products->links() }}
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="{{ url('update_product') }}" id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="edit-id">

                            <!-- Product Name -->
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="name" id="edit-name" required>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="edit-description" rows="4"></textarea>
                            </div>

                            <!-- Price -->
                            <div class="mb-3">
                                <label class="form-label">Price ($)</label>
                                <input type="number" step="0.01" class="form-control" name="price"
                                    id="edit-price" required>
                            </div>

                            <!-- Discount Price -->
                            <div class="mb-3">
                                <label class="form-label">Discount Price ($)</label>
                                <input type="number" step="0.01" class="form-control" name="discount_price"
                                    id="edit-discount_price">
                            </div>

                            <!-- Stock -->
                            <div class="mb-3">
                                <label class="form-label">Stock</label>
                                <input type="number" class="form-control" name="stock" id="edit-stock" required>
                            </div>

                            <!-- Storage -->
                            <div class="mb-3">
                                <label class="form-label">Storage</label>
                                <input type="text" class="form-control" name="storage" id="edit-storage">
                            </div>

                            <!-- RAM -->
                            <div class="mb-3">
                                <label class="form-label">RAM</label>
                                <input type="text" class="form-control" name="ram" id="edit-ram">
                            </div>

                            <!-- Screen Size -->
                            <div class="mb-3">
                                <label class="form-label">Screen Size</label>
                                <input type="text" class="form-control" name="screen_size" id="edit-screen_size">
                            </div>

                            <!-- CPU Model -->
                            <div class="mb-3">
                                <label class="form-label">CPU Model</label>
                                <input type="text" class="form-control" name="cpu_model" id="edit-cpu_model">
                            </div>

                            <!-- OS -->
                            <div class="mb-3">
                                <label class="form-label">Operating System</label>
                                <input type="text" class="form-control" name="os" id="edit-os">
                            </div>

                            <!-- Category -->
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select name="category" class="form-select" id="edit-category">
                                    <option value="">Select Category</option>
                                    <option value="Laptops">Laptops</option>
                                    <option value="Smartphone">Smartphone</option>
                                    <option value="Tablet">Tablet</option>
                                    <option value="Accessories">Accessories</option>
                                    <option value="Watch">Watch</option>
                                </select>
                            </div>

                            <!-- Brand -->
                            <div class="mb-3">
                                <label class="form-label">Brand</label>
                                <select name="brand" class="form-select" id="edit-brand">
                                    <option value="">Select Brand</option>
                                    <option value="Apple">Apple</option>
                                    <option value="Asus">Asus</option>
                                    <option value="Lenovo">Lenovo</option>
                                    <option value="MSI">MSI</option>
                                    <option value="Acer">Acer</option>
                                    <option value="Samsung">Samsung</option>
                                    <option value="Oppo">Oppo</option>
                                    <option value="Realme">Realme</option>
                                    <option value="Huawei">Huawei</option>
                                    <option value="Vivo">Vivo</option>
                                    <option value="Xiaomi">Xiaomi</option>
                                    <option value="LG">LG</option>
                                </select>
                            </div>

                            <!-- Main Image -->
                            <div class="mb-3">
                                <label class="form-label">Main Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <!-- Gallery Images (1 row, 3 columns) -->
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Gallery Image 1</label>
                                    <input type="file" class="form-control" name="img1" accept="image/*">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Gallery Image 2</label>
                                    <input type="file" class="form-control" name="img2" accept="image/*">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Gallery Image 3</label>
                                    <input type="file" class="form-control" name="img3" accept="image/*">
                                </div>
                            </div>

                            <!-- Tags -->
                            <div class="mb-3 mt-3">
                                <label class="form-label">Tags (comma separated)</label>
                                <input type="text" class="form-control" name="tags" id="edit-tags">
                            </div>
                        </div>

                        <div class="modal-footer mt-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    @endif


    <script>
        const container = document.querySelector('.lottie-animation');

        container.style.width = '300px'; // Change width
        container.style.height = '300px'; // Change height

        const animation = lottie.loadAnimation({
            container: container,
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://lottie.host/d987597c-7676-4424-8817-7fca6dc1a33e/BVrFXsaeui.json'
        });
    </script>


    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if (session('status'))
        <script>
            Swal.fire({
                title: 'Login Failed',
                text: "{{ session('status') }}",
                icon: 'error',
                confirmButtonText: 'Try Again'
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-btn');
            const form = document.getElementById('editForm');

            editButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const id = button.getAttribute('data-id');
                    form.action = `/update-product/${id}`; // Adjust URL as needed

                    document.getElementById('edit-id').value = id;
                    document.getElementById('edit-name').value = button.getAttribute('data-name');
                    document.getElementById('edit-description').value = button.getAttribute(
                        'data-description');
                    document.getElementById('edit-price').value = button.getAttribute('data-price');
                    document.getElementById('edit-discount_price').value = button.getAttribute(
                        'data-discount_price');
                    document.getElementById('edit-stock').value = button.getAttribute('data-stock');
                    document.getElementById('edit-storage').value = button.getAttribute(
                        'data-storage');
                    document.getElementById('edit-screen_size').value = button.getAttribute(
                        'data-screen_size');
                    document.getElementById('edit-cpu_model').value = button.getAttribute(
                        'data-cpu');
                    document.getElementById('edit-os').value = button.getAttribute(
                        'data-os');
                    document.getElementById('edit-ram').value = button.getAttribute('data-ram');
                    document.getElementById('edit-category').value = button.getAttribute(
                        'data-category');
                    document.getElementById('edit-brand').value = button.getAttribute('data-brand');
                    document.getElementById('edit-tags').value = button.getAttribute('data-tags');
                });
            });
        });
    </script>


@endsection
