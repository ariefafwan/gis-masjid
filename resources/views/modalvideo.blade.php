<!-- Modal -->
<div class="modal fade" id="galerivideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Galeri Video</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                @foreach ($video as $v)
                <div class="col-lg-3 col-md-4 col-6">
                    <video controls width="150px">
                        <source src="{{ asset('storage/galeri/video/' . $v->video ) }}" type="video/webm" class="img-fluid">
                    </video>
                </div>
                @endforeach
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i>&nbspClose</button>
        </div>
    </div>
    </div>
</div>