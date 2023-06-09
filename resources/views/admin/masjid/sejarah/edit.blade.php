@extends('admin.app')

@section('body')
<hr>
<section class="content">
<!-- Begin Page Content -->
<div class="container-fluid">    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Sejarah {{ $sejarah->name }}</h6>
        </div>
        <div class="card-body">
            <!-- Main content -->
            <form class="form-horizontal style-form" style="margin-top: 10px;" action="{{ route('usejarah', $sejarah->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Kegiatan</label>
                    <textarea class="summernote" id="summernote" name="sejarah">{!! $sejarah->sejarah !!}</textarea>
                    <input type="hidden" name="masjid_id" value="{{ $sejarah->masjid_id }}" class="form-control" id="masjid_id" required>
                </div>
                <div class="box-footer mt-2">
                    <a href="{{ route('showmasjid', $sejarah->masjid_id) }}" class="btn btn-danger btn-flat">
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