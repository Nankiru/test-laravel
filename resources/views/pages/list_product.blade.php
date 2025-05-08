@extends('layouts/master')
@section('title', 'Products List')
@section('contents')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  @if (session('success'))
    <script>
    alert("{{ session('success') }}");
    </script>
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

  @if($products->isEmpty())
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
    <button><a href="/form_product" class="btn btn-primary ms-2" style="white-space: nowrap; vertical-align: center;">Add
      Product</a></button>
    <form method="GET" action="{{url('seacrh_product')}}" class="pe-3 pt-3">
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
    <table class="table align-middle mb-0 bg-white ml-4" style="margin-top: 20px; min-width: 800px;">
      <thead class="bg-light">
      <tr>
      <th>Image</th>
      <th>Name/Brand</th>
      <th class="text-center">Description</th>
      <th class="text-center">Price</th>
      <th class="text-center">Storage</th>
      <th class="text-center">Ram</th>
      <th class="text-center" style="white-space: nowrap;">Screen Size</th>
      <th class="text-center" style="white-space: nowrap; text-align: center;">CPU Model</th>
      <th class="text-center">Operation</th>
      <th class="text-center" style="white-space: nowrap; vertical-align: center;">Stock</th>
      <th class="text-center">Date</th>
      <th class="text-center">{{__('messages.action')}}</th>
      </tr>
      </thead>
      <tbody>
      @forelse ($products as $items)
      <tr>
      <td>
      <img src="{{ asset('uploads/products/galaries/' . $items->image)}}" alt="Profile" class=" "
      style="width: 60px; height: 60px;" />

      {{-- <img src="{{ asset('uploads/products/galaries/'.$items->image)}}" alt="Profile" class="rounded-circle"
      style="width: 60px; height: 55px;" /> --}}
      </td>
      <td>
      <div class="text-start">
      <p class="fw-bold mb-0" style="white-space: nowrap;">{{ $items->name }}</p>
      <small class="text-muted">{{ $items->brand }}</small>
      </div>
      </td>
      <td style="white-space: nowrap; text-align: center;">{{ $items->description }}</td>
      <td>{{ $items->price }}$</td>
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
<button type="button"
    class="btn btn-outline-secondary btn-sm edit-btn"
    title="Edit"
    data-id="{{ $items->id }}"
    data-name="{{ $items->name }}"
    data-description="{{ $items->description }}"
    data-price="{{ $items->price }}"
    data-discount_price="{{ $items->discount_price }}"
    data-stock="{{ $items->stock }}"
    data-storage="{{ $items->storage }}"
    data-ram="{{ $items->ram }}"
    data-category="{{ $items->category }}"
    data-brand="{{ $items->brand }}"
    data-tags="{{ $items->tags }}"
    data-bs-toggle="modal"
    data-bs-target="#editModal">
    <i class="fas fa-pen-to-square"></i>
</button>

      <a href="{{ url('/delete-product', $items->id) }}" onclick="return confirm('Are you sure?')"
      class="btn btn-outline-danger btn-sm" title="Delete">
      <i class="fa-regular fa-trash-can"></i>
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
    <form action="{{url('update_product',)}}" id="editForm" method="POST" enctype="multipart/form-data">
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
            <input type="number" step="0.01" class="form-control" name="price" id="edit-price" required>
          </div>

          <!-- Discount Price -->
          <div class="mb-3">
            <label class="form-label">Discount Price ($)</label>
            <input type="number" step="0.01" class="form-control" name="discount_price" id="edit-discount_price">
          </div>

          <!-- Stock -->
          <div class="mb-3">
            <label class="form-label">Stock Quantity</label>
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

          <!-- Image (optional for editing) -->
          <div class="mb-3">
            <label class="form-label">Main Image</label>
            <input type="file" class="form-control" name="image">
          </div>

          <!-- Tags -->
          <div class="mb-3">
            <label class="form-label">Tags (comma separated)</label>
            <input type="text" class="form-control" name="tags" id="edit-tags">
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
      </div>
    </form>
  </div>
</div>


  @endif


  <script>
    const container = document.querySelector('.lottie-animation');

    container.style.width = '300px';  // Change width
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
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-btn');
        const form = document.getElementById('editForm');
    
        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                const id = button.getAttribute('data-id');
                form.action = `/update-product/${id}`; // Adjust URL as needed
    
                document.getElementById('edit-id').value = id;
                document.getElementById('edit-name').value = button.getAttribute('data-name');
                document.getElementById('edit-description').value = button.getAttribute('data-description');
                document.getElementById('edit-price').value = button.getAttribute('data-price');
                document.getElementById('edit-discount_price').value = button.getAttribute('data-discount_price');
                document.getElementById('edit-stock').value = button.getAttribute('data-stock');
                document.getElementById('edit-storage').value = button.getAttribute('data-storage');
                document.getElementById('edit-ram').value = button.getAttribute('data-ram');
                document.getElementById('edit-category').value = button.getAttribute('data-category');
                document.getElementById('edit-brand').value = button.getAttribute('data-brand');
                document.getElementById('edit-tags').value = button.getAttribute('data-tags');
            });
        });
    });
    </script>
    
    
@endsection