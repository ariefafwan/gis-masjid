@extends('admin.app')

@section('body')
<section class="about-info-area section-gap">
    <div class="container" style="padding-top: 120px;">
      <div class="row">
  
        <div class="col-md-7" data-aos="fade-up" data-aos-delay="200">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong>Informasi Umum Masjid </strong></h4>
            </div>
            <div class="panel-body">
              <table class="table">
                <tr>
                  <!-- <th>Item</th> -->
                  <th>Detail</th>
                </tr>
                <tr>
                  <td>Nama Wisata</td>
                  <td>
                    <h5>{{ $masjid->name }}</h5>
                  </td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>
                    <h5>{{ $masjid->alamat }}</h5>
                  </td>
                </tr>
                <tr>
                  <td>Luas Bangunan</td>
                  <td>
                    <h5>{{ $masjid->luasbangunan }}</h5>
                  </td>
                </tr>
                <tr>
                  <td>Daya Tampung</td>
                  <td>
                    <h5>{{ $masjid->dayatampung }}</h5>
                    <input class="latitude" type="hidden" id="latitude" value="{{ $masjid->latitude }}">
                    <input class="longitude" type="hidden" id="longitude" value="{{ $masjid->longitude }}">
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
  
        <div class="col-md-5" data-aos="zoom-in">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong>Lokasi</strong></h4>
            </div>
            <div class="panel-body">
              <div id="map"></div>
            </div>
          </div>
        </div>
</section>
<script>
    let latitude = document.getElementById("latitude").value;
    let longitude = document.getElementById("longitude").value;

    let map = L.map('map').setView([latitude, longitude], 13);
    
    // L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}',{
    // maxZoom: 20,
    // subdomains:['mt0','mt1','mt2','mt3']
    // }).addTo(map);

    // var map = L.map('map').setView([37.8, -96], 4);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // L.geoJson(statesData).addTo(map);
    
    // function getColor(d) {
    // return d > 1000 ? '#800026' :
    //        d > 500  ? '#BD0026' :
    //        d > 200  ? '#E31A1C' :
    //        d > 100  ? '#FC4E2A' :
    //        d > 50   ? '#FD8D3C' :
    //        d > 20   ? '#FEB24C' :
    //        d > 10   ? '#FED976' :
    //                   '#FFEDA0';
    // }

    // function style(feature) {
    // return {
    //     fillColor: getColor(feature.properties.density),
    //     weight: 2,
    //     opacity: 1,
    //     color: 'white',
    //     dashArray: '3',
    //     fillOpacity: 0.7
    // };
    // }

    // L.geoJson(statesData, {style: style}).addTo(map);

    var marker = L.icon({
    iconUrl: '/asset/marker/mosquee.png',

    iconSize:     [38, 45], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    L.marker([latitude, longitude], {icon: marker}).addTo(map);
</script>
@endsection
