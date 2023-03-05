@php
$user = Auth::user();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Title -->
  @isset($title)
  <title>{{ $title }}</title>
  @else
  <title>LessTax</title>
  @endisset
  <!-- Description -->
  @isset($description)
  <meta name="description" content="{{ $description }}">
  @else
  <meta name="description" content="LessTax est une plateforme pour gagner en efficacité avec moins qu'un clic !">
  @endisset
  <link sizes="180x180" href="{{ asset('img/favicon.png') }}">
  <script src="../assets/bootstrap.bundle.min.js"></script>
  <script async src="https://js.stripe.com/v3/pricing-table.js"></script>
  <script src="../assets/jquery.min.js"></script>

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link rel="stylesheet" href="{{ mix('css/boxicons.min.css') }}" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body id="heat" class="bg-white" style="color:black">


  <!-- Navbar -->
  <!-- Remove "fixed-top" class to make navigation bar scrollable with the page -->
  <header class="sticky-top navbar navbar-expand-lg shadow-sm" style="background-color:#F1F1F1 !important">
    <div class="container">
      @if(!Auth::check())
      <a href="/" class="navbar-brand">
        LessTax
      </a>
      @endif
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse2" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Theme mode switch. Can be used oly once on the page! 
      <div class="form-check form-switch mode-switch" data-bs-toggle="mode">
        <input type="checkbox" class="form-check-input" id="theme-mode">
        <label class="form-check-label d-none d-sm-block d-lg-none d-xl-block" for="theme-mode">Light</label>
        <label class="form-check-label d-none d-sm-block d-lg-none d-xl-block" for="theme-mode">Dark</label>
      </div> -->


      @auth
      <div class="nav dropdown d-block order-lg-3 ms-4">
        <a href="#" class="d-flex nav-link p-0" data-bs-toggle="dropdown">

          <div class="d-none d-sm-block ">
            <div class="h6 lh-1 mb-0 dropdown-toggle">Hello, {{$user->firstname}}</div>
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end my-1" style="width: 14rem;">
          <li>
            <button class="dropdown-item d-flex align-items-center" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <i class="bx bx-log-out fs-base opacity-60 me-2"></i>
              {{ __('Se déconnecter') }}
            </button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </div>
      @endauth



      @guest
      @if (Route::has('login'))
      <a href="{{ route('login') }}" class="btn btn-secondary btn-sm fs-sm rounded order-lg-3 d-none d-lg-inline-flex">
        <i class="bx bx-user fs-base me-1"></i>
        {{ __('Connexion') }}</a>
      @endif

      @endguest
      <nav id="navbarCollapse2" class="collapse navbar-collapse">
        <hr class="d-lg-none mt-3 mb-2">
        <ul class="navbar-nav me-auto">
        
        </ul>
        @guest
        @if (Route::has('login'))
        <a href="{{ route('login') }}" class="btn btn-secondary btn-sm fs-sm rounded my-3 d-lg-none">{{ __('Connexion') }}</a>
        @endif
        @endguest
      </nav>

    </div>
  </header>