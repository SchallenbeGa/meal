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
  <script src="../assets/jquery.min.js"></script>
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="../css/aos.css" rel="stylesheet">
  <link href="../css/normalize.css" rel="stylesheet">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/glightbox.min.css" rel="stylesheet">
  <link href="../css/swiper-bundle.min.css" rel="stylesheet">
  <link href="../css/app.css" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body style="margin:0%;">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="{{route('home')}}" class="logo d-flex align-items-center me-auto me-lg-0">
        <h1>gourmandise<span>.</span></h1>
      </a>
      @if(!Auth::check())
        <a class="btn-book-a-table" href="{{route('login')}}">Connexion</a>
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      @else
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
      <button class="btn-book-a-table" onclick="event.preventDefault();document.getElementById('logout-form').submit();" >Déconnexion</button>
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      @endif

    </div>
  </header><!-- End Header -->