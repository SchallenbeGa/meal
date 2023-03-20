@extends('layouts.app')

@section('content')
      <!-- Page content -->
      <section data-aos="fade-up" class="container gy-4">
        <div class="row">

  
          <!-- Sidebar (User info + Account menu) -->
          @include('user.nav')
          

          <!-- Account details -->
          <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 mt-n3 mt-md-0">
            <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
              <h1 class="h2 pt-xl-1 pb-3">La forme ?(xl)</h1>
              <!-- Basic info -->
              <h2 class="h5 mb-4">Nous utilisons rmr...</h2>
              @if (session('status'))<!-- we should put this on every form so client see how dumb he is -->
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
                @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                  {{ session('error') }}
                </div>
                @endif
                
              <form method="POST" class="needs-validation border-bottom pb-3 pb-lg-4" action="{{ route('setup1') }}" novalidate>
              <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                @csrf
                @method('POST')
                <div class="row pb-2">
                  <div class="col-sm-6 mb-4">
                    <label for="fn" class="form-label fs-base">Taille</label>
                    <input type="text" id="fn" name="height" class="form-control form-control-lg" value="{{Auth::user()->height}}" required>
                    <div class="invalid-feedback">Veuillez saisir votre taille en centimétre</div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="sn" class="form-label fs-base">Poids</label>
                    <input type="text" id="sn" name="weight" class="form-control form-control-lg" value="{{Auth::user()->weight}}" required>
                    <div class="invalid-feedback">Veuillez saisir votre taille en kilo..</div>
                  </div>
                </div>
                <div class="row pb-2">
                  <div class="col-sm-6 mb-4">
                    <label for="fn" class="form-label fs-base">encore un truc</label>
                    <input type="text" id="fn" name="height" class="form-control form-control-lg" value="{{Auth::user()->height}}" required>
                    <div class="invalid-feedback">Veuillez saisir votre taille en centimétre</div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="sn" class="form-label fs-base">another one</label>
                    <input type="text" id="sn" name="weight" class="form-control form-control-lg" value="{{Auth::user()->weight}}" required>
                    <div class="invalid-feedback">Veuillez saisir votre taille en kilo..</div>
                  </div>
                </div>
                  <div class="d-flex mb-3">
                    <a href="{{route('profil')}}" class="btn btn-secondary me-3">Retour</a>
                    <a href="{{route('setup2')}}" class="btn btn-secondary">Suivant Demo</a>
                  </div>
              </form>

           
            </div>
          </div>
        </div>
      </section>
    </main>
    @include('template.rrweb')
@endsection