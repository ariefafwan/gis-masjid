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
                    <input type="date" name="berdirinya" class="form-control" id="berdirinya" required>
                </div>
                <div class="form-group">
                    <label for="namapengurus">Nama Pengurus Masjid</label>
                    <input type="text" name="namapengurus" class="form-control" value="{{ $masjid->namapengurus }}" id="namapengurus" required>
                </div>
                <div class="form-group">
                    <label for="statusmasjid">Status Masjid</label>
                    <select class="form-select" id="statusmasjid" aria-label="Default select example" name="statusmasjid" required>
                        <option selected value="{{ $masjid->statustanah }}">{{ $masjid->statustanah }}</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Dalam Pembangunan">Dalam Pembangunan</option>
                        <option value="Tahap Renovasi">Tahap Renovasi</option>
                    </select>
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
                        <option selected value="{{ $masjid->statustanah }}">{{ $masjid->statustanah }}</option>
                        <option value="Hibah">Hibah</option>
                        <option value="Wakaf">Wakaf</option>
                        <option value="Beli">Beli</option>
                        <option value="Pinjam Pakai">Pinjam Pakai</option>
                        <option value="Girik">Girik</option>
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
                        <option selected value="{{ $masjid->pembangunan }}">{{ $masjid->PembangunanName }}</option>
                        <option value="#781804">1-20</option>
                        <option value="#CB2602">21-40</option>
                        <option value="#DE3611">41-60</option>
                        <option value="#E35131">61-80</option>
                        <option value="#EE6548">81-100</option>
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