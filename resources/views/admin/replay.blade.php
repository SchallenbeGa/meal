@extends('layouts.stat')

@section('content')
<section class="container pt-5">
  <div class="row">
    @include('admin.nav')
    <div class="col-md-8 offset-lg-1 pb-5 mb-lg-2 mb-lg-4 mt-n3 mt-md-0">
      <div class="tab-pane fade active show">
        <div class="d-sm-flex mb-4">
          <div class="card card-hover mb-4 mb-sm-0 me-sm-4" style="max-width: 20rem;">
            <div class="card-body">
              <h5 class="card-title">Users</h5>
              <p class="card-text fs-sm">User : {{$stato[0]}} - Today new : {{$stato[1]}} <br>Total sessions : {{$stato[4]}} - Guest : {{$stato[2]}}</p>
            </div>
          </div>
          <div class="card card-hover mb-4 mb-sm-0 me-sm-4" style="max-width: 20rem;">
            <div class="card-body">
              <h5 class="card-title">General</h5>
              <p class="card-text fs-sm">SDocument : {{$stato[3]}} <br>
                Article : {{$stato[8]}} - Comment : {{$stato[6]}} - Like : {{$stato[7]}} <br>
              </p>
            </div>
          </div>
        </div>

      </div>
      <div class="ps-md-3 ps-lg-0 mt-md-2 pt-md-4 pb-md-2">
        <script src="../assets/rrweb_player.js"></script>
        <link rel="stylesheet" href="../css/rrweb.css">
        <style>
          .rr-player__frame,
          .rr-player,
          .replayer-mouse-tail {
              width: 100% !important;
              height: 100% !important;
          }
          .rr-player{
            background: none !important;
          }
          .replayer-mouse-tail {
              max-width: 100% !important;
              position: absolute !important;
          }
          .replayer-wrapper {
              left: 0% !important;
              right:0% !important;
              float: none !important;
              transform: none !important;
          }
        </style>
        <h1 class="h2 pt-xl-1 pb-3">Last X days</h1>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead;>
              <tr>
                <th>User Information</th>
                <th>First seen</th>
                <th>Last seen</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
                @foreach($ladata as $key => $lada)

                <tr data-bs-toggle="modal" data-bs-target="#user-info{{$key}}">
                  <th scope="row">{{$users_data[$key]}}</th>
                  <td>{{$dates_f[$key]}}</td>
                  <td>{{$dates[$key]}}</td>
                  <td>
                    <form action="/replay/delete/{{$ids[$key]}}" method="POST">
                      @csrf
                      @method('POST')
                      <button type="submit" class="btn btn-sm btn-danger"><i class='bx bx-trash'></i>Delete</button>
                    </form>
                  </td>
                </tr>
                <div class="modal fade" id="user-info{{$key}}" tabindex="1" role="dialog">
                  <div class="modal-dialog modal-xl modal-dialog-centered " role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body" id="replay{{$key}}">
                      </div>
                    </div>
                  </div>
                </div>
                <script>
                  new rrwebPlayer({
                    target: document.getElementById('replay' + {{$key}}),
                    props: {
                      events:{{Js::from($lada)}},
                      maxScale: 0.5,
                    },
                  });
                </script>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection