@extends('layouts.app')

@section('content')
      <!-- Page content -->
      <section data-aos="fade-up" class="container gy-4">
        <div class="row">

  
          <!-- Sidebar (User info + Account menu) -->
          @include('user.nav')
          

          <!-- Account details -->
          <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 mt-n3 mt-md-0">
          <section id="menu" class="menu">
                <div class="container" data-aos="fade-up">
          
                  <div class="section-header">
                    <h2>Pick your favorite</h2>
                    <p>Our <span>gourmandise recipes</span></p>
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

            <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
              @if (session('status'))<!-- we should put this on every form so client see how dumb he is -->
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
                @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                  {{ session('error') }}
                </div>
                @endif
              <form method="POST" class="needs-validation border-bottom pb-3 pb-lg-4" action="{{ route('update.profil') }}" novalidate>
              <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                @csrf
                
              <!-- Delete account -->
              <form method="POST" action="{{ route('delete_account') }}">
              <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                @csrf
                @method('POST')
              <h2 class="h5 pt-1 pt-lg-3 mt-4">Noter vos derniers repas :)</h2>
              <p class="fs-sm pb-2">Donner votre avis sur vos récents délices</p>
              <div class="row gy-5">
          
                <div class="col-lg-4 menu-item">
                  <a href="img/menu/menu-item-1.png" class="glightbox"><img src="../img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                  <h4>Magnam Tiste - 18.02.2023</h4>
                  <p class="ingredients">
                    Lorem, deren, trataro, filede, nerada
                  </p>
                  <p class="price">
                    $5.95
                  </p>
                </div><!-- Menu Item -->
                <div class="col-lg-4 menu-item">
                  
                  <a href="img/menu/menu-item-1.png" class="glightbox"><img src="../img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                  <h4>Magnam Tiste - 17.02.2023</h4>
                  <p class="ingredients">
                    Lorem, deren, trataro, filede, nerada
                  </p>
                  <p class="price">
                    $5.95
                  </p>
                </div><!-- Menu Item -->
                <div class="col-lg-4 menu-item">
                  
                  <a href="img/menu/menu-item-1.png" class="glightbox"><img src="../img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                  <h4>Magnam Tiste - 16.02.2023</h4>
                  <p class="ingredients">
                    Lorem, deren, trataro, filede, nerada
                  </p>
                  <p class="price">
                    $5.95
                  </p>
                </div><!-- Menu Item -->
                <div class="col-lg-4 menu-item">
                  
                  <a href="img/menu/menu-item-1.png" class="glightbox"><img src="../img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                  <h4>Magnam Tiste - 15.02.2023</h4>
                  <p class="ingredients">
                    Lorem, deren, trataro, filede, nerada
                  </p>
                  <p class="price">
                    $5.95
                  </p>
                </div><!-- Menu Item -->
                <div class="col-lg-4 menu-item">
                  
                  <a href="img/menu/menu-item-1.png" class="glightbox"><img src="../img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                  <h4>Magnam Tiste - 14.02.2023</h4>
                  <p class="ingredients">
                    Lorem, deren, trataro, filede, nerada
                  </p>
                  <p class="price">
                    $5.95
                  </p>
                </div><!-- Menu Item -->
              </div>
              <div class="card border-secondary mt-4">
                        <div class="card-body">
                            <small class="text-muted">Jeudi 02.03.2023 </small>
                            <h5 class="card-title">Poulet au noix de cajou</h5>
                            <div class="d-flex justify-content-between">
                               
                            </div>
                        </div>
                    </div>
                    <div class="card border-secondary mt-4">
                        <div class="card-body">
                            <small class="text-muted">Mardi 13.02.2023 </small>
                            <h5 class="card-title">Bolognese bien fat</h5>
                            <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
                            <div class="d-flex justify-content-between">
                              
                               
                            </div>
                        </div>
                    </div>
                    <div class="card border-secondary mt-4">
                        <div class="card-body">
                            <small class="text-muted">Jeudi 10.02.2023 </small>
                            <h5 class="card-title">Spaghetti alle vongole</h5>
                            <div class="d-flex justify-content-between">
                               
                            </div>
                        </div>
                    </div>
                    <div class="card border-secondary mt-4">
                        <div class="card-body">
                            <small class="text-muted">Mercredi 24.12.2022 </small>
                            <h5 class="card-title">Bolognese</h5>
                            <div class="d-flex justify-content-between">
                               
                            </div>
                        </div>
                    </div>
          
          </div>
        </div>
      </section>
    </main>
    @include('template.rrweb')
@endsection