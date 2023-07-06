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
@endsection
@section('js')
<script>

    let map = L.map('map').setView([4.2656737, 97.9327067], 11);
    
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    /*Legend specific*/
    var legend = L.control({ position: "bottomright" });

    legend.onAdd = function(map) {
    var div = L.DomUtil.create("div", "legend");
    div.innerHTML += "<h4>Skala Pembangunan</h4>";
    div.innerHTML += '<i style="background: #8B0000"></i><span>1-20</span><br>';
    div.innerHTML += '<i style="background: #FF4500"></i><span>21-40</span><br>';
    div.innerHTML += '<i style="background: #FFFF00"></i><span>41-60</span><br>';
    div.innerHTML += '<i style="background: #00FF7F"></i><span>61-80</span><br>';
    div.innerHTML += '<i style="background: #006400"></i><span>81-100</span><br>';

    return div;
    };

    legend.addTo(map);

    // <option class="text-white" style="background-color: #8B0000" value="#8B0000">1-20</option>
    //                     <option class="text-white" style="background-color: #FF4500" value="#FF4500">21-40</option>
    //                     <option style="background-color: #FFFF00" value="#FFFF00">41-60</option>
    //                     <option style="background-color: #00FF7F" value="#00FF7F">61-80</option>
    //                     <option class="text-white" style="background-color: #006400" value="#006400">81-100</option>

    <?php foreach ($masjid as $key => $row) { ?>
        $.getJSON("storage/geojson/{{ $row->geojson }}", function(data) {
            geoLayer = L.geoJson(data, {
            style: function(feature) {
                return {
                    "color": "{{ $row->pembangunan }}",
                    "weight": 1,
                    "fillOpacity": 0.8,
                    // fillColor: '{{ $row->pembangunan }}',
                }
            },
        }).addTo(map);
            geoLayer.eachLayer(function(layer) {
                layer.bindPopup("{{ $row->name }}");
            });
        });
    <?php } ?>
    
    
</script>
@endsection