@extends('layouts/master')
@section('title','Add Users')
@section('contents')

<div style="margin-top: 20px;">
    <div class="body-wrapper-inner border-1 m-5 rounded-4 shadow-2-strong" style="padding: 20px 20px;border-radius:10px; ">
      <h2>Add Products</h2>
        <form action="{{url('form_submit')}}" method="POST" enctype="multipart/form-data" class="">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Username</label>
              <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Email</label>
              <input name="email" type="email" class="form-control" id="exampleInputPassword1">
              @error('email')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Positon</label>
              <input name="position" type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Salary</label>
              <input name="salary" type="number" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Date</label>
                <input name="date" type="date" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="d-flex justify-content-center align-items-center gap-5 w-100">
                <div class="mb-3 d-flex align-items-center justify-content-center gap-2" >
                    <label for="province" class="form-label">City</label>
                    <select name="province" id="province" class="form-select">
                      <option value="Banteay Meanchey">Banteay Meanchey</option>
                      <option value="Battambang">Battambang</option>
                      <option value="Kampong Cham">Kampong Cham</option>
                      <option value="Kampong Chhnang">Kampong Chhnang</option>
                      <option value="Kampong Speu">Kampong Speu</option>
                      <option value="Kampong Thom">Kampong Thom</option>
                      <option value="Kampot">Kampot</option>
                      <option value="Kandal">Kandal</option>
                      <option value="Kep">Kep</option>
                      <option value="Koh Kong">Koh Kong</option>
                      <option value="Kratie">Kratie</option>
                      <option value="Mondulkiri">Mondulkiri</option>
                      <option value="Phnom Penh">Phnom Penh</option>
                      <option value="Preah Vihear">Preah Vihear</option>
                      <option value="Prey Veng">Prey Veng</option>
                      <option value="Pursat">Pursat</option>
                      <option value="Ratanakiri">Ratanakiri</option>
                      <option value="Siem Reap">Siem Reap</option>
                      <option value="Preah Sihanouk">Preah Sihanouk</option>
                      <option value="Stung Treng">Stung Treng</option>
                      <option value="Svay Rieng">Svay Rieng</option>
                      <option value="Takeo">Takeo</option>
                      <option value="Oddar Meanchey">Oddar Meanchey</option>
                      <option value="Pailin">Pailin</option>
                      <option value="Tboung Khmum">Tboung Khmum</option>
                  </select>                  
                </div>
                <div class="mb-3 d-flex align-items-center justify-content-center gap-2">
                    <label for="country" class="form-label">Countries</label>
                    <select name="country" id="country" class="form-select">
                      <option value="Cambodia">Cambodia</option>
                      <option value="France">France</option>
                      <option value="United States">United States</option>
                      <option value="Japan">Japan</option>
                      <option value="Italy">Italy</option>
                  </select>                  
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Image</label>
                <input name="file" type="file" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>

{{-- Check if there's a success message and trigger a popup --}}
@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

@endsection
