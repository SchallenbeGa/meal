
    @if (session('status'))<!-- we should put this on every form so client see how dumb he is -->
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @elseif (session('error'))
      <div class="alert alert-danger" role="alert">
        {{ session('error') }}
      </div>
      @endif

    <div class="text-center mt-3">
      <div class="col mb-3">
        <a href="/redirect/linkedin" class="btn btn-icon btn-secondary btn-linkedin btn-lg w-100">
          <i class="bx bxl-linkedin fs-xl me-2"></i>
          LinkedIn
        </a>
      </div>
      <div class="col mb-3">
        <a href="/redirect/google" class="btn btn-icon btn-secondary btn-google btn-lg w-100">
          <i class="bx bxl-google fs-xl me-2"></i>
          Google
        </a>
      </div>
      <div class="col mb-3">
        <a href="/redirect/facebook" class="btn btn-icon btn-secondary btn-facebook btn-lg w-100">
          <i class="bx bxl-facebook fs-xl me-2"></i>
          Facebook ?
        </a>
      </div>
      <div class="col mb-3">
        <a href="/redirect/twitter" class="btn btn-icon btn-secondary btn-twitter btn-lg w-100">
          <i class="bx bxl-twitter fs-xl me-2"></i>
          Twitter ?
        </a>
      </div>
    </div>
</div>