@extends('admin.app')

@section('body')

    <div class="row my-4">
        <div class="col-xl-2 col-md-4 mb-4">
            <a href="#">
                <div class="card border-left shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Masjid</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dt1 }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-building-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-2 col-md-4 mb-4">
            <a href="#">
                <div class="card border-left shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Tambah Masjid</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-plus-square"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-2 col-md-4 mb-4">
            <a href="{{ route('masjid') }}"> 
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Kelola Masjid</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-building-gear"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>
    </div>

@endsection