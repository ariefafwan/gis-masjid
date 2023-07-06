@extends('admin.app')

@section('body')

<hr>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                alert()->error({{ $error }},'Lorem Lorem Lorem');
            @endforeach
        </ul>
    </div>
@endif

<section class="content">
<!-- Begin Page Content -->
<div class="container-fluid">    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
        </div>
        <div class="card-body">
            <!-- Main content -->
            <form class="form-horizontal style-form" style="margin-top: 10px;" action="{{ route('storemasjid') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Masjid</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group">
                    <label for="berdirinya">Tahun Berdirinya Masjid</label>
                    <select class="form-select" id="berdirinya" aria-label="Default select example" name="berdirinya" required>>
                        <option selected>-- Pilih Tahun --</option>
                        @for ($year= $tahunnow; $year >= 1980; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <label for="namapengurus">Nama Pengurus Masjid</label>
                    <input type="text" name="namapengurus" class="form-control" id="namapengurus" required>
                </div>
                <div class="form-group">
                    <label for="statusmasjid">Status Masjid</label>
                    <select class="form-select" id="statusmasjid" aria-label="Default select example" name="statusmasjid" required>
                        <option selected>-- Pilih Status Masjid --</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Dalam Pembangunan">Dalam Pembangunan</option>
                        <option value="Tahap Renovasi">Tahap Renovasi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Masjid</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="2" required></textarea>
                </div>
                <div class="form-group">
                    <label for="luastanah">Luas Tanas (M<sup>2</sup>)</label>
                    <input type="number" name="luastanah" class="form-control" id="luastanah" required>
                </div>
                <div class="form-group">
                    <label for="luasbangunan">Luas Bangunan (M<sup>2</sup>)</label>
                    <input type="number" name="luasbangunan" class="form-control" id="luasbangunan" required>
                </div>
                <div class="form-group">
                    <label for="statustanah">Status Tanah</label>
                    <select class="form-select" id="statustanah" aria-label="Default select example" name="statustanah" required>
                        <option selected>-- Pilih Status Tanah --</option>
                        <option value="Hibah">Hibah</option>
                        <option value="Wakaf">Wakaf</option>
                        <option value="Beli">Beli</option>
                        <option value="Pinjam Pakai">Pinjam Pakai</option>
                        <option value="Girik">Girik</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dayatampung">Daya Tampung Jamaah (Jiwa)</label>
                    <input type="number" name="dayatampung" class="form-control" id="dayatampung" required>
                </div>
                <div class="form-group">
                    <label for="dana">Dana Yang Masih Di Butuhkan (Rp)</label>
                    <input type="text" value="Tidak Ada" name="dana" class="form-control" id="dana">
                </div>
                <div class="form-group">
                    <label for="pembangunan">Skala Pembangunan (%)</label>
                    <select class="form-select" id="pembangunan" aria-label="Default select example" name="pembangunan" required>
                        <option selected>-- Pilih Skala Pembangunan --</option>
                        <option class="text-white" style="background-color: #8B0000" value="#8B0000">1-20</option>
                        <option class="text-white" style="background-color: #FF4500" value="#FF4500">21-40</option>
                        <option style="background-color: #FFFF00" value="#FFFF00">41-60</option>
                        <option style="background-color: #00FF7F" value="#00FF7F">61-80</option>
                        <option class="text-white" style="background-color: #006400" value="#006400">81-100</option>
                    </select>
                </div>
                {{-- <div class="form-group">
                    <label for="sejarah">Sejarah</label>
                    <textarea class="summernote" id="summernote" name="sejarah"></textarea>
                </div> --}}
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" name="latitude" class="form-control" id="latitude" required>
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" name="longitude" class="form-control" id="longitude" required>
                </div>
                <div class="form-group">
                    <label for="geojson">File GeoJSON</label>
                    <input type="file" id="geojson" name="geojson" class="form-control align-item center" required>
                </div>
                <div class="box-footer mt-2">
                    <a href="{{ route('masjid') }}" class="btn btn-danger btn-flat">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary btn-flat">
                        Tambah
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