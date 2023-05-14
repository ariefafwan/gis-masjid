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
                  <a class="btn btn-info" href="{{ route('editmasjid', $masjid->id) }}"><i class="bi bi-pencil-fill"></i> Edit</a>
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
          <h2>Pimpinan Masjid</h2>
          @if ($pimpinan->count() == 1)
          <div class="box">
            <div class="box-body">
                <table id="category-table" class="table table-light table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nama Pimpinan</th>
                            <th class="text-center">Nama Imam</th>
                            <th class="text-center">Jumlah Pengurus</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pimpinan as $pimpinan)
                        <tr>
                          <th class="text-center">{{ $loop->iteration }}</th>
                            <td align="center">{{ $pimpinan->pimpinan }}</td>
                            <td align="center">{{ $pimpinan->imam }}</td>
                            <td align="center">{{ $pimpinan->jmlhpengurus }}</td>
                            <td align="center">
                                <div class="btn-group">
                                    <hr>
                                    <a href="{{ route('epimpinan',$pimpinan->id) }}" class="btn btn-warning mr-2"><i class="bi bi-pencil-fill"></i></a>
                                    <hr>
                                    <a href="javascript:void(0)" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            document.getElementById('pimpinan-delete-form-{{$pimpinan->id}}').submit();">
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                    <form id="pimpinan-delete-form-{{$pimpinan->id}}" action="{{ route('dpimpinan',$pimpinan->id) }}" method="POST" style="display: none;">
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
              
          @else
              <p>Data Tidak Ditemukan</p>
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-success" href="{{ route('cpimpinan', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
                </div>
              </div>
          @endif
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
              <a class="btn btn-success" href="{{ route('cfasilumum', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
            </div>
          </div>
              
          @else
              <p>Data Tidak Ditemukan</p>
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-success" href="{{ route('cfasilumum', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
                </div>
              </div>
          @endif
        </div>

        <div class="col-md-12 mt-3">
          <h2>Fasilitas Anak</h2>
          @if ($fasilanak->count() >= 1)
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
                        @foreach($fasilanak as $fasilanak)
                        <tr>
                          <th class="text-center">{{ $loop->iteration }}</th>
                            <td>{{ $fasilanak->name }}</td>
                            <td align="center">
                                <div class="btn-group">
                                    <hr>
                                    <a href="{{ route('efasilanak',$fasilanak->id) }}" class="btn btn-warning mr-2"><i class="bi bi-pencil-fill"></i></a>
                                    <hr>
                                    <a href="javascript:void(0)" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            document.getElementById('fasilanak-delete-form-{{$fasilanak->id}}').submit();">
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                    <form id="fasilanak-delete-form-{{$fasilanak->id}}" action="{{ route('dfasilanak',$fasilanak->id) }}" method="POST" style="display: none;">
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
              <a class="btn btn-success" href="{{ route('cfasilanak', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
            </div>
          </div>
              
          @else
              <p>Data Tidak Ditemukan</p>
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-success" href="{{ route('cfasilanak', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
                </div>
              </div>
          @endif
        </div>

        <div class="col-md-12 mt-3">
          <h2>Fasilitas Disabilitas</h2>
          @if ($fasildisabilitas->count() >= 1)
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
                        @foreach($fasildisabilitas as $fasildisabilitas)
                        <tr>
                          <th class="text-center">{{ $loop->iteration }}</th>
                            <td>{{ $fasildisabilitas->name }}</td>
                            <td align="center">
                                <div class="btn-group">
                                    <hr>
                                    <a href="{{ route('efasildisabilitas',$fasildisabilitas->id) }}" class="btn btn-warning mr-2"><i class="bi bi-pencil-fill"></i></a>
                                    <hr>
                                    <a href="javascript:void(0)" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            document.getElementById('fasildisabilitas-delete-form-{{$fasildisabilitas->id}}').submit();">
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                    <form id="fasildisabilitas-delete-form-{{$fasildisabilitas->id}}" action="{{ route('dfasildisabilitas',$fasildisabilitas->id) }}" method="POST" style="display: none;">
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
              <a class="btn btn-success" href="{{ route('cfasildisabilitas', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
            </div>
          </div>
              
          @else
              <p>Data Tidak Ditemukan</p>
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-success" href="{{ route('cfasildisabilitas', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
                </div>
              </div>
          @endif
        </div>

        <div class="col-md-12 mt-3">
          <h2>Kegiatan Masjid</h2>
          @if ($kegiatan->count() >= 1)
          <div class="box">
            <div class="box-body">
                <table id="category-table" class="table table-light table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nama Kegiatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kegiatan as $kegiatan)
                        <tr>
                          <th class="text-center">{{ $loop->iteration }}</th>
                            <td>{{ $kegiatan->name }}</td>
                            <td align="center">
                                <div class="btn-group">
                                    <hr>
                                    <a href="{{ route('ekegiatan',$kegiatan->id) }}" class="btn btn-warning mr-2"><i class="bi bi-pencil-fill"></i></a>
                                    <hr>
                                    <a href="javascript:void(0)" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            document.getElementById('kegiatan-delete-form-{{$kegiatan->id}}').submit();">
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                    <form id="kegiatan-delete-form-{{$kegiatan->id}}" action="{{ route('dkegiatan',$kegiatan->id) }}" method="POST" style="display: none;">
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
              <a class="btn btn-success" href="{{ route('ckegiatan', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
            </div>
          </div>
              
          @else
              <p>Data Tidak Ditemukan</p>
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-success" href="{{ route('ckegiatan', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
                </div>
              </div>
          @endif
        </div>

        <div class="col-md-12 mt-3">
          <h2>Galeri</h2>
          @if ($foto->count() >= 1)
          <div class="row">
            <div class="kotak">
              @foreach ($foto as $foto)
              <div class="gallery">
                  <img src="/storage/galeri/{{ $foto->galeri }}" alt="{{ $foto->galeri }}">
                    <a href="javascript:void(0)" class="btn btn-danger"
                       onclick="event.preventDefault();
                       document.getElementById('foto-delete-form-{{$foto->id}}').submit();">
                       <i class="bi bi-trash3"></i>
                  </div>
                  <form id="foto-delete-form-{{$foto->id}}" action="{{ route('dfoto',$foto->id) }}" method="POST" style="display: none;">
                      @csrf 
                  </form>
              </div>
              @endforeach
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 mt-5">
              <a class="btn btn-success" href="{{ route('cfoto', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
            </div>
          </div>
          @else
              <p>Data Tidak Ditemukan</p>
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-success" href="{{ route('cfoto', $masjid->id) }}"><i class="bi bi-plus-square"></i> Tambah Data</a>
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
