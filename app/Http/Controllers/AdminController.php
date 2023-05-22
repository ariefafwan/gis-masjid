<?php

namespace App\Http\Controllers;

use App\Models\Fasilanak;
use App\Models\Fasildisabili;
use App\Models\Fasilumum;
use App\Models\Foto;
use App\Models\Kegiatan;
use App\Models\Masjid;
use App\Models\Pimpinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function dashboard()
    {
        $page = "Dashboard";
        $dt1 = Masjid::get()->count();
        $masjid = Masjid::all();
        return view('admin.dashboard', compact('page', 'dt1', 'masjid'));
    }

    public function index()
    {
        $page = "Daftar Masjid";
        $masjid = Masjid::latest()->paginate(10);
        return view('admin.masjid.index', compact('page', 'masjid'));
    }

    //profil masjid
    public function createmasjid()
    {
        $page = "Tambah Masjid";
        $masjid = Masjid::latest()->paginate(10);
        return view('admin.masjid.create', compact('page', 'masjid'));
    }

    public function storemasjid(Request $request)
    {

        $dtUpload = new Masjid();
        $dtUpload->name = $request->name;
        $dtUpload->alamat = $request->alamat;
        $dtUpload->luasbangunan = $request->luasbangunan;
        $dtUpload->dayatampung = $request->dayatampung;
        $dtUpload->latitude = $request->latitude;
        $dtUpload->longitude = $request->longitude;
        $dtUpload->pembangunan = $request->pembangunan;
        $file = $request->file('geojson');
        if ($request->validate([
            'geojson' => 'required|file:geojson|max:5000'
        ])) {
            $filename = $file->getClientOriginalName();
            $file->storeAs('/storage/geojson/', $filename);
            $dtUpload->geojson = $filename;
        }
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Madjid Baru Berhasil ditambahkan');
        return redirect()->route('masjid');
    }

    public function editmasjid($id)
    {
        $masjid = Masjid::findOrFail($id);
        $page = "Edit Masjid $masjid->name";
        return view('admin.masjid.edit', compact('masjid', 'page'));
    }

    public function showmasjid($id)
    {
        $page = "Profile Masjid";
        $masjid = Masjid::findOrFail($id);
        $fasilumum = Fasilumum::where('masjid_id', $id)->get();
        $fasilanak = Fasilanak::where('masjid_id', $id)->get();
        $fasildisabilitas = Fasildisabili::where('masjid_id', $id)->get();
        $kegiatan = Kegiatan::where('masjid_id', $id)->get();
        $pimpinan = Pimpinan::where('masjid_id', $id)->get();
        $foto = Foto::where('masjid_id', $id)->get();
        return view(
            'admin.masjid.show',
            compact('page', 'masjid', 'fasilumum', 'fasilanak', 'fasildisabilitas', 'kegiatan', 'pimpinan', 'foto')
        );
    }

    public function masjid()
    {
        $masjid = Masjid::all();
        return json_encode($masjid);
        // dd($masjid);
    }

    public function updatemasjid(Request $request, $id)
    {

        $dtUpload = Masjid::findOrFail($id);
        $dtUpload->name = $request->name;
        $dtUpload->alamat = $request->alamat;
        $dtUpload->luasbangunan = $request->luasbangunan;
        $dtUpload->dayatampung = $request->dayatampung;
        $dtUpload->latitude = $request->latitude;
        $dtUpload->longitude = $request->longitude;
        $dtUpload->pembangunan = $request->pembangunan;
        $file = $request->file('geojson');
        if ($request->validate([
            'geojson' => 'required|file:geojson|max:5000'
        ])) {
            // menghapus gambar lama
            if ($request->oldImage) {
                Storage::delete('storage/geojson/' . $dtUpload->geojson);
            }
            // menyimpan gambar baru
            $filename = $file->getClientOriginalName();
            $file->storeAs('/storage/geojson/', $filename);
            $dtUpload->geojson = $filename;
        }
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Profil Masjid Berhasil Diedit');
        return redirect()->route('masjid');
    }

    public function destroymasjid($id)
    {
        $masjid = Masjid::findOrFail($id);
        Storage::delete('storage/geojson/' . $masjid->geojson);
        $masjid->delete();

        Alert::success('Informasi Pesan!', 'Masjid Berhasil dihapus!');
        return back();
    }

    //fasilanak
    public function fasilanak($id)
    {
        $masjid = Masjid::findOrFail($id);
        $page = "Tambah Fasilitas Ramah Anak Masjid $masjid->name";
        return view('admin.masjid.fasilanak.create', compact('page', 'masjid'));
    }

    public function storefasilanak(Request $request)
    {
        $masjid = $request->masjid_id;

        $dtUpload = new Fasilanak();
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->name = $request->name;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Fasilitas Ramah Anak Baru Berhasil ditambahkan');
        return redirect()->route('showmasjid', $masjid);
    }

    public function editfasilanak($id)
    {
        $fasilanak = Fasilanak::findOrFail($id);
        $page = "Tambah Fasilitas Ramah Anak Masjid";
        return view('admin.masjid.fasilanak.edit', compact('page', 'fasilanak'));
    }

    public function updatefasilanak(Request $request, $id)
    {
        $masjid = $request->masjid_id;

        $dtUpload = Fasilanak::findOrFail($id);
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->name = $request->name;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Fasilitas Ramah Anak Berhasil diupdate');
        return redirect()->route('showmasjid', $masjid);
    }

    public function destroyfasilanak($id)
    {
        $fasilanak = Fasilanak::findOrFail($id);
        $fasilanak->delete();

        Alert::success('Informasi Pesan!', 'Fasilitas Ramah Anak Berhasil dihapus!');
        return back();
    }

    //fasilumum
    public function fasilumum($id)
    {
        $masjid = Masjid::findOrFail($id);
        $page = "Tambah Fasilitas Umum Masjid $masjid->name";
        return view('admin.masjid.fasilumum.create', compact('page', 'masjid'));
    }

    public function storefasilumum(Request $request)
    {
        $masjid = $request->masjid_id;

        $dtUpload = new Fasilumum();
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->name = $request->name;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Fasilitas Umum Baru Berhasil ditambahkan');
        return redirect()->route('showmasjid', $masjid);
    }

    public function editfasilumum($id)
    {
        $fasilumum = Fasilumum::findOrFail($id);
        $page = "Tambah Fasilitas Umum Masjid";
        return view('admin.masjid.fasilumum.edit', compact('page', 'fasilumum'));
    }

    public function updatefasilumum(Request $request, $id)
    {
        $masjid = $request->masjid_id;

        $dtUpload = Fasilumum::findOrFail($id);
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->name = $request->name;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Fasilitas Umum Berhasil diupdate');
        return redirect()->route('showmasjid', $masjid);
    }

    public function destroyfasilumum($id)
    {
        $fasilumum = Fasilumum::findOrFail($id);
        $fasilumum->delete();

        Alert::success('Informasi Pesan!', 'Fasilitas Umum Berhasil dihapus!');
        return back();
    }

    //fasildisabilitas
    public function fasildisabilitas($id)
    {
        $masjid = Masjid::findOrFail($id);
        $page = "Tambah Fasilitas Disabilitas Masjid $masjid->name";
        return view('admin.masjid.fasildisabilitas.create', compact('page', 'masjid'));
    }

    public function storefasildisabilitas(Request $request)
    {
        $masjid = $request->masjid_id;

        $dtUpload = new Fasildisabili();
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->name = $request->name;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Fasilitas Disabilitas Baru Berhasil ditambahkan');
        return redirect()->route('showmasjid', $masjid);
    }

    public function editfasildisabilitas($id)
    {
        $fasildisabilitas = Fasildisabili::findOrFail($id);
        $page = "Tambah Fasilitas Disabilitas Masjid";
        return view('admin.masjid.fasildisabilitas.edit', compact('page', 'fasildisabilitas'));
    }

    public function updatefasildisabilitas(Request $request, $id)
    {
        $masjid = $request->masjid_id;

        $dtUpload = Fasildisabili::findOrFail($id);
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->name = $request->name;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Fasilitas Disabilitas Berhasil diupdate');
        return redirect()->route('showmasjid', $masjid);
    }

    public function destroyfasildisabilitas($id)
    {
        $fasildisabilitas = Fasildisabili::findOrFail($id);
        $fasildisabilitas->delete();

        Alert::success('Informasi Pesan!', 'Fasilitas Disabilitas Berhasil dihapus!');
        return back();
    }

    //kegiatan
    public function kegiatan($id)
    {
        $masjid = Masjid::findOrFail($id);
        $page = "Tambah Kegiatan Umum Masjid $masjid->name";
        return view('admin.masjid.kegiatan.create', compact('page', 'masjid'));
    }

    public function storekegiatan(Request $request)
    {
        $masjid = $request->masjid_id;

        $dtUpload = new Kegiatan();
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->name = $request->name;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Kegiatan Masjid Baru Berhasil ditambahkan');
        return redirect()->route('showmasjid', $masjid);
    }

    public function editkegiatan($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $page = "Tambah Kegiatan Umum Masjid";
        return view('admin.masjid.kegiatan.edit', compact('page', 'kegiatan'));
    }

    public function updatekegiatan(Request $request, $id)
    {
        $masjid = $request->masjid_id;

        $dtUpload = Kegiatan::findOrFail($id);
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->name = $request->name;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Kegiatan Masjid Berhasil diupdate');
        return redirect()->route('showmasjid', $masjid);
    }

    public function destroykegiatan($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        Alert::success('Informasi Pesan!', 'Kegiatan Berhasil dihapus!');
        return back();
    }

    //pimpinan
    public function pimpinan($id)
    {
        $masjid = Masjid::findOrFail($id);
        $page = "Tambah Pimpinan Masjid $masjid->name";
        return view('admin.masjid.pimpinan.create', compact('page', 'masjid'));
    }

    public function storepimpinan(Request $request)
    {
        $masjid = $request->masjid_id;

        $dtUpload = new Pimpinan();
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->pimpinan = $request->pimpinan;
        $dtUpload->jmlhpengurus = $request->jmlhpengurus;
        $dtUpload->imam = $request->imam;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Pimpinan Masjid Baru Berhasil ditambahkan');
        return redirect()->route('showmasjid', $masjid);
    }

    public function editpimpinan($id)
    {
        $pimpinan = Pimpinan::findOrFail($id);
        $page = "Tambah Pimpinan Masjid";
        return view('admin.masjid.pimpinan.edit', compact('page', 'pimpinan'));
    }

    public function updatepimpinan(Request $request, $id)
    {
        $masjid = $request->masjid_id;

        $dtUpload = Pimpinan::findOrFail($id);
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->pimpinan = $request->pimpinan;
        $dtUpload->jmlhpengurus = $request->jmlhpengurus;
        $dtUpload->imam = $request->imam;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Pimpinan Masjid Berhasil Diupdate');
        return redirect()->route('showmasjid', $masjid);
    }

    public function destroypimpinan($id)
    {
        $pimpinan = Pimpinan::findOrFail($id);
        $pimpinan->delete();

        Alert::success('Informasi Pesan!', 'Pimpinan Berhasil dihapus!');
        return back();
    }

    //foto
    public function foto($id)
    {
        $masjid = Masjid::findOrFail($id);
        $page = "Tambah Galeri Masjid $masjid->name";
        return view('admin.masjid.foto.create', compact('page', 'masjid'));
    }

    public function storefoto(Request $request)
    {
        $masjid = $request->masjid_id;
        $nm = $request->galeri;
        $namaFile = $nm->getClientOriginalName();

        $dtUpload = new Foto();
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->galeri = $namaFile;
        $dtUpload->save();

        $nm->move(public_path() . '/storage/galeri', $namaFile);
        Alert::success('Informasi Pesan!', 'Galeri Masjid Baru Berhasil ditambahkan');
        return redirect()->route('showmasjid', $masjid);
    }

    public function editfoto($id)
    {
        $foto = Foto::findOrFail($id);
        $page = "Edit Galeri Masjid";
        return view('admin.masjid.foto.edit', compact('page', 'foto'));
    }

    public function uploadfoto(Request $request, $id)
    {
        $masjid = $request->masjid_id;
        $nm = $request->galeri;
        $namaFile = $nm->getClientOriginalName();

        $dtUpload = Foto::findOrFail($id);
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->galeri = $namaFile;
        $dtUpload->save();

        $nm->move(public_path() . '/storage/galeri', $namaFile);
        Alert::success('Informasi Pesan!', 'Galeri Masjid Berhasil Diupdate');
        return redirect()->route('showmasjid', $masjid);
    }

    public function destroyfoto($id)
    {
        $foto = Foto::findOrFail($id);
        $foto->delete();

        Alert::success('Informasi Pesan!', 'Foto Berhasil dihapus!');
        return back();
    }
}
