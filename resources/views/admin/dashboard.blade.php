@extends('admin.app')

@section('body')

    <div class="row my-4">
        <div class="col-xl-2 col-md-4 mb-4">
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
        </div>
        <div class="col-xl-2 col-md-4 mb-4">
            <a href="{{ route('createmasjid') }}">
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
    <div id="map"></div>
<script>
    
    let map = L.map('map').setView([4.3657447, 98.0743331], 14);
    
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    <?php foreach ($masjid as $key => $row) { ?>
        $.getJSON("storage/geojson/{{ $row->geojson }}", function(data) {
            geoLayer = L.geoJson(data, {
            style: function(feature) {
                return {
                    color: "yellow",
                }
            },
        }).addTo(map);

            geoLayer.eachLayer(function(layer) {
                layer.bindPopop("Aceh Tamiang");
            });
        });
    <?php } ?>
    
</script>
@endsection