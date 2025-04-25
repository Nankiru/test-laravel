@extends('layouts/master')
@section('contents')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


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

  {{-- CSS Style --}}
  <style>
    .link-hover:hover {
    text-decoration: underline;
    cursor: pointer;
    }
  </style>
  <section style="background-color: #eee;">
    <div class="container py-5">
    <div class="row">
      <div class="col">
      <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
        <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
        </ol>
      </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
      <div class="card mb-4">
        <div class="card-body text-center">
        @php
        $avatarFile = session('avatar');
        $avatarPath = public_path('uploads/' . $avatarFile);
        $avatarUrl = ($avatarFile && file_exists($avatarPath))
        ? asset('uploads/' . $avatarFile)
        : 'https://i.pinimg.com/736x/06/3b/bf/063bbf0665eaf9c1730bccdc5c8af1b2.jpg';
      @endphp
        {{-- <img src="{{asset('uploads/' . session('avatar')) }}" alt="avatar" class="rounded-circle img-fluid"
          style="width: 150px;"> --}}
          <form action="{{url('update_img_admin/'.session('id'))}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="position-relative d-inline-block">
                <img src="{{ $avatarUrl }}" class="shadow rounded-circle img-fluid" style="width: 150px; height: 150px;">
                
                <!-- Trigger file input -->
                <label for="avatarUpload" class="position-absolute bottom-0 end-0 translate-middle p-2 bg-white rounded-circle shadow" style="transform: translate(-30%, -30%); cursor: pointer;">
                    <i class="bi bi-pencil-fill text-primary"></i>
                </label>
                <input type="file" name="avatar" id="avatarUpload" class="d-none" onchange="this.form.submit()">
            </div>
        </form>
        
        <h5 class="my-3"
          style="background: linear-gradient(to right, #99f239, #29d1f7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: bold;">
          {{session('name')}}
        </h5>
        <p class="text-muted mb-1 text-center d-flex justify-content-center align-items-center "><span
          style="visibility: hidden;" class="text-center">1</span><span id="typewriter"
          class="text-center bg-primary"
          style="background: linear-gradient(to right, #ff416c, #29d1f7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: bold;"></span>
        </p>
        <p class="text-muted mb-4">kampong Spue, Cambodia</p>
        <div class="d-flex justify-content-center mb-2">
          <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary"><a
            href="https://t.me/Hoyyy_Mix_ban_Mention_Ke_jg" class="text-white">Contact Me</a></button>
          {{-- <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1"><a
            href="{{ url('update_admin/' . session('id')) }}" class="text">Edit Profile</a></button>
          <style>
          .text:hover {
            color: white;
          }
          </style> --}}
        </div>
        </div>
      </div>
      <div class="card mb-4 mb-lg-0">
        <div class="card-body p-0">
        <ul class="list-group list-group-flush rounded-3">
          {{-- <li class="list-group-item d-flex justify-content-between align-items-center p-3">
          <i class="fas fa-globe fa-lg text-warning"></i>
          <p class="mb-0">https://mdbootstrap.com</p>
          </li> --}}
          <li class="list-group-item d-flex justify-content-between align-items-center p-3">
          <i class="fab fa-github fa-lg text-body"></i>
          <p class="mb-0"><a href="https://github.com/Nankiru" class="text-decoration-none link-hover"
            style="cursor: pointer;">https://github.com/Nankiru</a></p>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center p-3">
          <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
          <p class="mb-0">@mdbootstrap</p>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center p-3">
          <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
          <p class="mb-0">mdbootstrap</p>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center p-3">
          <i class="fab fa-telegram-plane fa-lg" style="color: #0088cc;"></i>
          <p class="mb-0"><a href="https://t.me/Hoyyy_Mix_ban_Mention_Ke_jg">Khem Sopheanan</a></p>
          </li>
        </ul>
        </div>
      </div>
      </div>
      <div class="col-lg-8">
      <div class="card mb-4">
        <form class="card-body" action="{{url('update_admin_submit', session('id'))}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-sm-3">
          <p class="mb-0">{{__('messages.fullname')}}</p>
          </div>
          <div class="col-sm-9">
          {{-- <p class="text-muted mb-0">{{session('name')}}</p> --}}
          <input type="text" class="w-100" name="fullname" value="{{session('name')}}">
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
          <p class="mb-0">{{__('messages.email')}}</p>
          </div>
          <div class="col-sm-9">
          {{-- <p class="text-muted mb-0">{{session(key: 'email')}}</p> --}}
          <input type="email" class="w-100" name="email" value="{{session('email')}}">
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
          <p class="mb-0">{{__('messages.phone')}}</p>
          </div>
          <div class="col-sm-9">
          {{-- <p class="text-muted mb-0">(+855) 90207392</p> --}}
          <input type="number" class="w-100" name="phone" value="{{session('phone')}}">
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
          <p class="mb-0">{{__('messages.telegram')}}</p>
          </div>
          <div class="col-sm-9">
          {{-- <p class="text-muted mb-0">(+855) 90207392</p> --}}
          <input type="text" class="w-100" name="telegram" value="{{session('telegram')}}">
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
          <p class="mb-0">{{__('messages.address')}}</p>
          </div>
          <div class="col-sm-9">
          {{-- <p class="text-muted mb-0">kampong Spue, Cambodia</p> --}}
          <input type="text" class="w-100" name="address" value="{{session('address')}}">
          </div>
        </div>
        <div class="col-sm-9 mt-4 d-flex justify-content-center align-items-center">
          <button class="btn btn-primary" type="submit">Update Profile</button>
        </div>
        </form>
      </div>
      <div class="row">
        <div class="col-md-6">
        <div class="card mb-4 mb-md-0">
          <div class="card-body">
          <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
          </p>
          <p class="mb-1" style="font-size: .77rem;">Web Design</p>
          <div class="progress rounded" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0"
            aria-valuemax="100"></div>
          </div>
          <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
          <div class="progress rounded" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0"
            aria-valuemax="100"></div>
          </div>
          <p class="mt-4 mb-1" style="font-size: .77rem;">Laravel</p>
          <div class="progress rounded" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0"
            aria-valuemax="100"></div>
          </div>
          <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
          <div class="progress rounded" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0"
            aria-valuemax="100"></div>
          </div>
          <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
          <div class="progress rounded mb-2" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0"
            aria-valuemax="100"></div>
          </div>
          </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="card mb-4 mb-md-0">
          <div class="card-body">
          <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
          </p>
          <p class="mb-1" style="font-size: .77rem;">Web Design</p>
          <div class="progress rounded" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0"
            aria-valuemax="100"></div>
          </div>
          <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
          <div class="progress rounded" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0"
            aria-valuemax="100"></div>
          </div>
          <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
          <div class="progress rounded" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0"
            aria-valuemax="100"></div>
          </div>
          <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
          <div class="progress rounded" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0"
            aria-valuemax="100"></div>
          </div>
          <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
          <div class="progress rounded mb-2" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0"
            aria-valuemax="100"></div>
          </div>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>

    {{-- Script Typing --}}

    <script>
    const words = ["Full Stack", "UX/UI Design", "Frontend Developer", "Web Developer", "Tailwind Developer"];
    let i = 0;
    let j = 0;
    let currentWord = "";
    let isDeleting = false;

    function type() {
      currentWord = words[i];
      if (isDeleting) {
      document.getElementById("typewriter").textContent = currentWord.substring(0, j - 1);
      j--;
      if (j == 0) {
        isDeleting = false;
        i++;
        if (i == words.length) {
        i = 0;
        }
      }
      } else {
      document.getElementById("typewriter").textContent = currentWord.substring(0, j + 1);
      j++;
      if (j == currentWord.length) {
        isDeleting = true;
      }
      }
      setTimeout(type, 100);
    }

    type();
    </script>

  </section>
@endsection