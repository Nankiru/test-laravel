<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets1/images/favicon.svg') }}" />
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Font Icon -->
    <link rel="stylesheet"
        href="{{ asset('assets_login/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets_login/css/style.css') }}">
</head>

<body>
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

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Oops!',
                text: "{{ session('error') }}",
                icon: 'error',
                confirmButtonText: 'Try Again'
            });
        </script>
    @endif

    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .signup-content {
            padding-block: 15px;
        }


        .link:hover {
            color: rgb(9, 185, 243);
            transition: all 0.3s ease;
        }
    </style>

    <!-- Sign up form -->
    <section class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form method="POST" action="{{ url('register_submit') }}" class="register-form" id="register-form">
                    @csrf
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="fullname" id="name" placeholder="Enter Fullname" />
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email" />
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="pass" id="pass" placeholder="Enter Password" />
                    </div>
                    <div class="form-group row justify-content-between align-items-center"
                        style="display: flex; justify-content: space-between; align-items: center;">
                        <!-- Column 1: Label -->
                        <div>
                            <label><i class="zmdi zmdi-male-female"></i> Gender</label>
                        </div>

                        <!-- Column 2: Male -->
                        <div style="display: flex; justify-content: center; align-items: center;">
                            <i class="zmdi zmdi-male"></i>
                            <input type="radio" name="gender" id="male" value="male">
                        </div>

                        <!-- Column 3: Female -->
                        <div style="display: flex; justify-content: center; align-items: center;">
                            <i class="zmdi zmdi-female"></i>
                            <input type="radio" name="gender" id="female" value="female">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                            statements in <a href="#" class="term-service">Terms of service</a></label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="{{ asset('assets_login/images/signup-image.jpg') }}" alt="sing up image"></figure>
                <label class="label-agree-term"><span><span></span></span>I'm already have an account <a
                        href="{{ url('signin') }}" class="term-service link">Sign In</a></label>
            </div>
        </div>
    </section>

    <!-- Sing in  Form -->

    <!-- JS -->
    <script src="{{ asset('assets_login/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets_login/js/main.js') }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
