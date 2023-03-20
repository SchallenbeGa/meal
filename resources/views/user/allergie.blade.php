@extends('layouts.app')

@section('content')
<!-- Page content -->
<section data-aos="fade-up" class="container gy-4">
  <div class="row">
    <!-- Sidebar (User info + Account menu) -->
    @include('user.nav')
    <!-- Account security -->
    <div class="col-md-8 offset-lg-1 pb-5 mb-lg-2 mb-lg-4 mt-n3 mt-md-0">
      <section id="menu" class="menu">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <p>Des allergies ?</p>
          </div>
          <!-- Basic info -->
          @if (session('status'))<!-- we should put this on every form so client see how dumb he is -->
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @elseif (session('error'))
          <div class="alert alert-danger" role="alert">
            {{ session('error') }}
          </div>
          @endif

          <form method="POST" class="needs-validation border-bottom pb-3 pb-lg-4" action="{{ route('setup2') }}" novalidate>
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            @csrf
            @method('POST')
            <div class="row pb-2">
              <div class="row pb-2 text-center">
                <div class="col-sm-12 mb-8">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ex-radio-4" name="radio2">
                    <label class="form-check-label" for="ex-radio-4">Femme</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ex-radio-5" name="radio2" checked>
                    <label class="form-check-label" for="ex-radio-5">Homme</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ex-radio-6" name="radio2" disabled>
                    <label class="form-check-label" for="ex-radio-6">Autre ;)</label>
                  </div>
                </div>

                <div class="d-flex mb-3">
                  <button type="reset" class="btn btn-secondary me-3">Retour</button>
                  <a href="{{route('setup3')}}" class="btn btn-secondary">Suivant Demo</a>
                </div>
          </form>
        </div>
      </section>
    </div>
  </div>
</section>
@include('template.rrweb')
@endsection