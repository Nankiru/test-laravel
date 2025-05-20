<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Login</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="{{asset('assets/images/logos/nan-icon.png')}}" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    .form-panel {
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.5s ease;
      backface-visibility: hidden;
      transform-style: preserve-3d;
    }

    .form-panel.active {
      opacity: 1;
      pointer-events: auto;
      z-index: 10;
    }

    #flipWrapper.rotate-y {
      transform: rotateY(180deg);
    }

    #flipWrapper.rotate-x-up {
      transform: rotateX(-180deg);
    }

    #flipWrapper.rotate-x-down {
      transform: rotateX(180deg);
    }

    .card-container {
      perspective: 1500px;
      position: relative;
      width: 100%;
      height: 100%;
    }

    .flip-wrapper {
      transition: transform 0.8s ease-in-out;
      transform-style: preserve-3d;
      position: relative;
      width: 100%;
      height: 100%;
    }

    .form-panel {
      backface-visibility: hidden;
      position: absolute;
      width: 100%;
      height: 100%;
      border-radius: 1rem;
      top: 0;
      left: 0;
    }

    .user-panel {
      z-index: 5;
      transform: rotateY(0deg) rotateX(0deg);
    }

    .admin-panel {
      transform: rotateY(180deg);
    }

    .signup-panel {
      transform: rotateX(-180deg);
    }

    .forgot-panel {
      transform: rotateX(180deg);
    }

    .rotate-y {
      transform: rotateY(180deg);
    }

    .rotate-x-up {
      transform: rotateX(-180deg);
    }

    .rotate-x-down {
      transform: rotateX(180deg);
    }
  </style>

</head>

<body class="bg-gradient-to-br from-cyan-100 to-blue-200 min-h-screen flex items-center justify-center p-4">

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
      title: 'Login Failed',
      text: "{{ session('error') }}",
      icon: 'error',
      confirmButtonText: 'Try Again'
    });
    </script>
  @endif

  <div class="card-container w-full max-w-md h-[550px] transition-transform duration-500 relative py-10">
    <div id="flipWrapper" class="flip-wrapper">

      <!-- Admin LOGIN -->
      <form action="{{url('admin_submit')}}" method="POST"
        class="form-panel panel-user absolute inset-0 active bg-white shadow-2xl rounded-2xl p-8 flex flex-col justify-between">
        @csrf
        <div>
          <div class="flex justify-center mb-4">
            <img src="{{asset('assets/images/logos/nan-icon.png')}}" alt="Code Logo" width="100" alt="Logo"
              class="w-auto h-14" />
          </div>
          <h2 class="text-2xl font-bold text-center text-cyan-600 mb-6 pt-6">Admin Login</h2>
          <div class="space-y-4">
            {{-- <div class="relative">
              <i class="fa fa-envelope absolute left-3 top-2.5 text-gray-400"></i>
              <input type="text" placeholder="Full name" name="email"
                class="pl-10 pr-3 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-400 outline-none transition-all" />
            </div> --}}
            <div class="relative">
              <i class="fa fa-envelope absolute left-3 top-2.5 text-gray-400"></i>
              <input type="email" placeholder="Email address" name="email"
                class="pl-10 pr-3 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-400 outline-none transition-all" />
            </div>
            <div class="relative">
              <i class="fa fa-lock absolute left-3 top-3 text-gray-400"></i>

              <input type="password" placeholder="Password" name="password"
                class="pl-10 pr-10 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-400 outline-none transition-all"
                id="password-input" />

              <!-- Eye icon -->
              <i class="far fa-eye absolute right-3 top-3 text-gray-500 cursor-pointer"
                id="show-password-toggle-icon"></i>
            </div>
            <button type="submit"
              class="w-full bg-cyan-500 hover:bg-cyan-600 transition text-white py-2 rounded-lg font-semibold">
              Login
            </button>
            <div class="flex justify-between text-sm text-gray-600 px-1 mt-2">
              <a onclick="flipTo('forgot')" class="hover:underline cursor-pointer">Forgot Password?</a>
              <a onclick="flipTo('signup')" class="hover:underline cursor-pointer">Sign Up</a>
            </div>
          </div>
        </div>
        <div class="text-center mt-6">
          <a onclick="flipTo('admin')"
            class="flex items-center gap-2 cursor-pointer text-cyan-600 hover:text-cyan-800 transition text-sm">
            <i class="fas fa-repeat fa-sm rotate-180"></i>
            Login as User
          </a>
        </div>
      </form>

      <script>
        const toggleIcon = document.getElementById('show-password-toggle-icon');
        const passwordInput = document.getElementById('password-input');

        toggleIcon.addEventListener('click', () => {
          const isPassword = passwordInput.type === 'password';
          passwordInput.type = isPassword ? 'text' : 'password';
          toggleIcon.classList.toggle('fa-eye');
          toggleIcon.classList.toggle('fa-eye-slash');
        });
      </script>

      <!-- User LOGIN -->
      <form action="{{url('user_login')}}" method="POST"
        class="form-panel panel-admin absolute inset-0 bg-gradient-to-br from-cyan-500 to-sky-600 text-white shadow-2xl rounded-2xl p-8 flex flex-col justify-between"
        style="transform: rotateY(180deg);">
        @csrf
        <div>
          <div class="flex justify-center mb-4">
            <img src="{{asset('assets/images/logos/nan-icon.png')}}" alt="Code Logo" width="100" alt="Logo"
              class="w-auto h-14" />
          </div>
          <h2 class="text-2xl font-bold text-center mb-6 pt-5">User Login</h2>
          <div class="space-y-4">
            <div class="relative">
              <i class="fa fa-lock absolute left-3 top-2.5 text-white/70"></i>
              <input type="text" placeholder="Full Name" name="name"
                class="pl-10 pr-3 py-2 w-full bg-white/10 border border-white/30 rounded-lg placeholder-white/70 text-white focus:ring-2 focus:ring-white outline-none transition-all" />
            </div>
            <div class="relative">
              <i class="fa fa-envelope absolute left-3 top-2.5 text-white/70"></i>
              <input type="email" placeholder="Email Address" name="email"
                class="pl-10 pr-3 py-2 w-full bg-white/10 border border-white/30 rounded-lg placeholder-white/70 text-white focus:ring-2 focus:ring-white outline-none transition-all" />
            </div>
            <button type="submit"
              class="w-full bg-white text-cyan-600 font-semibold py-2 rounded-lg hover:bg-white/90 transition">
              Login
            </button>
          </div>
        </div>
        <div class="text-center mt-6">
          <a onclick="flipTo('user')" class="flex items-center gap-2 cursor-pointer text-white hover:underline text-sm">
            <i class="fas fa-repeat fa-sm"></i>
            Login as Admin
          </a>
        </div>
      </form>

      <!-- SIGN UP -->
      <form action="{{url('admin_register')}}" method="POST"
        class="form-panel panel-signup absolute inset-0 bg-white shadow-2xl rounded-2xl p-8"
        style="transform: rotateX(-180deg);">
        @csrf
        <div class="flex justify-center mb-4">
          <img src="{{asset('assets/images/logos/nan-icon.png')}}" alt="Code Logo" width="100" alt="Logo"
            class="w-auto h-14" />
        </div>
        <h2 class="text-2xl font-bold text-center text-cyan-600 mb-6">Sign Up</h2>
        <div class="space-y-4">
          <div class="relative">
            <i class="fa fa-user absolute left-3 top-2.5 text-gray-400"></i>
            <input type="text" placeholder="Full Name" name="name"
              class="pl-10 pr-3 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-400 outline-none transition-all" />
          </div>
          <div class="relative">
            <i class="fa fa-envelope absolute left-3 top-2.5 text-gray-400"></i>
            <input type="text" placeholder="Email address" name="email"
              class="pl-10 pr-3 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-400 outline-none transition-all" />
          </div>
          <div class="relative">
            <i class="fa fa-lock absolute left-3 top-2.5 text-gray-400"></i>
            <input type="password" placeholder="Password" name="password"
              class="pl-10 pr-10 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-400 outline-none transition-all"
              id="signup-password" />
            <i class="fa fa-eye absolute right-3 top-2.5 text-gray-500 cursor-pointer"
              onclick="togglePassword('signup-password', this)"></i>
          </div>

          <button type="submit"
            class="w-full bg-cyan-500 hover:bg-cyan-600 transition text-white py-2 rounded-lg font-semibold">
            Create Account
          </button>
          <div class="text-center text-sm pt-4">
            <a onclick="flipTo('user')" class="text-cyan-600 hover:underline cursor-pointer">Back to Login</a>
          </div>
        </div>
      </form>

      <!-- FORGOT PASSWORD -->
      <form action="{{url('forgot_password')}}" method="POST"
        class="form-panel panel-forgot absolute inset-0 bg-white shadow-2xl rounded-2xl p-8"
        style="transform: rotateX(180deg);">
        @csrf
        <div class="flex justify-center mb-4">
          <img src="{{asset('assets/images/logos/nan-icon.png')}}" alt="Code Logo" width="100" class="w-auto h-14" />
        </div>
        <h2 class="text-2xl font-bold text-center text-cyan-600 mb-6">Forgot Password</h2>
        <div class="space-y-4">
          <div class="relative">
            {{-- <i class="fa fa-lock absolute left-3 top-2.5 text-gray-400"></i> --}}
            <i class="fa fa-envelope absolute left-3 top-2.5 text-gray-400"></i>
            <input type="email" placeholder="Your email" name="email"
              class="pl-10 pr-10 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-400 outline-none transition-all"
              id="email" />
            {{-- <i class="fa fa-eye absolute right-3 top-2.5 text-gray-500 cursor-pointer"
              onclick="togglePassword('email-password', this)"></i> --}}
            @error('email')
        <p class="text-danger">{{$message}}</p>
      @enderror
          </div>
          <div class="relative">
            <i class="fa fa-lock absolute left-3 top-2.5 text-gray-400"></i>
            <input type="password" placeholder="New password" name="newpass"
              class="pl-10 pr-10 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-400 outline-none transition-all"
              id="new-password" />
            <i class="fa fa-eye absolute right-3 top-2.5 text-gray-500 cursor-pointer"
              onclick="togglePassword('new-password', this)"></i>
            @error('newpass')
        <p class="text-danger">{{$message}}</p>
      @enderror
          </div>
          <div class="relative">
            <i class="fa fa-lock absolute left-3 top-2.5 text-gray-400"></i>
            <input type="password" placeholder="Confirm password" name="cfpass"
              class="pl-10 pr-10 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-400 outline-none transition-all"
              id="confirm-password" />
            <i class="fa fa-eye absolute right-3 top-2.5 text-gray-500 cursor-pointer"
              onclick="togglePassword('confirm-password', this)"></i>
            @error('cfpass')
        <p class="text-danger">{{$message}}</p>
      @enderror
          </div>
          <button type="submit"
            class="w-full bg-cyan-500 hover:bg-cyan-600 transition text-white py-2 rounded-lg font-semibold">
            Reset your password
          </button>
          <div class="text-center text-sm pt-4">
            <a onclick="flipTo('user')" class="text-cyan-600 hover:underline cursor-pointer">Back to Login</a>
          </div>
        </div>
      </form>


    </div>
  </div>

  <script>
    function togglePassword(fieldId, icon) {
      const input = document.getElementById(fieldId);
      if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    }
  </script>
  <script>



    const wrapper = document.getElementById('flipWrapper');
    const panels = document.querySelectorAll('.form-panel');

    function flipTo(target) {
      // Reset transform classes
      wrapper.classList.remove('rotate-y', 'rotate-x-up', 'rotate-x-down');
      panels.forEach(p => p.classList.remove('active'));

      // Set a new title based on the target panel
      let newTitle = 'Login'; // default title
      if (target === 'admin') {
        wrapper.classList.add('rotate-y');
        newTitle = 'User Login';
      } else if (target === 'signup') {
        wrapper.classList.add('rotate-x-up');
        newTitle = 'Create Account';
      } else if (target === 'forgot') {
        wrapper.classList.add('rotate-x-down');
        newTitle = 'Reset Password';
      } else {
        newTitle = 'Admin Login';
      }

      // Update the browser tab title
      document.title = newTitle;

      // Show the selected panel after the animation
      setTimeout(() => {
        if (target === 'admin') document.querySelector('.panel-admin').classList.add('active');
        else if (target === 'signup') document.querySelector('.panel-signup').classList.add('active');
        else if (target === 'forgot') document.querySelector('.panel-forgot').classList.add('active');
        else document.querySelector('.panel-user').classList.add('active');
      }, 400);
    }

    // Set the default panel to show on page load
    document.querySelector('.panel-user').classList.add('active');
  </script>


  {{-- @if (session('success'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Success',
      text: '{{ session('success') }}',
      confirmButtonColor: '#0ea5e9'
    });
  </script>
  @endif --}}

  {{-- @if (session('status'))
  <script>
    Swal.fire({
      icon: 'status',
      title: 'Oops...',
      text: '{{ session('status') }}',
      confirmButtonColor: '#0ea5e9'
    });
  </script>
  @endif

  @if ($errors->any())
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Validation Error',
      html: `{!! implode('<br>', $errors->all()) !!}`,
      confirmButtonColor: '#0ea5e9'
    });
  </script>
  @endif --}}




</body>

</html>
