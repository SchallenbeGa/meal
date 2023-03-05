@extends('layouts.app')

@section('content')
      <!-- Page content -->
      <section class="container pt-5">
        <div class="row">

  
          <!-- Sidebar (User info + Account menu) -->
          @include('user.nav')
          

          <!-- Account details -->
          <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 mt-n3 mt-md-0">
            <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
              <h1 class="h2 pt-xl-1 pb-3">Recettes/Repas</h1>
              @if (session('status'))<!-- we should put this on every form so client see how dumb he is -->
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
                @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                  {{ session('error') }}
                </div>
                @endif
              <form method="POST" class="needs-validation border-bottom pb-3 pb-lg-4" action="{{ route('update.profil') }}" novalidate>
              <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                @csrf
                
              <!-- Delete account -->
              <form method="POST" action="{{ route('delete_account') }}">
              <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                @csrf
                @method('POST')
              <h2 class="h5 pt-1 pt-lg-3 mt-4">Noter vos derniers repas :)</h2>
              <p class="fs-sm pb-2">Donner votre avis sur vos récents délices</p>
              <div class="card border-secondary mt-4">
                        <div class="card-body">
                            <small class="text-muted">Jeudi 02.03.2023 </small>
                            <h5 class="card-title">Poulet au noix de cajou</h5>
                            <div class="d-flex justify-content-between">
                               
                            </div>
                        </div>
                    </div>
                    <div class="card border-secondary mt-4">
                        <div class="card-body">
                            <small class="text-muted">Mardi 13.02.2023 </small>
                            <h5 class="card-title">Bolognese bien fat</h5>
                            <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
                            <div class="d-flex justify-content-between">
                              
                               
                            </div>
                        </div>
                    </div>
                    <div class="card border-secondary mt-4">
                        <div class="card-body">
                            <small class="text-muted">Jeudi 10.02.2023 </small>
                            <h5 class="card-title">Spaghetti alle vongole</h5>
                            <div class="d-flex justify-content-between">
                               
                            </div>
                        </div>
                    </div>
                    <div class="card border-secondary mt-4">
                        <div class="card-body">
                            <small class="text-muted">Mercredi 24.12.2022 </small>
                            <h5 class="card-title">Bolognese</h5>
                            <div class="d-flex justify-content-between">
                               
                            </div>
                        </div>
                    </div>
              <div class="form-check mb-4">
                <input type="checkbox" id="delete-account" class="form-check-input" required>
                <label for="delete-account" class="form-check-label fs-base">du texte avec case a cocher</label>
              </div>
              <button type="submit" class="btn btn-danger">bouton menacantf</button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>
    @include('template.rrweb')
@endsection