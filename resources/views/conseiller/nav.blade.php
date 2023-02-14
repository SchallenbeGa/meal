<aside class="col-lg-3 col-md-4 border-end pb-5 mt-n5">
    <div class="position-sticky top-0">
      <div class="text-center pt-2">
        <!-- Team Style 2: Vertical -->
      <div class="card card-body card-hover bg-light border-0 text-center mt-2 mb-2">
        Content de vous revoir !
      </div>

        <button type="button" class="btn btn-secondary w-100 d-md-none mt-n2 mb-3" data-bs-toggle="collapse" data-bs-target="#account-menu">
          <i class="bx bxs-user-detail fs-xl me-2"></i>
            Menu
          <i class="bx bx-chevron-down fs-lg ms-1"></i>
        </button>
        <div id="account-menu" class="list-group list-group-flush collapse d-md-block">
          <a href="{{route('mailbox')}}" class="list-group-item list-group-item-action d-flex align-items-center {{ Route::is('mailbox') ? 'active' : '' }}">
            <i class="bx bx-mail fs-xl opacity-60 me-2"></i>
            Boîte de réception
            <span class="badge bg-faded-success text-success ms-2">{{count(App\Models\SDocument::where('user_id', Auth::id())->get())}}</span>
          </a>
          <a href="{{route('tasks')}}" class="list-group-item list-group-item-action d-flex align-items-center {{ Route::is('tasks') ? 'active' : '' }}">
            <i class="bx bx-mail fs-xl opacity-60 me-2"></i>
            Dossier(s) en cours
            <span class="badge bg-faded-success text-success ms-2">{{count(App\Models\SDocument::where('user_id', Auth::id())->get())}}</span>
          </a>
        </div>
      </div>
    </div>

  </aside>


