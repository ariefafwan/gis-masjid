@extends('partials.app')

@section('welcome')
        
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">Selamat Datang</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Sistem Informasi Geografis Masjid Aceh Tamiang</h2>
                        <a class="btn btn-primary" href="#about">Detail</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="title">Peta Lokasi Masjid</h1>
                        <div class="row align-items-center">
                            <div class="mb-4" id="map"></div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <h1 id="datamasjid">Data Masjid</h1>
                        <p>Aplikasi pemetaan geografis Masjid di Kabupaten Aceh Tamiang, Masjid Yang Terdata :</p>
                        <div class="box">
                            <div class="box-body">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-center">
                                            <form action="{{ url()->current() }}" method="get">
                                                <div class="input-group">
                                                    <input class="form-control" type="search" name="keyword" value="{{ request('keyword') }}" placeholder="Search Data"> 
                                                    <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i> Search!</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <table id="category-table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%" class="text-dark text-center">#</th>
                                            <th style="width: 30%" class="text-dark text-center">Name</th>
                                            <th class="text-dark text-center">Alamat</th>
                                            <th style="widht: 10%" class="text-dark text-center">Skala Pembangunan</th>
                                            <th style="widht: 5%" class="text-dark text-center">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($masjid as $index => $row)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->alamat }}</td>
                                            <td>{{ $row->PembangunanName }}</td>
                                            <td>
                                                <a href="{{ route('masjid.detail', $row->id) }}" class="btn btn-warning">
                                                    <i class="bi bi-eye"></i>
                                                </a>
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
            </div>
        </section>
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