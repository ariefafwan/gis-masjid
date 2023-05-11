@extends('admin.app')

@section('body')
<hr>
<section class="content">
<!-- Begin Page Content -->
<div class="container-fluid">    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Pimpinan Masjid</h6>
        </div>
        <div class="card-body">
            <!-- Main content -->
            <form class="form-horizontal style-form" style="margin-top: 10px;" action="{{ route('spimpinan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="pimpinan">Nama Pimpinan</label>
                    <input type="text" name="pimpinan" class="form-control" id="pimpinan" required>
                    <input type="hidden" name="masjid_id" value="{{ $masjid->id }}" class="form-control" id="masjid_id" required>
                </div>

                <div class="form-group">
                    <label for="jmlhpengurus">Jumlah Pengurus</label>
                    <input type="number" name="jmlhpengurus" class="form-control" id="jmlhpengurus" required>
                </div>
                <div class="form-group">
                    <label for="imam">Nama Imam</label>
                    <input type="text" name="imam" class="form-control" id="imam" required>
                </div>
                <div class="box-footer mt-2">
                    <a href="{{ route('editmasjid', $masjid->id) }}" class="btn btn-danger btn-flat">
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