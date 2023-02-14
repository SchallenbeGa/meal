<aside class="col-lg-3 col-md-3 border-end pb-5 mt-n5">
    <div class="position-sticky top-0">
      <div class="text-center pt-5">
        <button type="button" class="btn btn-secondary w-100 d-md-none mt-n2 mb-3" data-bs-toggle="collapse" data-bs-target="#account-menu">
          <i class="bx bxs-user-detail fs-xl me-2"></i>
            Menu
          <i class="bx bx-chevron-down fs-lg ms-1"></i>
        </button>
        <div id="account-menu" class="list-group list-group-flush collapse d-md-block">
          <a href="{{route('replay')}}" class="list-group-item list-group-item-action d-flex align-items-center {{ Route::is('replay') ? 'active' : '' }}">
            <i class="bx bx-code-curly fs-xl opacity-60 me-2"></i>
            Session ? EXT db 
          </a>
          <a href="{{route('heat')}}" class="list-group-item list-group-item-action d-flex align-items-center {{ Route::is('heat') ? 'active' : '' }}">
            <i class="bx bx-cog fs-xl opacity-60 me-2"></i>
            HeatMap
          </a>
          <a href="{{route('gestion')}}" class="list-group-item list-group-item-action d-flex align-items-center {{ Route::is('gestion') ? 'active' : '' }}">
            <i class="bx bx-list-ul fs-xl opacity-60 me-2"></i>
            Conseiller(s) & Group(s)
          </a>
          <a href="{{route('blog_edit')}}" class="list-group-item list-group-item-action d-flex align-items-center {{ Route::is('blog_edit') ? 'active' : '' }}">
            <i class="bx bx-edit fs-xl opacity-60 me-2"></i>
            Blog
          </a>
        </div>
      </div>
    </div>
  </aside>
