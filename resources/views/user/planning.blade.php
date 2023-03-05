@extends('layouts.app')

@section('content')
<!-- Page content -->
<section class="container pt-5">
    <div class="row">


        <!-- Sidebar (User info + Account menu) -->
        @include('user.nav')


        <!-- Account details -->
        <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 mt-n3 mt-md-0">
            <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
                <h1 class="h2 pt-xl-1 pb-3">Planning</h1>
                <!-- Basic info -->
                <h2 class="h5 mb-4">Vos prochains délices</h2>
                @if (session('status'))<!-- we should put this on every form so client see how dumb he is -->
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                <html lang='en'>
                <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var calendarEl = document.getElementById('calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            initialView: 'dayGridMonth'
                        });
                        calendar.render();
                    });
                </script>
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</section>
</main>
@include('template.rrweb')
@endsection