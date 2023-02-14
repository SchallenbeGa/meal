@extends('layouts.app')
@section('content')
@php
$title = 'LessTax - Blog';
$description = 'Trouvez les meilleures façons de faire votre lettres de motivation et trouver de bons exemple de lettre de motivation sur LessTax';
@endphp
<div class="p-5">
  <div class="d-flex align-items-center justify-content-between mb-4 pb-1 pb-md-3">
    @if($article == null)
      @if($category == null)
      <h1 class="mb-0">Nos derniers articles</h1>
      @else
      <h1 class="mb-0">Articles dans la categorie {{$category}}</h1>
      @endif
    @endif
  </div>
  @if($article != null)
    @include('blog.article')
  @else
  <div class="row">
    <div class="col-xl-9 col-lg-8">
      <div class="pb-2 pb-lg-3"></div>
      @foreach($articles as $article)
      <article class="card me-xl-5 mb-4">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3">
            <a href="blog/category/{{$article->category}}" class="badge fs-sm bg-faded-secondary text-decoration-none">{{$article->category}}</a>
            <!-- <a href="{{$article->id}}" class="btn btn-icon btn-secondary btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3" data-bs-toggle="tooltip" data-bs-placement="left" title="Read later">
                <i class="bx bx-bookmark"></i>
              </a> -->
          </div>
          <h3 class="h4">
            <a href="{{route('article', ['slug' => $article->slug])}}">{{$article->title}}</a>
          </h3>
          <p class="mb-4">{{substr(json_decode($article->content)[0],0,120)}}...</p>
          <div class="d-flex align-items-center text-muted">
            <div class="fs-sm border-end pe-3 me-3">{{$article->created_at}}</div>
            <div class="fs-sm pe-3 me-3">
            {{$article->author}}
            </div>
            <!-- <div class="d-flex align-items-center me-3">
                <i class="bx bx-like fs-lg me-1"></i>
                <span class="fs-sm">8</span>
              </div>
              <div class="d-flex align-items-center me-3">
                <i class="bx bx-comment fs-lg me-1"></i>
                <span class="fs-sm">7</span>
              </div>
              <div class="d-flex align-items-center">
                <i class="bx bx-share-alt fs-lg me-1"></i>
                <span class="fs-sm">3</span>
              </div> -->
          </div>
        </div>
      </article>
      @endforeach
      <div class="pb-2 pb-lg-3"></div>
      @endif
    </div>
  </div>
</div>
</aside>
</div>
</section>
@include('template.rrweb')
@endsection