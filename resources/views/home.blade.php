<!-- Import header.blade.php -->
@extends('layouts.app')
@section('content')
@php
$title = 'LessTax - More life !';
@endphp
<section class="overflow-hidden bg-size-cover bg-repeat-0 bg-position-center" style="background-image: url(/img/300.jpg);min-height: 420px;">
  <div class="container position-relative zindex-2 pt-5 pb-md-2 pb-lg-4 pb-xl-5 mx-auto">
    <div class="row pt-3 pb-2 py-md-5 mx-auto mt-5" style="max-height:700px">
      <div class="col-xl-12 col-md-12 text-center text-md-start mb-4 mb-md-0 mx-auto">
        <h1 class="display-4">
          <span class="badge bg-secondary"><b id="LessTax">LessTax - More life !</b></span>
        </h1>
      </div>
    </div>
  </div>
</section>
@guest
<div class="sticky-top d-flex justify-content-center justify-content-center pb-2 pt-lg-2 pt-xl-0 flex-wrap flex-md-nowrap">
  <a href="{{route('login')}}" class="sticky-top d-flex btn btn-primary bg-gradient me-3 me-sm-4 flex-column flex-md-row" style="margin-top:-33px">S'inscrire</a>
</div>
@endguest

<div class="container pb-5 mb-md-2 mb-lg-4 mb-xl-5 mt-5">
  <div class="row">
    
    <div class="col-md-4">
      <div class="card card-portfolio">
        <div class="card-img">
          <picture>
            <source media="(min-width: 650px)" srcset="/img/100.png">
            <source srcset="/img/100.png">
            <img class="card-img-top img-fluid" style="width:auto;" alt="Card Image chat">
          </picture>

        </div>
        <div class="card-body">
          <h4 class="mb-2 text-center">Mise a disposition d'outils performant</h4>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-portfolio">
        <div class="card-img">
          <img src="/img/103.jpg" class="card-img-top img-fluid" alt="Card Image conseiller">
        </div>
        <div class="card-body">
          <h4 class="mb-2 text-center">Préparation de votre déclaration d'impôts</h4>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-portfolio">
        <div class="card-img">
          <picture>
            <source media="(min-width: 650px)" srcset="/img/102.jpeg">
            <source srcset="/img/102.jpeg">
            <img class="card-img-top img-fluid" style="width:auto;" alt="Card Image Server">
          </picture>
        </div>
        <div class="card-body">
          <h4 class="mb-2 text-center">Stockage sécurisé de vos documents confidentiels</h4>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="container pb-2 pb-lg-3">
  <div class="row pb-5 mb-md-4 mb-lg-5">
    <div class="col-md-6 pb-1 mb-3 pb-md-0 mb-md-0">
      <a href="/blog">
        <img src="/img/team_work.webp" class="rounded-3" width="600" alt="Image">
      </a>
    </div>
    <div class="col-md-6">
      <div class="ps-md-4 ms-md-2">
        <h2 class="h3">Notre équipe écrits des articles quotidiennement</h2>
        <a href="/blog/category/fiscalité" class="btn btn-secondary">Fiscalité</a>
        <p class="d-md-none d-lg-block pb-3 mb-2 mb-md-3">Notre équipe est passionnée par la fiscalité et met tout en œuvre pour vous offrir les informations les plus pertinentes et à jour.<br><br>Nous écrivons des articles quotidiens sur les avantages, les stratégies et les meilleures pratiques en matière d'oseil pour vous aider à trouver les déductions parfaite. Restez informé et actualisé grâce à notre contenu exclusif !</p>
        <a href="/blog" class="btn btn-outline-secondary">Lire nos articles</a>
      </div>
    </div>
  </div>
</section>
@include('template.rrweb')
@endsection