@extends('layouts.app')

@section('content')
<!-- Page content -->
<section class="container pt-5">
  <div class="row">
    <!-- Sidebar (User info + Account menu) -->
    @include('user.nav')
    <!-- Account security -->
    <div class="col-md-8 offset-lg-1 pb-5 mb-lg-2 mb-lg-4 mt-n3 mt-md-0">
     
          <div class="ps-md-3 ps-lg-0 mt-md-2 pt-md-4 pb-md-2">
            <h1 class="h2 pt-xl-1 pb-3">Vos informations</h1>

            <!-- if user has a job != '' -->
            @if (Auth::user()->actual_job == "")
            <div class="alert alert-secondary" role="alert">
              Merci de remplir le formulaire ci-dessous ?
            </div>
            @endif
            @if (session('status'))<!-- we should put this on every form so client see how dumb he is -->
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
            @elseif (session('error'))
            <div class="alert alert-danger" role="alert">
              {{ session('error') }}
            </div>
            @endif

            <!-- get the template situation -->
            @include('template.situation')

          </div>
        </div>
      </div>
</section>
@include('template.rrweb')
@endsection