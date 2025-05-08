@extends('layouts/master')
@section('title','Add Users')
@section('contents')

<div style="margin-top: 20px;">
    <div class="body-wrapper-inner" style="padding: 20px 20px">
      <div class="container ">
        <h2 class="mb-4">Add New Product</h2>
      
        <form action="{{url('add-product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Product Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
      
            <!-- Slug -->
            {{-- <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" name="slug">
            </div> --}}
      
            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="4"></textarea>
            </div>
      
            <!-- Price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price ($)</label>
                <input type="number" step="0.01" class="form-control" name="price" required>
            </div>
      
            <!-- Discount Price -->
            <div class="mb-3">
                <label for="discount_price" class="form-label">Discount Price ($)</label>
                <input type="number" step="0.01" class="form-control" name="discount_price">
            </div>
      
            <!-- Stock -->
            <div class="mb-3">
                <label for="stock" class="form-label">Stock Quantity</label>
                <input type="number" class="form-control" name="stock" required>
            </div>
      
            <!-- Storage -->
            <div class="mb-3">
                <label for="storage" class="form-label">Storage</label>
                <input type="text" class="form-control" name="storage">
            </div>

            <!-- Ram -->
            <div class="mb-3">
                <label for="ram" class="form-label">Ram</label>
                <input type="text" class="form-control" name="ram">
            </div>
      
            <!-- Category -->
            <div class="mb-3">
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
            <div class="mb-3">
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
      
            <!-- Image -->
            <div class="mb-3">
                <label for="image" class="form-label">Main Image</label>
                <input type="file" class="form-control" name="image" accept="image/*">
            </div>
      
            <!-- Gallery1 Images -->
            <div class="mb-3">
                <label for="gallery_images" class="form-label">Gallery1 Images</label>
                <input type="file" class="form-control" name="img1" multiple accept="image/*">
            </div>
            <!-- Gallery2 Images -->
            <div class="mb-3">
                <label for="gallery_images" class="form-label">Gallery2 Images</label>
                <input type="file" class="form-control" name="img2" multiple accept="image/*">
            </div>
            <!-- Gallery3 Images -->
            <div class="mb-3">
                <label for="gallery_images" class="form-label">Gallery3 Images</label>
                <input type="file" class="form-control" name="img3" multiple accept="image/*">
            </div>
            <!-- Gallery4 Images -->
            <div class="mb-3">
                <label for="gallery_images" class="form-label">Gallery4 Images</label>
                <input type="file" class="form-control" name="img4" multiple accept="image/*">
            </div>
      
            <!-- Tags -->
            <div class="mb-3">
                <label for="tags" class="form-label">Tags (comma separated)</label>
                <input type="text" class="form-control" name="tags">
            </div>
      
            {{-- <!-- Featured -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="featured" value="1" id="featured">
                <label class="form-check-label" for="featured">Featured Product</label>
            </div>
      
            <!-- Status -->
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="status" value="1" id="status" checked>
                <label class="form-check-label" for="status">Active</label>
            </div> --}}
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
      </div>
    </div>
</div>

{{-- Check if there's a success message and trigger a popup --}}
@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

@endsection
