<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite('resources/css/app.css')
    
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="shortcut icon" href="{{asset('assets/images/logos/logo-favicon.png')}}" type="image/x-icon">
</head>
<style>
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeIn 1s ease-in-out forwards;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<body class="w-full">
    <!-- Background Pattern -->
    <div class="absolute -z-1">
        <div
            class=" bg-slate-50 [&>div]:absolute [&>div]:bottom-0 [&>div]:left-[-20%] [&>div]:right-0 [&>div]:top-[-10%] [&>div]:h-[500px] [&>div]:w-[500px] [&>div]:rounded-full [&>div]:bg-[radial-gradient(circle_farthest-side,rgba(255,87,34,.15),rgba(255,255,255,0))]">
        </div>
    </div>
    <header class="w-full bg-gray-300 px-5 py-2 lg:border-none border-b border-pink-400">
        <nav class="flex items-center justify-between">
            <a href="/">
                <img src="{{ asset('assets/images/logos/logo-favicon.png') }}" alt="Laravel Logo" class="w-10 h-10">
            </a>
    
            <!-- Desktop Menu -->
            <div class="hidden lg:block">
                <ul class="flex items-center justify-between gap-2">
                    <li><a href="" class="text-lg text-pink-500 hover:text-pink-600 transition duration-500">Home</a></li>
                    <li><a href="" class="text-lg text-pink-500 hover:text-pink-600 transition duration-500">Products</a></li>
                    <li><a href="" class="text-lg text-pink-500 hover:text-pink-600 transition duration-500">Services</a></li>
                    <li><a href="" class="text-lg text-pink-500 hover:text-pink-600 transition duration-500">About Us</a></li>
                    <li><a href="" class="text-lg text-pink-500 hover:text-pink-600 transition duration-500">Contact</a></li>
                </ul>
            </div>
    
            @if (session()->has('id'))
            <!-- Show Logout button if user is logged in -->
            <form action="{{ url('user_logout') }}" method="POST">
                @csrf
                <button type="submit" class="hidden lg:block bg-red-500 text-white px-3 py-2 rounded-lg hover:text-gray-300 transition duration-300">
                    Logout
                </button>
            </form>
        @else
            <!-- Show Login button if user is not logged in -->
            <a href="{{ url('login') }}">
                <button class="hidden lg:block bg-pink-500 text-white px-3 py-2 rounded-lg hover:text-gray-300 transition duration-300">
                    Login Now
                </button>
            </a>
        @endif
        
    
            <!-- Mobile Menu Toggle Icons -->
            <button id="open" class="block text-pink-500 lg:hidden cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                    <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/>
                </svg>
            </button>
    
            <button id="close" class="hidden text-pink-500 lg:hidden cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                    <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/>
                </svg>
            </button>
        </nav>
    
        <!-- Mobile Menu (Initially Hidden) -->
        <div id="mobileMenu" class="hidden flex flex-col bg-gray-300 px-5 py-4 lg:hidden">
            <ul class="flex flex-col gap-3">
                <li><a href="" class="text-lg text-pink-500 hover:text-pink-600 transition duration-500">Home</a></li>
                <li><a href="" class="text-lg text-pink-500 hover:text-pink-600 transition duration-500">Products</a></li>
                <li><a href="" class="text-lg text-pink-500 hover:text-pink-600 transition duration-500">Services</a></li>
                <li><a href="" class="text-lg text-pink-500 hover:text-pink-600 transition duration-500">About Us</a></li>
                <li><a href="" class="text-lg text-pink-500 hover:text-pink-600 transition duration-500">Contact</a></li>
            </ul>
    
            {{-- <button class="bg-pink-500 text-white px-3 py-2 rounded-lg hover:text-gray-300 transition duration-300 mt-3">
                <a href="">Login Now</a>
            </button> --}}
            <!-- Show Logout button if user is logged in -->
            @if (session()->has('id'))
            <form action="{{ url('user_logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-pink-500 text-white px-3 py-2 rounded-lg hover:text-gray-300 transition duration-300 mt-3">
                    Logout
                </button>
            </form>
        @else
            <!-- Show Login button if user is not logged in -->
            <button class="bg-pink-500 text-white px-3 py-2 rounded-lg hover:text-gray-300 transition duration-300 mt-3">
            <a href="{{ url('login') }}">
                    Login Now
                </a>
            </button>
        @endif
        </div>
    </header>
    <script>
document.getElementById('open').addEventListener('click', function() {
    const mobileMenu = document.getElementById('mobileMenu');
    mobileMenu.classList.remove('hidden');
    document.getElementById('open').classList.add('hidden');  // Hide open button
    document.getElementById('close').classList.remove('hidden');  // Show close button
    document.getElementById('open').setAttribute('aria-expanded', 'true');
});

document.getElementById('close').addEventListener('click', function() {
    const mobileMenu = document.getElementById('mobileMenu');
    mobileMenu.classList.add('hidden');
    document.getElementById('open').classList.remove('hidden');  // Show open button
    document.getElementById('close').classList.add('hidden');  // Hide close button
    document.getElementById('open').setAttribute('aria-expanded', 'false');
});

// Close mobile menu when clicking outside of it
document.addEventListener('click', function(event) {
    const mobileMenu = document.getElementById('mobileMenu');
    const menuButton = document.getElementById('open');
    const closeButton = document.getElementById('close');
    
    // Check if the clicked element is not the menu or the buttons
    if (!mobileMenu.contains(event.target) && !menuButton.contains(event.target) && !closeButton.contains(event.target)) {
        mobileMenu.classList.add('hidden');
        menuButton.classList.remove('hidden');  // Show open button
        closeButton.classList.add('hidden');  // Hide close button
        document.getElementById('open').setAttribute('aria-expanded', 'false');
    }
});


    </script>
    
    
        
    <main>
        <section class="mt-5">
            <div class="relative">
                <!-- Hero Content -->
                <div class="relative z-10 flex h-full flex-col items-center justify-center px-4">
                    <div class="max-w-3xl text-center">
                        <h1
                            class="fade-in mb-8 text-4xl font-bold tracking-tight sm:text-6xl lg:text-7xl text-slate-900">
                            My Project is so
                            <span class="fade-in text-pink-500">Sweety</span>
                        </h1>
                        <p class="mx-auto mb-8 max-w-2xl text-lg text-slate-700">
                            Build modern and beautiful websites with this collection of stunning background patterns.
                            Perfect for landing pages, apps, and dashboards.
                        </p>
                        <div class="flex flex-wrap justify-center gap-4">
                            <button
                                class="fade-in rounded-lg px-6 py-3 font-medium bg-pink-500 text-white hover:bg-pink-600 duration-300 transition cursor-pointer">
                                Get Started
                            </button>
                            <button
                                class="fade-in rounded-lg border px-6 py-3 font-medium border-slate-200 bg-white text-pink-500 hover:bg-slate-50 cursor-pointer">
                                Learn More
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 p-4">
            @foreach ($users as $user)
            
            <article class="rounded-xl border-2 border-gray-100 bg-white">
                <div class="flex items-start gap-4 p-4 sm:p-6 lg:p-8">
                  <a href="#" class="block shrink-0">
                    <img
                      alt=""
                      src="{{asset('uploads/'.$user->img)}}"
                      class="size-14 rounded-lg object-cover"
                    />
                  </a>
              
                  <div>
                    <h3 class="font-medium sm:text-lg">
                      <a href="#" class="hover:underline"> {{$user->name}}</a>
                    </h3>
              
                    <p class="line-clamp-2 text-sm text-gray-700">
                      {{$user->province}}
                    </p>
              
                    <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                      <div class="flex items-center gap-1 text-gray-500">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="size-4"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                          stroke-width="2"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"
                          />
                        </svg>
              
                        <p class="text-xs">{{$user->salary}}</p>
                      </div>
              
                      <span class="hidden sm:block" aria-hidden="true">&middot;</span>
              
                      <p class="hidden sm:block sm:text-xs sm:text-gray-500">
                        Posted by
                        <a href="#" class="font-medium underline hover:text-gray-700"> {{session('name')}} </a>
                      </p>
                    </div>
                  </div>
                </div>
              
                <div class="flex justify-end">
                  <strong
                    class="-me-[2px] -mb-[2px] inline-flex items-center gap-1 rounded-ss-xl rounded-ee-xl bg-green-600 px-3 py-1.5 text-white"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="size-4"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
                      />
                    </svg>
              
                    <span class="text-[10px] font-medium sm:text-xs">{{$user->position}}</span>
                  </strong>
                </div>
              </article>
              @endforeach
        </section>
    </main>


    {{-- Script AOS Animation --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></scrip>
    <script>
        AOS.init();
    </script>
</body>

</html>