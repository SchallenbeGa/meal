
@extends('layouts.app')

@section('content')
<section class="container pt-5">
  <div class="row">
    @include('admin.nav')
    <div class="col-md-8 offset-lg-1 pb-5 mb-lg-2 mb-lg-4 mt-n3 mt-md-0">
      <div class="ps-md-3 ps-lg-0 mt-md-2 pt-md-4 pb-md-2">
        <h1 class="h2 pt-xl-1 pb-3">Liste des articles sur le blog</h1>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead;>
              <tr>
                <th>Titre</th>
                <th>Like</th>
                <th>Commentaire(s)</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
                @foreach($ladata as $key => $lada)
                
                <script>console.log({{Js::from($lada[array_keys($lada)[$key]])}});</script>
                <tr onclick="window.location='heat/{{$key}}';">
                  <th scope="row">{{array_keys($lada)[$key]}}</th>
                  <td>{{count($lada[array_keys($lada)[$key]])}}</td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection