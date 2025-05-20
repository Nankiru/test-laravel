<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

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

        .container {
            /* background-color: green; */
            padding: 0;

        }

        .link {
            text-decoration: ;
        }

        .link:hover {
            color: rgb(9, 185, 243);
            transition: all 0.3s ease;
        }
    </style>

    <!-- Sign up form -->
    <section class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="{{ asset('assets_login/images/signin-image.jpg') }}" alt="sing up image"></figure>

            </div>
            <div class="signin-form">
                <h2 class="form-title">Sign In</h2>
                <form method="POST" action="{{ url('signin_submit') }}" class="register-form" id="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="email" name="email" id="your_name" placeholder="Your Email" required />
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="pass" id="your_pass" placeholder="Password" required />
                    </div>
                    <div class="form-group">
                        <label class="label-agree-term"><span><span></span></span>Don't have an account <a
                                href="{{ url('register') }}" class="term-service link">Sign In</a></label>

                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Sing in  Form -->

    <!-- JS -->
    <script src="{{ asset('assets_login/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets_login/js/main.js') }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
