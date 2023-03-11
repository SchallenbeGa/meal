@extends('layouts.app')

@section('content')
<!-- Portfolio list -->
<section data-aos="fade-up" class="container gy-4">
    <div class="row">
        <!-- Sidebar (User info + Account menu) -->
        @include('user.nav')
        <!-- Account security -->
        <div class="col-md-8 offset-lg-1 pb-5 mb-lg-2 mb-lg-4 mt-n3 mt-md-0">
            <section id="menu" class="menu">
                <div class="container" data-aos="fade-up">

                    <div class="section-header">
                        <h2>Our Menu</h2>
                        <p>Check Our <span>gourmandise Menu</span></p>
                    </div>

                    <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                                <h4>Starters</h4>
                            </a>
                        </li><!-- End tab nav item -->

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
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

                    <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

                        <div class="tab-pane fade active show" id="menu-starters">

                            <div class="tab-header text-center">
                                <p>Menu</p>
                                <h3>Starters</h3>
                            </div>

                            <div class="row gy-5">

                                <div class="col-lg-4 menu-item">
                                    <a href="img/menu/menu-item-1.png" class="glightbox"><img src="../img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                                    <h4>Magnam Tiste</h4>
                                    <p class="ingredients">
                                        Lorem, deren, trataro, filede, nerada
                                    </p>
                                    <p class="price">
                                        $5.95
                                    </p>
                                </div><!-- Menu Item -->

                                <div class="col-lg-4 menu-item">
                                    <a href="img/menu/menu-item-2.png" class="glightbox"><img src="../img/menu/menu-item-2.png" class="menu-img img-fluid" alt=""></a>
                                    <h4>Aut Luia</h4>
                                    <p class="ingredients">
                                        Lorem, deren, trataro, filede, nerada
                                    </p>
                                    <p class="price">
                                        $14.95
                                    </p>
                                </div><!-- Menu Item -->

                            </div>
                        </div><!-- End Starter Menu Content -->

                        <div class="tab-pane fade" id="menu-breakfast">

                            <div class="tab-header text-center">
                                <p>Menu</p>
                                <h3>Breakfast</h3>
                            </div>

                            <div class="row gy-5">


                                <div class="col-lg-4 menu-item">
                                    <a href="img/menu/menu-item-4.png" class="glightbox"><img src="../img/menu/menu-item-4.png" class="menu-img img-fluid" alt=""></a>
                                    <h4>Eos Luibusdam</h4>
                                    <p class="ingredients">
                                        Lorem, deren, trataro, filede, nerada
                                    </p>
                                    <p class="price">
                                        $12.95
                                    </p>
                                </div><!-- Menu Item -->

                                <div class="col-lg-4 menu-item">
                                    <a href="img/menu/menu-item-5.png" class="glightbox"><img src="../img/menu/menu-item-5.png" class="menu-img img-fluid" alt=""></a>
                                    <h4>Eos Luibusdam</h4>
                                    <p class="ingredients">
                                        Lorem, deren, trataro, filede, nerada
                                    </p>
                                    <p class="price">
                                        $12.95
                                    </p>
                                </div><!-- Menu Item -->

                                <div class="col-lg-4 menu-item">
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

                        <div class="tab-pane fade" id="menu-lunch">

                            <div class="tab-header text-center">
                                <p>Menu</p>
                                <h3>Lunch</h3>
                            </div>

                            <div class="row gy-5">

                                <div class="col-lg-4 menu-item">
                                    <a href="img/menu/menu-item-1.png" class="glightbox"><img src="../img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                                    <h4>Magnam Tiste</h4>
                                    <p class="ingredients">
                                        Lorem, deren, trataro, filede, nerada
                                    </p>
                                    <p class="price">
                                        $5.95
                                    </p>
                                </div><!-- Menu Item -->

                                <div class="col-lg-4 menu-item">
                                    <a href="img/menu/menu-item-2.png" class="glightbox"><img src="../img/menu/menu-item-2.png" class="menu-img img-fluid" alt=""></a>
                                    <h4>Aut Luia</h4>
                                    <p class="ingredients">
                                        Lorem, deren, trataro, filede, nerada
                                    </p>
                                    <p class="price">
                                        $14.95
                                    </p>
                                </div><!-- Menu Item -->

                                <div class="col-lg-4 menu-item">
                                    <a href="img/menu/menu-item-3.png" class="glightbox"><img src="../img/menu/menu-item-3.png" class="menu-img img-fluid" alt=""></a>
                                    <h4>Est Eligendi</h4>
                                    <p class="ingredients">
                                        Lorem, deren, trataro, filede, nerada
                                    </p>
                                    <p class="price">
                                        $8.95
                                    </p>
                                </div><!-- Menu Item -->

                                <div class="col-lg-4 menu-item">
                                    <a href="img/menu/menu-item-4.png" class="glightbox"><img src="../img/menu/menu-item-4.png" class="menu-img img-fluid" alt=""></a>
                                    <h4>Eos Luibusdam</h4>
                                    <p class="ingredients">
                                        Lorem, deren, trataro, filede, nerada
                                    </p>
                                    <p class="price">
                                        $12.95
                                    </p>
                                </div><!-- Menu Item -->

                                <div class="col-lg-4 menu-item">
                                    <a href="img/menu/menu-item-5.png" class="glightbox"><img src="../img/menu/menu-item-5.png" class="menu-img img-fluid" alt=""></a>
                                    <h4>Eos Luibusdam</h4>
                                    <p class="ingredients">
                                        Lorem, deren, trataro, filede, nerada
                                    </p>
                                    <p class="price">
                                        $12.95
                                    </p>
                                </div><!-- Menu Item -->

                                <div class="col-lg-4 menu-item">
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
                        </div><!-- End Lunch Menu Content -->

                        <div class="tab-pane fade" id="menu-dinner">

                            <div class="tab-header text-center">
                                <p>Menu</p>
                                <h3>Dinner</h3>
                            </div>

                            <div class="row gy-5">

                                <div class="col-lg-4 menu-item">
                                    <a href="img/menu/menu-item-1.png" class="glightbox"><img src="../img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                                    <h4>Magnam Tiste</h4>
                                    <p class="ingredients">
                                        Lorem, deren, trataro, filede, nerada
                                    </p>
                                    <p class="price">
                                        $5.95
                                    </p>
                                </div><!-- Menu Item -->

                                <div class="col-lg-4 menu-item">
                                    <a href="img/menu/menu-item-2.png" class="glightbox"><img src="../img/menu/menu-item-2.png" class="menu-img img-fluid" alt=""></a>
                                    <h4>Aut Luia</h4>
                                    <p class="ingredients">
                                        Lorem, deren, trataro, filede, nerada
                                    </p>
                                    <p class="price">
                                        $14.95
                                    </p>
                                </div><!-- Menu Item -->

                                <div class="col-lg-4 menu-item">
                                    <a href="img/menu/menu-item-3.png" class="glightbox"><img src="../img/menu/menu-item-3.png" class="menu-img img-fluid" alt=""></a>
                                    <h4>Est Eligendi</h4>
                                    <p class="ingredients">
                                        Lorem, deren, trataro, filede, nerada
                                    </p>
                                    <p class="price">
                                        $8.95
                                    </p>
                                </div><!-- Menu Item -->

                                <div class="col-lg-4 menu-item">
                                    <a href="img/menu/menu-item-4.png" class="glightbox"><img src="../img/menu/menu-item-4.png" class="menu-img img-fluid" alt=""></a>
                                    <h4>Eos Luibusdam</h4>
                                    <p class="ingredients">
                                        Lorem, deren, trataro, filede, nerada
                                    </p>
                                    <p class="price">
                                        $12.95
                                    </p>
                                </div><!-- Menu Item -->

                                <div class="col-lg-4 menu-item">
                                    <a href="img/menu/menu-item-5.png" class="glightbox"><img src="../img/menu/menu-item-5.png" class="menu-img img-fluid" alt=""></a>
                                    <h4>Eos Luibusdam</h4>
                                    <p class="ingredients">
                                        Lorem, deren, trataro, filede, nerada
                                    </p>
                                    <p class="price">
                                        $12.95
                                    </p>
                                </div><!-- Menu Item -->

                                <div class="col-lg-4 menu-item">
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
                        </div><!-- End Dinner Menu Content -->

                    </div>

                </div>
            </section><!-- End Menu Section -->

            <div class="ps-md-3 ps-lg-0 mt-md-2 pt-md-4 pb-md-2">
                <h1 class="h2 pt-xl-1 pb-3">Recettes</h1>
                <!-- Billing portal button -->
                <div class="text-center mx-auto mb-3">
                    <h5>Toutes les recettes</h5>
                </div>

            </div>
            <!-- Show invoices -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Montant</th>
                                            <th scope="col">Statut</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoices as $invoice)
                                        <tr>
                                            <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                                            <td>{{ $invoice->total() }}</td>
                                            <td>{{ $invoice->status }}</td>
                                            <td>
                                                <a href="{{ $invoice->hosted_invoice_url }}" class="btn btn-secondary btn-sm">Voir</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@include('template.rrweb')
@endsection