
@extends('layouts.app')

@section('content')
<style>
a{
    color:black;
}
</style>
<section class="container pt-5">
  <div class="row">
    @include('admin.nav')
    <div class="col-md-8 offset-lg-1 pb-5 mb-lg-2 mb-lg-4 mt-n3 mt-md-0">
      <div class="ps-md-3 ps-lg-0 mt-md-2 pt-md-4 pb-md-2">
        <h1 class="h2 pt-xl-1 pb-3">Liste des conseillers</h1>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead;>
              <tr>
                <th>Nom/prénom</th>
                <th>Dossier(s) en cours</th>
                <th>Groupe de conseiller</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                    <td>John Doe</td>
                    <td>2</td>
                    <td>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>BIG</option>
                            <option>Non attribué</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>John Deer</td>
                    <td>10</td>
                    <td>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Non attribué</option>
                            <option>BIG</option>
                        </select>
                    </td>
                </tr>
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
        <h1 class="h2 pt-xl-1 pb-3">Liste des groupes de conseiller</h1>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead;>
              <tr>
                <th>Titre</th>
                <th>Nb de conseiller/ère</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                    <td>Non attribué</td>
                    <td>16</td>
                    <td>
                        <a href="edit">edit</a>
                        <a href="delete">delete</a>
                    </td>
                </tr>
                <tr>
                    <td>BIG</td>
                    <td>10</td>
                    <td>
                        <a href="edit">edit</a>
                        <a href="edit">delete</a>
                    </td>
                </tr>
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