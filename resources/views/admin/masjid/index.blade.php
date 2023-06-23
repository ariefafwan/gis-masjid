@extends('admin.app')

@section('body')

<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="btn-group mb-3">
                <a href="{{ route('createmasjid') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> CREATE NEW</a>
            </div>
        </div>
        <div class="col-md-4">
            <form action="{{ url()->current() }}" method="get">
            <div class="input-group">
                <input class="form-control" type="search" name="keyword" value="{{ request('keyword') }}" placeholder="Search Data"> 
                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i> Search!</button>
            </div>
            </form>									
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="category-table" class="table table-light table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Skala Pembangunan (%)</th>
                                <th class="text-center">Latitude</th>
                                <th class="text-center">Longitude</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($masjid as $index => $row)
                            <tr>
                                <th align="center" scope="row">{{ $index + 1 }}</th>
                                <td align="center">{{ $row->name }}</td>
                                <td align="center">{{ $row->alamat }}</td>
                                <td align="center">{{ $row->PembangunanName }} %</td>
                                <td align="center">{{ $row->latitude }}</td>
                                <td align="center">{{ $row->longitude }}</td>
                                <td align="center">
                                    <div class="btn-group">
                                        <hr>
                                        <a href="{{ route('showmasjid',$row->id) }}" class="btn btn-warning mr-2"><i class="bi bi-eye"></i></a>
                                        <hr>
                                        <a href="javascript:void(0)" class="btn btn-danger"
                                            onclick="event.preventDefault();
                                                document.getElementById('masjid-delete-form-{{$row->id}}').submit();">
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                        <form id="masjid-delete-form-{{$row->id}}" action="{{ route('destroymasjid',$row->id) }}" method="POST" style="display: none;">
                                            @csrf 
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12 text-center">
                        <div class="text-center mb-3">
                            Halaman: {{ $masjid->currentPage() }}
                            <br>
                            Jumlah Data: {{ $masjid->total() }}
                            <br>
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $masjid->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection