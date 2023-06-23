<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Masjid</th>
        <th>Nama Pengurus</th>
        <th>Tahun Berdirinya</th>
        <th>Status Masjid </th>
        <th>Alamat </th>
        <th>Luas Bangunan </th>
        <th>Daya Tampung </th>
        <th>Status Tanah </th>
        <th>Luas Tanah </th>
        <th>Dana Yang Diperlukan </th>
        <th>Skala Pembangunan </th>
        <th>Luas Bangunan </th>
        <th>Latitude </th>
        <th>Longitude </th>
    </tr>
    </thead>
    <tbody>
    @foreach($masjid as $index => $m)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $m->name }}</td>
            <td>{{ $m->namapengurus }}</td>
            <td>{{ $m->berdirinya }}</td>
            <td>{{ $m->statusmasjid }}</td>
            <td>{{ $m->alamat }}</td>
            <td>{{ $m->luasbangunan }} M<sup>2</sup></td>
            <td>{{ $m->dayatampung }} Jiwa</td>
            <td>{{ $m->statustanah }}</td>
            <td>{{ $m->luastanah }} M<sup>2</sup></td>
            <td>{{ $m->dana }}</td>
            <td>{{ $m->PembangunanName }} %</td>
            <td>{{ $m->luasbangunan }} M<sup>2</sup></td>
            <td>{{ $m->latitude }}</td>
            <td>{{ $m->longitude }}</td>
        </tr>
    @endforeach
    </tbody>
</table>