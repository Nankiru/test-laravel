@extends('layouts/master')
@section('title', 'Add Brand')

@section('contents')
<!-- Add Brand Button -->
<button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addBrandModal">
  Add Brand
</button>

<!-- Add Brand Modal -->
<div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/brands" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addBrandLabel">Add Brand</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="brandName" class="form-label">Brand Name</label>
            <input type="text" class="form-control" name="name" id="brandName" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Brand</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
