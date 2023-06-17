@extends('partials.app')

@section('welcome')
        
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">Selamat Datang</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Sistem Informasi Geografis Masjid Aceh Tamiang</h2>
                        <a class="btn btn-primary" href="#datamasjid">Detail</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="datamasjid">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-12 mb-5">
                        <h1 class="title">Detail Masjid {{ $masjid->name }}</h1>
                        <div class="row align-items-center">
                            <div class="card">
                                <div class="card-header">{{ $page }}</div>
                                <div class="card-body">
                                    <h5 class="card-title mb-4 mt-2">Profil Masjid</h5>
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                          <td style="width: 20%">Nama Masjid</td>
                                          <td>:</td>
                                          <td>{{ $masjid->name }}</td>
                                        </tr>
                                        <tr>
                                          <td>Berdiri Sejak</td>
                                          <td style="width: 2%">:</td>
                                          <td>{{ $masjid->berdirinya }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td style="width: 2%">:</td>
                                            <td>{{ $masjid->statusmasjid }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Masjid</td>
                                            <td style="width: 2%">:</td>
                                            <td>{{ $masjid->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pengurus</td>
                                            <td style="width: 2%">:</td>
                                            <td>{{ $masjid->namapengurus }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status Tanah</td>
                                            <td style="width: 2%">:</td>
                                            <td>{{ $masjid->statustanah }}</td>
                                        </tr>
                                        <tr>
                                            <td>Luas Tanah</td>
                                            <td style="width: 2%">:</td>
                                            <td>{{ $masjid->luastanah }}</td>
                                        </tr>
                                        <tr>
                                            <td>Luas Bangunan</td>
                                            <td style="width: 2%">:</td>
                                            <td>{{ $masjid->luasbangunan }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Daya Tampung</td>
                                            <td style="width: 2%">:</td>
                                            <td>{{ $masjid->dayatampung }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status Pembangunan</td>
                                            <td style="width: 2%">:</td>
                                            <td>{{ $masjid->PembangunanName }} %</td>
                                        </tr>
                                        <tr>
                                            <td>Dana Yang Diperlukan</td>
                                            <td style="width: 2%">:</td>
                                            <td>{{ $masjid->dana }}</td>
                                        </tr>
                                        {{-- <tr>
                                          <td>Gejala</td>
                                          <td>:</td>
                                          <td>
                                            @foreach ($basis as $item)
                                            <ul>
                                              <li>{{ $item->gejala->nama_gejala }}</li>
                                            </ul>
                                            @endforeach
                                          </td>
                                        </tr> --}}
                                    </table>
                                    <h5 class="card-title mb-4 mt-2">Lainnya Tentang Masjid {{ $masjid->name }}</h5>
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title text-start"><i class="bi bi-hourglass-split"></i>&nbspSejarah Masjid</h5>
                                                    @if ($sejarah->count() >= 1)
                                                    @foreach ($sejarah as $s)
                                                        <div class="card-text text-start">
                                                            {!! $s->sejarah !!}
                                                        </div>
                                                    @endforeach
                                                    @else
                                                    <p class="card-text text-start">Tidak Ditemukan!</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title text-start"><i class="bi bi-building-check"></i>&nbspFasilitas Masjid</h5>
                                                    @if ($fasilumum->count() >= 1)
                                                        <ul>
                                                    @foreach ($fasilumum as $fu)
                                                            <li class="text-start">{{ $fu->name }}</li>
                                                    @endforeach
                                                        </ul>
                                                    @else
                                                    <p class="card-text text-start">Tidak Ditemukan!</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title text-start"><i class="bi bi-images"></i></i>&nbspGaleri Foto Masjid</h5>
                                                    @if ($foto->count() >= 1)
                                                    <div class="d-flex justify-content-start mt-4">
                                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#galerifoto"><i class="bi bi-eye"></i>&nbspLihat Galeri</button>
                                                    </div>
                                                    @else
                                                    <p class="card-text text-start">Tidak Ditemukan!</p>
                                                    @endif
                                                    @include('modalfoto')
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title text-start"><i class="bi bi-camera-video"></i></i>&nbspGaleri Video Masjid</h5>
                                                    @if ($video->count() >= 1)
                                                    <div class="d-flex justify-content-start mt-4">
                                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#galerivideo"><i class="bi bi-eye"></i>&nbspLihat Galeri</button>
                                                    </div>
                                                    @else
                                                    <p class="card-text text-start">Tidak Ditemukan!</p>
                                                    @endif
                                                    @include('modalvideo')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection