@extends('layouts/master')
@section('title', 'Add Users')
@section('contents')


  @if (session('success'))
    <script>
    Swal.fire({
    icon: 'success',
    title: 'Success',
    text: '{{ session('success') }}',
    });
    </script>
  @endif

  @if (session('error'))
    <script>
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: '{{ session('error') }}',
    });
    </script>
  @endif



  <div style="margin-top: 20px;">
    <div class="body-wrapper-inner" style="padding: 20px 20px">
    <form action="{{url('update_submit', $result->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Username</label>
      <input name="name" type="text" class="form-control" id="exampleInputEmail1" value="{{$result->name}}"
        aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Email</label>
      <input name="email" type="email" class="form-control" value="{{$result->email}}" id="exampleInputPassword1">
      @error('email')
      <span class="text-danger">{{$message}}</span>
    @enderror
      </div>
      <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Positon</label>
      <input name="position" type="text" class="form-control" value="{{$result->position}}"
        id="exampleInputPassword1">
      </div>
      <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Salary</label>
      <input name="salary" type="number" class="form-control" value="{{$result->salary}}" id="exampleInputPassword1">
      </div>
      <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Date</label>
      <input name="date" type="date" class="form-control" value="{{$result->dob}}" id="exampleInputPassword1">
      </div>
      <div class="d-flex justify-content-center align-items-center gap-5 w-100">
      <div class="mb-3 d-flex align-items-center justify-content-center gap-2">
        <label for="province" class="form-label">City</label>
        <select name="province" id="province" class="form-select">
        {{-- value="{{$result->province}}" --}}
        <option value="Banteay Meanchey" {{ $result->province == 'Banteay Meanchey' ? 'selected' : '' }}>Banteay
          Meanchey</option>
        <option value="Battambang" {{ $result->province == 'Battambang' ? 'selected' : '' }}>Battambang</option>
        <option value="Kampong Cham" {{ $result->province == 'Kampong Cham' ? 'selected' : '' }}>Kampong Cham</option>
        <option value="Kampong Chhnang" {{ $result->province == 'Kampong Chhnang' ? 'selected' : '' }}>Kampong Chhnang
        </option>
        <option value="Kampong Speu" {{ $result->province == 'Kampong Speu' ? 'selected' : '' }}>Kampong Speu</option>
        <option value="Kampong Thom" {{ $result->province == 'Kampong Thom' ? 'selected' : '' }}>Kampong Thom</option>
        <option value="Kampot" {{ $result->province == 'Kampot' ? 'selected' : '' }}>Kampot</option>
        <option value="Kandal" {{ $result->province == 'Kandal' ? 'selected' : '' }}>Kandal</option>
        <option value="Kep" {{ $result->province == 'Kep' ? 'selected' : '' }}>Kep</option>
        <option value="Koh Kong" {{ $result->province == 'Koh Kong' ? 'selected' : '' }}>Koh Kong</option>
        <option value="Kratie" {{ $result->province == 'Kratie' ? 'selected' : '' }}>Kratie</option>
        <option value="Mondulkiri" {{ $result->province == 'Mondulkiri' ? 'selected' : '' }}>Mondulkiri</option>
        <option value="Phnom Penh" {{ $result->province == 'Phnom Penh' ? 'selected' : '' }}>Phnom Penh</option>
        <option value="Preah Vihear" {{ $result->province == 'Preah Vihear' ? 'selected' : '' }}>Preah Vihear</option>
        <option value="Prey Veng" {{ $result->province == 'Prey Veng' ? 'selected' : '' }}>Prey Veng</option>
        <option value="Pursat" {{ $result->province == 'Pursat' ? 'selected' : '' }}>Pursat</option>
        <option value="Ratanakiri" {{ $result->province == 'Ratanakiri' ? 'selected' : '' }}>Ratanakiri</option>
        <option value="Siem Reap" {{ $result->province == 'Siem Reap' ? 'selected' : '' }}>Siem Reap</option>
        <option value="Preah Sihanouk" {{ $result->province == 'Preah Sihanouk' ? 'selected' : '' }}>Preah Sihanouk
        </option>
        <option value="Stung Treng" {{ $result->province == 'Stung Treng' ? 'selected' : '' }}>Stung Treng</option>
        <option value="Svay Rieng" {{ $result->province == 'Svay Rieng' ? 'selected' : '' }}>Svay Rieng</option>
        <option value="Takeo" {{ $result->province == 'Takeo' ? 'selected' : '' }}>Takeo</option>
        <option value="Oddar Meanchey" {{ $result->province == 'Oddar Meanchey' ? 'selected' : '' }}>Oddar Meanchey
        </option>
        <option value="Pailin" {{ $result->province == 'Pailin' ? 'selected' : '' }}>Pailin</option>
        <option value="Tboung Khmum" {{ $result->province == 'Tboung Khmum' ? 'selected' : '' }}>Tboung Khmum</option>
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
      <button type="submit" class="btn btn-primary">Update</button>
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