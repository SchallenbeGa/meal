@extends('layouts.stat')

@section('content')
<!-- Portfolio list -->
<section class="container pt-5">
  <div class="row">
    @include('admin.nav')
    <!-- Account security -->
    <div class="col-md-8 offset-lg-1 pb-5 mb-lg-2 mb-lg-4 mt-n3 mt-md-0">
      <div class="ps-md-3 ps-lg-0 mt-md-2 pt-md-4 pb-md-2">
        <h1 class="h2 pt-xl-1 pb-3">Last 3 days</h1>
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

                <tr onclick="window.location='replay/{{$ids[$key]}}';">
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
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection