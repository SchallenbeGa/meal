@extends('layouts.app')

@section('content')
<!-- Page content -->
<style>
    #external-events .fc-event {
        cursor: move;
        margin: 3px 0;
    }

    #calendar-container {
        position: relative;
        z-index: 1;
    }

    #calendar {
        max-width: 1100px;
        margin: 20px auto;
    }
    .fc-event{
        background-color: transparent !important;
        opacity: 100% !important;
    }
</style>
<section data-aos="fade-up" class="container" style>
    <div class="row">
        <!-- Sidebar (User info + Account menu) -->
        @include('user.nav')
        <!-- Account details -->
        <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 mt-n3 mt-md-0">
            <section id="menu" class="menu">
                <div id='external-events' class="container" data-aos="fade-up">
                    <p>
                        <strong>Draggable Events</strong>
                    </p>

                    <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                                <h4>Breakfast</h4>
                            </a><!-- End tab nav item -->

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
                                <h4>Lunch</h4>
                            </a>
                        </li><!-- End tab nav item -->

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
                                <h4>Dinner</h4>
                            </a>
                        </li><!-- End tab nav item -->

                    </ul>

                    <div class="tab-pane fade active show" id="menu-breakfast">

                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>Breakfast</h3>
                        </div>

                        <div class="row gy-5">


                        <div  id="fc-event" class="col-lg-4 menu-item">
                                <a href="img/menu/menu-item-5.png" class="glightbox"><img src="../img/menu/menu-item-5.png" class="menu-img img-fluid" alt=""></a>
                                <h4>Eos Luibusdam</h4>
                                <p class="ingredients">
                                    Lorem, deren, trataro, filede, nerada
                                </p>
                                <p class="price">
                                    $12.95
                                </p>
                            </div><!-- Menu Item -->

                            <div  id="fc-event" class="col-lg-4 menu-item">
                                <a href="img/menu/menu-item-5.png" class="glightbox"><img src="../img/menu/menu-item-5.png" class="menu-img img-fluid" alt=""></a>
                                <h4>Eos Luibusdam</h4>
                                <p class="ingredients">
                                    Lorem, deren, trataro, filede, nerada
                                </p>
                                <p class="price">
                                    $12.95
                                </p>
                            </div><!-- Menu Item -->

                            <div id="fc-event" class="col-lg-4 menu-item">
                                <a href="img/menu/menu-item-6.png" class="glightbox"><img src="../img/menu/menu-item-6.png" class="menu-img img-fluid" alt=""></a>
                                <h4>Laboriosam Direva</h4>
                                <p class="ingredients">
                                    Lorem, deren, trataro, filede, nerada
                                </p>
                                <p class="price">
                                    $9.95
                                </p>
                            </div><!-- Menu Item -->

                        </div>
                    </div><!-- End Breakfast Menu Content -->



                    <p>
                        <input type='checkbox' id='drop-remove' />
                        <label for='drop-remove'>remove after drop</label>
                    </p>
                </div>
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
                <div id="calendar-container">
                    <div id='calendar'></div>
                </div>
                <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
                <script>
                   
                    document.addEventListener('DOMContentLoaded', function() {
                        var Calendar = FullCalendar.Calendar;
                        var Draggable = FullCalendar.Draggable;

                        var containerEl = document.getElementById('external-events');
                        var calendarEl = document.getElementById('calendar');
                        var checkbox = document.getElementById('drop-remove');

                        // initialize the external events
                        // -----------------------------------------------------------------

                        new Draggable(containerEl, {
                            itemSelector: '#fc-event',
                            eventData: function(eventEl) {
                                return {
                                    title: eventEl.innerText
                                };
                            }
                        });

                        // initialize the calendar
                        // -----------------------------------------------------------------

                        var calendar = new Calendar(calendarEl, {
                            initialView: 'dayGridWeek',
                            editable: true,
                            droppable: true, // this allows things to be dropped onto the calendar
                            drop: function(info) {
                                // is the "remove after drop" checkbox checked?
                                if (checkbox.checked) {
                                    // if so, remove the element from the "Draggable Events" list
                                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                                }
                            }
                        });

                        calendar.render();
                    });
                </script>


        </div>
    </div>
    </div>
</section>
</main>
@include('template.rrweb')
@endsection