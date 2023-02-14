<section class="container mt-4 pt-lg-2 pb-3">
  <h1 class="pb-3" style="max-width: 970px;">{{$article->title}}</h1>
  <div class="d-flex flex-md-row flex-column align-items-md-center justify-content-md-between mb-3">
    <div class="d-flex align-items-center flex-wrap text-muted mb-md-0 mb-4">
      <div class="fs-xs border-end pe-3 me-3 mb-2">
        <span class="badge bg-faded-secondary text-secondary fs-base">{{$article->category}}</span>
      </div>
      <div class="fs-sm border-end pe-3 me-3 mb-2">{{$article->created_at}}</div>
      <div class="d-flex mb-2">
        <div class="d-flex align-items-center me-3">
          <i class="bx bx-like fs-base me-1"></i>
          <span class="fs-sm">{{count($likes)}}</span>
        </div>
        <div class="d-flex align-items-center me-3">
          <i class="bx bx-comment fs-base me-1"></i>
          <span class="fs-sm">{{count($comments)}}</span>
        </div>
        <!-- <div class="d-flex align-items-center">
                <i class="bx bx-share-alt fs-base me-1"></i>
                <span class="fs-sm">2</span>
              </div> -->
      </div>
    </div>
    <div class="d-flex align-items-center position-relative ps-md-3 pe-lg-5 mb-2">
      <!-- TODO !-->
      <img src="https://via.placeholder.com/150" class="rounded-circle" width="60" alt="Avatar">
      <div class="ps-3">
        <h6 class="mb-1">Author</h6>
        <a href="#" class="fw-semibold stretched-link">{{$article->author}}</a>
      </div>
    </div>
  </div>
</section>

<!-- Post content + Sharing -->
<section class="container mb-5 pt-4 pb-2 py-mg-4">
  <div class="row gy-4">

    <!-- Content -->
    <div class="col-lg-9">
      @foreach(json_decode($article->content) as $para)
      <p class="mb-4 pb-2">{{$para}}</p>
      @endforeach
      <!-- Tags -->
    </div>
    <!-- Sharing -->
    <div class="col-lg-3 position-relative">
      <div class="sticky-top ms-xl-5 ms-lg-4 ps-xxl-4" style="top: 105px !important;">
        <h6>Share this post:</h6>
        <div class="mb-4 pb-lg-3">
          <a href="#" class="btn btn-icon btn-secondary btn-linkedin me-2 mb-2">
            <i class="bx bxl-linkedin"></i>
          </a>
          <a href="#" class="btn btn-icon btn-secondary btn-facebook me-2 mb-2">
            <i class="bx bxl-facebook"></i>
          </a>
          <a href="#" class="btn btn-icon btn-secondary btn-twitter me-2 mb-2">
            <i class="bx bxl-twitter"></i>
          </a>
        </div>
        @if(!$like_check)
        @if(Auth::check())
        <a href="/blog/article/{{$article->id}}/like" class="btn btn-lg btn-outline-secondary">
          @else
          <a href="{{ route('login')}}" class="btn btn-lg btn-outline-secondary">
            @endif
            <i class="bx bx-like me-2 lead"></i>
            like
            <span class="badge bg-secondary shadow-secondary mt-n1 ms-3">{{count($likes)}}</span>
          </a>
          @else
          <button class="btn btn-lg btn-secondary" disabled>
            <i class="bx bx-like me-2 lead"></i>
            Déjà aimé
            <span class="badge bg-secondary shadow-secondary mt-n1 ms-3">{{count($likes)}}</span>
          </button>
          @endif

      </div>
    </div>
  </div>
  <h2 class="h1 text-center text-sm-start">{{count($comments)}} comments</h2>
  <div class="row">

    <!-- Comments -->
    <div class="col-lg-9">
      @foreach($comments as $comment)
      <hr class="my-2">

      <!-- Comment -->
      <div class="py-4">
        <div class="d-flex align-items-center justify-content-between pb-2 mb-1">
          <div class="d-flex align-items-center me-3">
            <!-- TODO !-->
            <img src="https://ui-avatars.com/api/?name={{$comment->author}}&background=random" class="rounded-circle" width="48" alt="Avatar">
            <div class="ps-3">
              <h6 class="fw-semibold mb-0">{{$comment->author}}</h6>
              <span class="fs-sm text-muted">{{$comment->created_at}}</span>
            </div>
          </div>
        </div>
        <p class="mb-0 pb-2">{{$comment->content}}</p>
      </div>
      @endforeach
    </div>
    <!-- Comment form + Subscription -->
    <section class="container mb-4 pb-2 mb-md-5 pb-lg-5">
      <div class="row gy-5">

        <!-- Comment form -->
        <div class="col-lg-9">
          <div class="card p-md-5 p-4 border-0 bg-secondary">
            <div class="card-body w-100 mx-auto px-0" style="max-width: 746px;">
              <h2 class="mb-4 pb-3">Laissez un commentaire</h2>
              @if(Auth::check())
              <form action="/blog/article/{{$article->id}}/comment" method="POST" class="row gy-4 needs-validation" novalidate>
                @csrf
                <div class="col-12">
                  <textarea id="c-comment" name="content" class="form-control form-control-lg" rows="3" placeholder="Type your comment here..." required></textarea>
                  <span class="invalid-tooltip">Partagez votre opinion !</span>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-lg btn-secondary w-sm-auto w-100 mt-2">Enregistrer</button>
                </div>
              </form>
              @else
              @include('template.login_buttons')
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @include('template.rrweb')
</section>