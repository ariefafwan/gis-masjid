@extends('admin.app')

@section('body')

    <hr>
<section class="content">
    <div class="btn-group mb-3">
        <a href="{{ route('createmasjid') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> CREATE NEW</a>
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
                                <th class="text-center">Latitude</th>
                                <th class="text-center">Longitude</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($masjid as $index => $row)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->alamat }}</td>
                                <td>{{ $row->latitude }}</td>
                                <td>{{ $row->longitude }}</td>
                                <td align="center">
                                    <div class="btn-group">
                                        <hr>
                                        <a href="{{ route('editmasjid',$row->id) }}" class="btn btn-warning mr-2"><i class="bi bi-eye"></i></a>
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
                    <div class="d-flex justify-content-center">
                        {{ $masjid->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection