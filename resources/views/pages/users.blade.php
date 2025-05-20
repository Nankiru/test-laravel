@extends('layouts/master')
@section('title', 'Users List')
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

  @if($users->isEmpty())
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
    <button><a href="/form" class="btn btn-primary ms-2" style="white-space: nowrap; vertical-align: center;">Add User</a></button>
    <form method="GET" action="{{url('search')}}" class="pe-3 pt-3">
      <div class="input-group mb-3 me-3">
        <input type="text" name="search" class="form-control" placeholder="Enter name to search" value="{{ request('search') }}">
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
            <th>Name/Email</th>
            <th class="text-center">Position</th>
            <th class="text-center">Salary</th>
            <th class="text-center">Location</th>
            <th class="text-center" style="white-space: nowrap; vertical-align: center;">Date of Birth</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($users as $items)
          <tr>
            <td>
              <img src="{{ asset('uploads/users/' . $items->img) }}" alt="Profile" class="rounded-circle" style="width: 60px; height: 55px;" />
            </td>
            <td>
              <div class="text-start">
                <p class="fw-bold mb-0">{{ $items->name }}</p>
                <small class="text-muted">{{ $items->email }}</small>
              </div>
            </td>
            <td>{{ $items->position }}</td>
            <td>{{ $items->salary }}$</td>
            <td>{{ $items->province }}, {{ $items->country }}</td>
            <td>{{ \Carbon\Carbon::parse($items->dob)->format('d-M-Y') }}</td>
            <td class="text-center">
              <div class="d-flex justify-content-center align-items-center gap-2">
                <a href="{{ url('update_user/' . $items->id) }}" class="btn btn-outline-secondary btn-sm" title="Edit">
                  <i class="fas fa-pen-to-square"></i>
                </a>
                <a href="{{ url('/delete', $items->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger btn-sm" title="Delete">
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
    {{ $users->links() }}
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
