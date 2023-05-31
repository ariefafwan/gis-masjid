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
                        <h1 class="title">Peta Lokasi Masjid</h1>
                        <div class="row align-items-center">
                            <div class="mb-4" id="map"></div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <h1 id="datamasjid">Data Masjid</h1>
                        <p>Aplikasi pemetaan geografis Masjid di Kabupaten Aceh Tamiang, Masjid Yang Terdata :</p>
                        <div class="box">
                            <div class="box-body">
                                <table id="category-table" class="table table-bordered table-hover">
                                    <thead style="background-color: black">
                                        <tr>
                                            <th style="width: 5%" class="text-white text-center">#</th>
                                            <th style="width: 30%" class="text-white text-center">Name</th>
                                            <th class="text-white text-center">Alamat</th>
                                            <th style="widht: 10%" class="text-white text-center">Skala Pembangunan</th>
                                            <th style="widht: 5%" class="text-white text-center">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($masjid as $index => $row)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->alamat }}</td>
                                            <td>{{ $row->PembangunanName }}</td>
                                            <td>
                                                <a href="" class="btn btn-warning">
                                                    <i class="bi bi-eye"></i>
                                                </a>
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
        </section>
        
@endsection