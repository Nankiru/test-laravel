<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/logo-icon.png')}}" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  {{-- @vite('resources/css/app.css') --}}
</head>

@if (session('success'))
  <script>
    Swal.fire({
    title: 'Success!',
    text: "{{ session('success') }}",
    icon: 'success',
    confirmButtonText: 'OK',
    timer: 3000,
    timerProgressBar: true
    });
  </script>
@endif


<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="/login" class="d-flex justify-content-center items-center">
                  <img src="{{asset('assets/images/logos/logo_dash.png')}}" class="w-25 p-0" alt="">
                </a>
                <p class="text-center">Sign in to your account</p>
                <form action="{{url('login_submit')}}" method="POST" enctype="multipart/form-data">
                  {{-- <p class="text-center ">{{session('status')}}</p> --}}
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                      aria-describedby="emailHelp">
                    @error('email')
            <span class="text-red-500">{{$message}}</span>
          @enderror
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control showpass" id="exampleInputPassword1">
                    @error('password')
            <span class="text-red-500">{{$message}}</span>
          @enderror
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" onclick="myFunction()"
                        id="flexCheckChecked">
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Show Password
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="login">Forgot Password ?</a>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Don't have an account?</p>
                    <a class="text-primary fw-bold ms-2" href="/register">Create an account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function myFunction() {
      var x = document.querySelector(".showpass");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>