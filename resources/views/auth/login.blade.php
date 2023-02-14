@extends('layouts.app')
@section('content')
@php
$title = 'LessTax - Connexion';
$description = 'Connectez-vous sur LessTax pour accéder à votre compte et à vos lettres de motivation';
@endphp
<div class="p-5 bg-size-cover bg-repeat-0 bg-position-center" style="background-image: url(/img/300.jpg);">
  <div class="container shadow-sm d-flex flex-wrap justify-content-center h-100 pt-5" style="background-image: url(/img/301.jpg);">
    <div class="w-100 align-self-end pt-1 pt-md-4 pb-4" style="max-width: 470px;">
      <h1 class="text-center">Connectez-vous</h1>
      <h4 class="text-center text-muted">En sécurité sur la plateforme de votre choix</h3>
        @include('template.login_buttons')
    </div>
  </div>
</div>
@include('template.rrweb')
@endsection