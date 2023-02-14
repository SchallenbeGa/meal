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
        <h1 class="h2 pt-xl-1 pb-3">Sécurité</h1>
        @if (session('status'))<!-- we should put this on every form so client see how dumb he is -->
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @elseif (session('error'))
        <div class="alert alert-danger" role="alert">
          {{ session('error') }}
        </div>
        @endif
        <!-- Password -->
        <h2 class="h5 text-secondary mb-4">Mot de passe</h2>
        <form method="POST" class="needs-validation border-bottom pb-3 pb-lg-4" action="{{ route('update.password') }}" novalidate>
          @csrf
          <div class="row">
            <div class="col-sm-6 mb-4">
              <label for="cp" class="form-label fs-base">Mot de passe actuel</label>
              <div class="password-toggle">
                <input id="p" type="password" id="cp" name="old_password" class="form-control form-control-lg" required>
                @error('old_password')
                <div class="alert">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row pb-2">
            <div class="col-sm-6 mb-4">
              <label for="np" class="form-label fs-base">Nouveau mot de passe</label>
              <div class="password-toggle">
                <input type="password" id="new_password" name="new_password" class="form-control form-control-lg" required>
                <label class="password-toggle-btn" aria-label="Show/hide password">
                  <input id="np" class="password-toggle-check" type="checkbox">
                  <span id="nps" class="password-toggle-indicator"></span>
                </label>
                @error('new_password')
                <div class="alert">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-sm-6 mb-4">
              <label for="cnp" class="form-label fs-base">Confirmer le nouveau mot de passe</label>
              <div class="password-toggle">
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control form-control-lg" required>
                <label class="password-toggle-btn" aria-label="Show/hide password">
                  <input id="npc" class="password-toggle-check" type="checkbox">
                  <span id="npcs" class="password-toggle-indicator"></span>
                </label>
                <div class="invalid-tooltip position-absolute top-100 start-0">Mot de passe incorrect</div>
              </div>
            </div>
          </div>
          <div class="d-flex mb-3">
            <button type="reset" class="btn btn-secondary me-3">Annuler</button>
            <button type="submit" class="btn btn-secondary">Sauvegarder</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
</main>
@endsection