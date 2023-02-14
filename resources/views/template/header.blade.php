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
  <meta name="description" content="LessTax est une plateforme qui vous permet de trouver un job en un clic !">
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
         @if (Auth::user()->control_id == 0)
        <li>
            <a href="{{ route('profil') }}" class="dropdown-item d-flex align-items-center">
              <i class="bx bx-user-circle fs-base opacity-60 me-2"></i>
              Compte
            </a>
          </li>
          <li>
            <a href="{{route('chat')}}" class="dropdown-item d-flex align-items-center">
              <i class="bx bx-message-rounded-dots fs-xl opacity-60 me-2"></i>
              Conseiller/ère
              <span class="badge bg-faded-info text-info ms-2">{{count(App\Models\SDocument::where('user_id', Auth::id())->get())}}</span>
            </a>
          </li>
          <li>
            <a href="{{route('show.situation')}}" class="dropdown-item d-flex align-items-center">
              <i class="bx bx-briefcase-alt fs-xl opacity-60 me-2"></i>
              Mon Dossier
              <span class="badge bg-faded-info text-info ms-2">{{count(App\Models\SDocument::where('user_id', Auth::id())->get())}}</span>
            </a>
          </li>
         
          <li>
            <a href="{{route('sdocument.history')}}" class="dropdown-item d-flex align-items-center">
              <i class="bx bx-collection fs-xl opacity-60 me-2"></i>
              Documents
              <span class="badge bg-faded-info text-info ms-2">{{count(App\Models\SDocument::where('user_id', Auth::id())->get())}}</span>
            </a>
          </li>
          <hr>
          <li>
            <a href="{{route('billing')}}" class="dropdown-item d-flex align-items-center">
              <i class="bx bx-receipt fs-base opacity-60 me-2"></i>
              Factures ?
              <span class="badge bg-faded-info text-info ms-2">{{count(App\Models\SDocument::where('user_id', Auth::id())->get())}}</span>
            </a>
          </li>
          @endif
          <li class="dropdown-divider"></li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <i class="bx bx-log-out fs-base opacity-60 me-2"></i>
              {{ __('Se déconnecter') }}
            </a>
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
          @auth
          <li><a href="{{route('client_debug')}}" class="nav-link {{Auth::user()->control_id == 0 ? 'active' : '' }}">(client)</a></li>
          <li><a href="{{route('conseiller_debug')}}" class="nav-link {{Auth::user()->control_id == 1 ? 'active' : '' }} ">(conseiller)</a></li>
          <li><a href="{{route('admin_debug')}}" class="nav-link {{Auth::user()->control_id == 2 ? 'active' : '' }}">(admin)</a></li>
          @endauth    
          @guest
          <li><a href="{{route('blog')}}" class="nav-link ">Blog</a></li>
          @endguest
        </ul>
        @guest
        @if (Route::has('login'))
        <a href="{{ route('login') }}" class="btn btn-secondary btn-sm fs-sm rounded my-3 d-lg-none">{{ __('Connexion') }}</a>
        @endif
        @endguest
      </nav>

    </div>
  </header>