@extends('layouts/master')
@section('title','Users List')
@section('contents')
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
    width: 300px;    /* Change to desired width */
    height: 300px;   /* Change to desired height */
    margin: 0 auto; 
  }
    </style>
  @endif

  @if($users->isEmpty())
    <div class=" w-100 d-flex justify-content-center align-items-center " style="padding-top:20px">
      <div class="error-container">
        <div class="lottie-animation"></div>
        <div class="error-content">
          <h1>404</h1>
          <p>the account you're trying to access doesn't exist</p>
          <a href="/form" class="btn btn-primary">Back</a>
        </div>
      </div>
    </div>
  @else
  <button ><a href="/form" class="btn btn-primary ms-2 ">Add User</a></button>
  <div style="padding-left: 20px; padding-right: 20px;">
    <table class="table align-middle mb-0 bg-white ml-4" style="margin-top: 20px;">
      <thead class="bg-light">
        <tr>
          <th>Image</th>
          <th>{{__('messages.name_email')}}</th>
          <th class="text-center">{{__('messages.position')}}</th>
          <th class="text-center">{{__('messages.salary')}}</th>
          <th class="text-center">{{__('messages.location')}}</th>
          <th class="text-center" style="white-space: nowrap; vertical-align: center;" >{{__('messages.bod')}}</th>
          <th class="text-center">{{__('messages.action')}}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $items)
        <tr>
          <td>
            <img src="{{ asset('uploads/' . $items->img) }}" 
            alt="" 
            style="width: 80px; height: 80px;" 
            class="rounded-circle" />   
          </td>
          <td>
            <div class="d-flex align-items-center">
              {{-- <img src="{{ asset('uploads/' . $items->img) }}" 
              alt="" 
              style="width: 80px; height: 80px; object-fit: cover;" 
              class="rounded-circle" />               --}}
              <div class="ms-3">
                <p class="fw-bold mb-1">{{$items->name}}</p>
                <p class="text-muted mb-0">{{$items->email}}</p>
              </div>
            </div>
          </td>
          {{-- <td>
            <p class="fw-normal mb-1 text-center">{{$items->title}}</p>
          </td> --}}
          <td>
            <p class="fw-normal mb-1 text-center">{{$items->position}}</p>
          </td>
          <td>
            <p class="fw-normal mb-1 text-center">{{$items->salary}}$</p>
          </td>
          <td>
            <p class="fw-normal mb-1 text-sm text-center" >{{$items->province}},{{$items->country}}</p>
          </td>
          <td class="text-center" style="white-space: nowrap; vertical-align: center;">
            {{ \Carbon\Carbon::parse($items->dob)->format('d-M-Y') }}
          </td>          
          <td class="d-flex justify-content-center align-items-center gap-2 mt-4">
            <button type="button" class="btn btn-sm text-decoration-none btn-rounded btn-primary">
              <a class="text-white" href="{{url('update_user/' .$items->id)}}">Edit</a>
            </button>
            <button type="button" class="btn btn-sm text-decoration-none btn-rounded btn-danger">
              <a class="text-white" href="{{url('/delete', $items->id)}}"
                 onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
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
@endsection