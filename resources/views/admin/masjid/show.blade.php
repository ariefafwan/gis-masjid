@extends('admin.app')

@section('body')
<section class="content">
    <div class="container">
      <div class="row">
        
        <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nama Masjid</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $masjid->name }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Alamat</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $masjid->alamat }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Daya Tampung</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $masjid->dayatampung }} Jiwa
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Luas Bangunan</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $masjid->luasbangunan }} M<sup>2</sup>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Skala Pembangunan</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $masjid->PembangunanName }} %
                </div>
              </div>
              <hr>
              <input type="hidden" class="latitude" id="latitude" value="{{ $masjid->latitude }}">
              <input type="hidden" class="longitude" id="longitude" value="{{ $masjid->longitude }}">
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-secondary" href="{{ route('editmasjid', $masjid->id) }}"><i class="bi bi-pencil-fill"></i> Edit</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-12" data-aos="zoom-in">
          <h2>Lokasi</h2>
          <div id="map"></div>
        </div>

        <div class="col-md-12 mt-3">
          <h2>Fasilitas Umum</h2>
          @if ($fasilumum->count() >= 1)
          <div class="box">
            <div class="box-body">
                <table id="category-table" class="table table-light table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nama Fasilitas</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fasilumum as $fasilumum)
                        <tr>
                          <th class="text-center">{{ $loop->iteration }}</th>
                            <td>{{ $fasilumum->name }}</td>
                            <td align="center">
                                <div class="btn-group">
                                    <hr>
                                    <a href="{{ route('efasilumum',$fasilumum->id) }}" class="btn btn-warning mr-2"><i class="bi bi-pencil-fill"></i></a>
                                    <hr>
                                    <a href="javascript:void(0)" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            document.getElementById('fasilumum-delete-form-{{$fasilumum->id}}').submit();">
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                    <form id="fasilumum-delete-form-{{$fasilumum->id}}" action="{{ route('dfasilumum',$fasilumum->id) }}" method="POST" style="display: none;">
                                        @csrf 
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <a class="btn btn-secondary" href="{{ route('cfasilumum', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
            </div>
          </div>
              
          @else
              <p>Data Tidak Ditemukan</p>
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-secondary" href="{{ route('cfasilumum', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
                </div>
              </div>
          @endif
        </div>

        <div class="col-md-12 mt-3">
          <h2>Sejarah Masjid</h2>
          @if ($sejarah->count() >= 1)
          <div class="box">
            <div class="box-body">
                {{-- <table id="category-table" class="table table-light table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nama Kegiatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sejarah as $sejarah)
                        <tr>
                          <th class="text-center">{{ $loop->iteration }}</th>
                            <td>{{ $sejarah->sejarah }}</td>
                            <td align="center">
                                <div class="btn-group">
                                    <hr>
                                    <a href="{{ route('esejarah',$sejarah->id) }}" class="btn btn-warning mr-2"><i class="bi bi-pencil-fill"></i></a>
                                    <hr>
                                    <a href="javascript:void(0)" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            document.getElementById('sejarah-delete-form-{{$sejarah->id}}').submit();">
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                    <form id="sejarah-delete-form-{{$sejarah->id}}" action="{{ route('dsejarah',$sejarah->id) }}" method="POST" style="display: none;">
                                        @csrf 
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> --}}
                @foreach ($sejarah as $sejarah)
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">
                        <a href="{{ route('esejarah',$sejarah->id) }}" class="btn btn-warning mr-2"><i class="bi bi-pencil-fill"></i></a>
                      <a href="javascript:void(0)" class="btn btn-danger"
                          onclick="event.preventDefault();
                              document.getElementById('sejarah-delete-form-{{$sejarah->id}}').submit();">
                          <i class="bi bi-trash3"></i>
                      </a>
                      <form id="sejarah-delete-form-{{$sejarah->id}}" action="{{ route('dsejarah',$sejarah->id) }}" method="POST" style="display: none;">
                          @csrf 
                      </form>
                      </h6>
                  </div>
                  <div class="card-body">
                      <!-- Main content -->
                      {!! $sejarah->sejarah !!}
                      {{-- {{ $sejarah->sejarah }} --}}
                  </div>
                @endforeach
              </div>
            </div>
          </div>
              
          @else
              <p>Data Tidak Ditemukan</p>
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-secondary" href="{{ route('csejarah', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
                </div>
              </div>
          @endif
        </div>

        <div class="col-md-12 mt-3">
          <h2>Galeri Foto</h2>
          @if ($foto->count() >= 1)
          <div class="box">
            <div class="box-body">
                <table id="category-table" class="table table-light table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Foto Masjid</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($foto as $foto)
                        <tr>
                          <th class="text-center">{{ $loop->iteration }}</th>
                            <td>
                              <img src="{{ asset('storage/galeri/foto/' . $foto->galeri ) }}" alt="{{ $foto->galeri }}" class="img-thumbnail" style="max-width:150px; max-height:170px">
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    {{-- <a href="{{ route('efoto',$foto->id) }}" class="btn btn-warning mr-2"><i class="bi bi-pencil-fill"></i></a> --}}
                                    <hr>
                                    <a href="javascript:void(0)" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            document.getElementById('foto-delete-form-{{$foto->id}}').submit();">
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                    <form id="foto-delete-form-{{$foto->id}}" action="{{ route('dfoto',$foto->id) }}" method="POST" style="display: none;">
                                        @csrf 
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <a class="btn btn-secondary" href="{{ route('cfoto', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
            </div>
          </div>
              
          @else
              <p>Data Tidak Ditemukan</p>
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-secondary" href="{{ route('cfoto', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
                </div>
              </div>
          @endif
        </div>

        <div class="col-md-12 mt-3">
          <h2>Galeri Video</h2>
          @if ($video->count() >= 1)
          <div class="box">
            <div class="box-body">
                <table id="category-table" class="table table-light table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Video Masjid</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($video as $video)
                        <tr>
                          <th class="text-center">{{ $loop->iteration }}</th>
                            <td>
                              {{-- <img src="/storage/galeri/video/{{ $video->video }}" alt="{{ $video->video }}" class="img-thumbnail" style="max-width:150px; max-height:170px"> --}}
                              <video controls width="500px">
                                <source src="{{ asset('storage/galeri/video/' . $video->video ) }}" type="video/webm">
                              </video>
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <hr>
                                    {{-- <a href="{{ route('evideo',$video->id) }}" class="btn btn-warning mr-2"><i class="bi bi-pencil-fill"></i></a> --}}
                                    <hr>
                                    <a href="javascript:void(0)" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            document.getElementById('foto-delete-form-{{$video->id}}').submit();">
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                    <form id="foto-delete-form-{{$video->id}}" action="{{ route('dvideo',$video->id) }}" method="POST" style="display: none;">
                                        @csrf 
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <a class="btn btn-secondary" href="{{ route('cvideo', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
            </div>
          </div>
              
          @else
              <p>Data Tidak Ditemukan</p>
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-secondary" href="{{ route('cvideo', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
                </div>
              </div>
          @endif
        </div>

      </div>
    </div>  
</section>
<script>
    let latitude = document.getElementById("latitude").value;
    let longitude = document.getElementById("longitude").value;

    let map = L.map('map').setView([latitude, longitude], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var marker = L.icon({
    iconUrl: '/asset/marker/mosquee.png',

    iconSize:     [38, 45], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    let popup = L.marker([latitude, longitude], {icon: marker}).addTo(map);

    popup.bindPopup("<b>Lokasi Masjid").openPopup();

</script>
@endsection
