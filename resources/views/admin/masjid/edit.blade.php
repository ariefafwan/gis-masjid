@extends('admin.app')

@section('body')
<hr>
<section class="content">
<!-- Begin Page Content -->
<div class="container-fluid">    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Masjid</h6>
        </div>
        <div class="card-body">
            <!-- Main content -->
            <form class="form-horizontal style-form" style="margin-top: 10px;" action="{{ route('updatemasjid', $masjid->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Masjid</label>
                    <input type="text" name="name" class="form-control" value="{{ $masjid->name }}" id="name" required>
                </div>
                <div class="form-group">
                    <label for="berdirinya">Tahun Berdirinya Masjid</label>
                    <select class="form-select" id="berdirinya" aria-label="Default select example" name="berdirinya" required>>
                        @for ($year= $tahunnow; $year >= 1980; $year--)
                        <option value="{{ $year }}" @if ($masjid->berdirinya == $year) selected @endif>{{ $year }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <label for="namapengurus">Nama Pengurus Masjid</label>
                    <input type="text" name="namapengurus" class="form-control" value="{{ $masjid->namapengurus }}" id="namapengurus" required>
                </div>
                <div class="form-group">
                    <label for="statusmasjid">Status Masjid</label>
                    <select class="form-select" id="statusmasjid" aria-label="Default select example" name="statusmasjid" required>
                        <option value="Aktif" @if ($masjid->statusmasjid == 'Aktif') selected @endif>Aktif</option>
                        <option value="Dalam Pembangunan" @if ($masjid->statusmasjid == 'Dalam Pembangunan') selected @endif>Dalam Pembangunan</option>
                        <option value="Tahap Renovasi" @if ($masjid->statusmasjid == 'Tahap Renovasi') selected @endif>Tahap Renovasi</option>
                    </select>
                </div>
                <div id="json">

                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Masjid</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="2" required>{{ $masjid->alamat }}</textarea>
                </div>
                <div class="form-group">
                    <label for="luastanah">Luas Tanas (M<sup>2</sup>)</label>
                    <input type="number" name="luastanah" class="form-control" value="{{ $masjid->luastanah }}" id="luastanah" required>
                </div>
                <div class="form-group">
                    <label for="luasbangunan">Luas Bangunan (M<sup>2</sup>)</label>
                    <input type="number" name="luasbangunan" value="{{ $masjid->luasbangunan }}" class="form-control" id="luasbangunan" required>
                </div>
                <div class="form-group">
                    <label for="statustanah">Status Tanah</label>
                    <select class="form-select" id="statustanah" aria-label="Default select example" name="statustanah" required>                        
                        <option value="Hibah" @if ($masjid->statustanah == 'Hibah') selected @endif>Hibah</option>
                        <option value="Wakaf" @if ($masjid->statustanah == 'Wakaf') selected @endif>Wakaf</option>
                        <option value="Beli" @if ($masjid->statustanah == 'Beli') selected @endif>Beli</option>
                        <option value="Pinjam Pakai" @if ($masjid->statustanah == 'Pinjam Pakai') selected @endif>Pinjam Pakai</option>
                        <option value="Girik" @if ($masjid->statustanah == 'Girik') selected @endif>Girik</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dayatampung">Daya Tampung Jamaah (Jiwa)</label>
                    <input type="number" name="dayatampung" value="{{ $masjid->dayatampung }}" class="form-control" id="dayatampung" required>
                </div>
                <div class="form-group">
                    <label for="dana">Dana Yang Masih Di Butuhkan (Rp)</label>
                    <input type="text" value="{{ $masjid->dana }}" name="dana" class="form-control" id="dana">
                </div>
                <div class="form-group">
                    <label for="pembangunan">Skala Pembangunan (%)</label>
                    <select class="form-select" id="pembangunan" aria-label="Default select example" name="pembangunan" required>
                        <option class="text-white" style="background-color: #8B0000" value="#8B0000" @if ($masjid->PembangunanName == '1-20') selected @endif>1-20</option>
                        <option class="text-white" style="background-color: #FF4500" value="#FF4500" @if ($masjid->PembangunanName == '21-40') selected @endif>21-40</option>
                        <option style="background-color: #FFFF00" value="#FFFF00" @if ($masjid->PembangunanName == '41-60') selected @endif>41-60</option>
                        <option style="background-color: #00FF7F" value="#00FF7F" @if ($masjid->PembangunanName == '61-80') selected @endif>61-80</option>
                        <option class="text-white" style="background-color: #006400" value="#006400" @if ($masjid->PembangunanName == '81-100') selected @endif>81-100</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" name="latitude" class="form-control" value="{{ $masjid->latitude }}" id="latitude" required>
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" name="longitude" class="form-control" value="{{ $masjid->longitude }}" id="longitude" required>
                </div>
                <div class="form-group">
                    <label for="geojson">File GeoJSON</label>
                    <input type="file" id="geojson" name="geojson" class="form-control align-item center" required>
                    <input type="hidden" value="{{ $masjid->geojson }}" name="oldgeo" id="oldgeo">
                </div>
                <div class="box-footer mt-2">
                    <a href="{{ route('masjid') }}" class="btn btn-danger btn-flat">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-success btn-flat">
                        Edit
                    </button>
                </div>
                <div style="margin-top: 20px;"></div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</section>
@endsection
@section('js')
{{-- <script>
    $.getJSON("{{ $masjid->FileGeo }}", function(data) {
                
                var json = [];
                json.push(data);

                // Get a reference to our file input
                const fileInput = document.querySelector('input[type="file"]');

                const oldGeo = document.getElementById("oldgeo").value;
                // Create a new File object
                const myFile = new File([json], oldGeo, {
                    type: 'text/plain',
                });
                console.log(json);

                // Now let's create a DataTransfer to get a FileList
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(myFile);
                fileInput.files = dataTransfer.files;
            });
</script> --}}
@endsection