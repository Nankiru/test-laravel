<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/logo-icon.png')}}" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  @vite('resources/css/app.css')

</head>

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
                <a href="/register" class="d-flex justify-content-center align-items-center">
                  <img src="{{asset('assets/images/logos/logo_dash.png')}}" class="w-25 p-0" alt="">
                </a>
                <p class="text-center">Your Social Campaigns</p>
                <form action="{{url('register_submit')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control showpass" id="exampleInputPassword1">
                    @error('')
          @enderror
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Comfirm Password</label>
                    <input type="password" name="cfpass" class="form-control showpass" id="exampleInputPassword1">
                    @error('')
          @enderror
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Comfirm Password</label>
                    <input type="file" name="profileAdmin" class="form-control showpass" id="exampleInputPassword1">
                    @error('')
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
                  </div>
                  {{-- <a href="" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</a> --}}
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="/login">Sign In</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Show Password --}}

  <script>
    function myFunction() {
      var x = document.getElementsByClassName("showpass");
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