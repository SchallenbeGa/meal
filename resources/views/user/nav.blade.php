<aside class="col-lg-3 col-md-4 border-end pb-5 mt-n5">
    <div class="position-sticky top-0">
      <div class="text-center pt-2">
        <!-- Team Style 2: Vertical -->
      <div class="card card-body card-hover bg-light border-0 text-center mt-2 mb-2">
      Bienvenue !
      </div>

        <button type="button" class="btn btn-secondary w-100 d-md-none mt-n2 mb-3" data-bs-toggle="collapse" data-bs-target="#account-menu">
          <i class="bx bxs-user-detail fs-xl me-2"></i>
            Menu
          <i class="bx bx-chevron-down fs-lg ms-1"></i>
        </button>
        <div id="account-menu" class="list-group list-group-flush collapse d-md-block">
          <a href="{{route('profil')}}" class="list-group-item list-group-item-action d-flex align-items-center {{ Route::is('profil') ? 'active' : '' }}">
            <i class="bx bx-cog fs-xl opacity-60 me-2"></i>
            Compte
          </a>
          <a href="{{route('chat')}}" class="list-group-item list-group-item-action d-flex align-items-center {{ Route::is('chat') ? 'active' : '' }}">
            <i class="bx bx-message-rounded-dots fs-xl opacity-60 me-2"></i>
            Conseiller(ère)
          </a>
          <a href="{{route('show.situation')}}" class="list-group-item list-group-item-action d-flex align-items-center {{ Route::is('show.situation') ? 'active' : '' }}">
            <i class="bx bx-briefcase-alt fs-xl opacity-60 me-2"></i>
            Mon Dossier <i class="bx bxs-bell-ring opacity-60 me-3"></i>
          </a>
          <a href="{{route('sdocument.history')}}" class="list-group-item list-group-item-action d-flex align-items-center {{ Route::is('sdocument.history') ? 'active' : '' }}">
            <i class="bx bx-collection fs-xl opacity-60 me-2"></i>
            Documents <i class="bx bxs-hand-left opacity-60 me-3"></i>
            <span class="badge bg-faded-success text-success ms-2">{{count(App\Models\SDocument::where('user_id', Auth::id())->get())}}</span>
          </a>
          <hr>
          <a href="{{route('billing')}}" class="list-group-item list-group-item-action d-flex align-items-center {{ Route::is('billing') ? 'active' : '' }}">
            <i class="bx bx-receipt fs-xl opacity-60 me-2"></i>
            Factures ?
            <span class="badge bg-faded-success text-success ms-2">{{count(App\Models\SDocument::where('user_id', Auth::id())->get())}}</span>
          </a>
        </div>
      </div>
    </div>

  </aside>


