@extends('partials.app')

@section('welcome')
        
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">Selamat Datang</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Sistem Informasi Geografis Masjid Aceh Tamiang</h2>
                        <a class="btn btn-primary" href="#about">Detail</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="title mb-10">Peta Lokasi Wisata</h1>
                        <div class="row align-items-center">          
                    
                        </div>
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                              <div class="menu-content pb-70 col-lg-8">
                                <div class="title text-center" id="datawisata">
                                  <h1 class="mb-10">Jangkauan Peta</h1>
                                  <p>Aplikasi pemetaan geografis Wisata di kabupaten Banyumas ini memuat informasi dan lokasi dari Wisata ALam dan WIsata Kuliner di Banyumas. Pemetaan diambil dari data lokasi Google Maps dan data dari website masing-masing tempat wisata. Aplikasi ini memuat sejumlah informasi mengenai :
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="contact-section bg-black">
            <div class="container px-4 px-lg-5">
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </section>
        
@endsection