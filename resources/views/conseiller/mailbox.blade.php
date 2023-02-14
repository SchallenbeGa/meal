@extends('layouts.app')

@section('content')
<section class="container pt-5">
    <div class="row">
        @include('conseiller.nav')
        <div class="col-md-8 offset-lg-1 pb-5 mb-lg-2 mb-lg-4 mt-n3 mt-md-0">
            <div class="ps-md-3 ps-lg-0 mt-md-2 pt-md-4 pb-md-2">
                <h1 class="h2 pt-xl-1 pb-3">Dernier(s) message(s)</h1>
               
                @foreach ($contacts as $contact)
                <div class="col-sm-12 col-md-12">
                    <div class="card border-secondary mt-4">
                        <div class="card-body">
                            <small class="text-muted">Stocké le {{$sdocument->created_at}}</small>
                            <h5 class="card-title">Titre du fichier pour {{$sdocument->title}}</h5>
                            <div class="d-flex justify-content-between">
                                <form action="{{route('sdocument.edit.show')}}" class="d-flex" method="POST">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="id_sdocument" value="{{$sdocument->id}}" />
                                    <button type="submit" class="btn btn-sm btn-secondary d-flex"><i class='bx bx-edit'></i>Visualiser</button>
                                </form>
                                <form action="/sdocument/delete/{{$sdocument->id}}" class="d-flex" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-sm btn-danger d-flex" style="width:160px"><i class='bx bx-trash'></i>Effacer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
</section>
@include('template.rrweb')
@endsection