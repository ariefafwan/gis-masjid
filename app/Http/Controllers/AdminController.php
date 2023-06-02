<?php

namespace App\Http\Controllers;

use App\Models\Fasilumum;
use App\Models\Foto;
use App\Models\Masjid;
use App\Models\Sejarah;
use App\Models\Video;
use Carbon\Carbon;
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
        return view('admin.masjid.create', compact('page'));
    }

    public function storemasjid(Request $request)
    {
        $year = Carbon::parse($request->berdirinya)->year;

        $dtUpload = new Masjid();
        $dtUpload->name = $request->name;
        $dtUpload->statusmasjid = $request->statusmasjid;
        $dtUpload->namapengurus = $request->namapengurus;
        $dtUpload->alamat = $request->alamat;
        $dtUpload->berdirinya = $year;
        $dtUpload->luasbangunan = $request->luasbangunan;
        $dtUpload->dayatampung = $request->dayatampung;
        $dtUpload->statustanah = $request->statustanah;
        $dtUpload->luastanah = $request->luastanah;
        $dtUpload->dana = $request->dana;
        $dtUpload->latitude = $request->latitude;
        $dtUpload->longitude = $request->longitude;
        $dtUpload->pembangunan = $request->pembangunan;
        $file = $request->file('geojson');
        if ($request->validate([
            'geojson' => 'required|file:geojson|max:5000'
        ])) {
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/geojson/', $filename);
            $dtUpload->geojson = $filename;
        }
        $dtUpload->save();

        // dd($year);
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
        $sejarah = Sejarah::where('masjid_id', $id)->get();
        $video = Video::where('masjid_id', $id)->get();
        $fasilumum = Fasilumum::where('masjid_id', $id)->get();
        $foto = Foto::where('masjid_id', $id)->get();
        return view(
            'admin.masjid.show',
            compact('page', 'masjid', 'fasilumum', 'foto', 'video', 'sejarah')
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

        $year = Carbon::parse($request->berdirinya)->year;

        $dtUpload = Masjid::findOrFail($id);
        $dtUpload->name = $request->name;
        $dtUpload->statusmasjid = $request->statusmasjid;
        $dtUpload->namapengurus = $request->namapengurus;
        $dtUpload->alamat = $request->alamat;
        $dtUpload->berdirinya = $year;
        $dtUpload->luasbangunan = $request->luasbangunan;
        $dtUpload->dayatampung = $request->dayatampung;
        $dtUpload->statustanah = $request->statustanah;
        $dtUpload->luastanah = $request->luastanah;
        $dtUpload->dana = $request->dana;
        $dtUpload->latitude = $request->latitude;
        $dtUpload->longitude = $request->longitude;
        $dtUpload->pembangunan = $request->pembangunan;
        $file = $request->file('geojson');
        if ($request->validate([
            'geojson' => 'required|file:geojson|max:5000'
        ])) {
            // menghapus gambar lama
            if ($request->oldImage) {
                Storage::delete('public/geojson/' . $dtUpload->geojson);
            }
            // menyimpan gambar baru
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/geojson/', $filename);
            $dtUpload->geojson = $filename;
        }
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Profil Masjid Berhasil Diedit');
        return redirect()->route('masjid');
    }

    public function destroymasjid($id)
    {
        $masjid = Masjid::findOrFail($id);
        Storage::delete('public/geojson/' . $masjid->geojson);
        $masjid->delete();

        Alert::success('Informasi Pesan!', 'Masjid Berhasil dihapus!');
        return back();
    }

    //fasilumum
    public function fasilumum($id)
    {
        $masjid = Masjid::findOrFail($id);
        $page = "Tambah Fasilitas Umum $masjid->name";
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
        $page = "Edit Fasilitas Umum Masjid";
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

    public function sejarah($id)
    {
        $masjid = Masjid::findOrFail($id);
        $page = "Tambah Sejarah $masjid->name";
        return view('admin.masjid.sejarah.create', compact('page', 'masjid'));
    }

    public function storesejarah(Request $request)
    {
        $masjid = $request->masjid_id;

        $dtUpload = new Sejarah();
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->sejarah = $request->sejarah;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Sejarah Masjid Berhasil ditambahkan');
        return redirect()->route('showmasjid', $masjid);
    }

    public function editsejarah($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        $page = "Edit Sejarah Masjid ";
        return view('admin.masjid.sejarah.edit', compact('page', 'sejarah'));
    }

    public function updatesejarah(Request $request, $id)
    {
        $masjid = $request->masjid_id;

        $dtUpload = Sejarah::findOrFail($id);
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->sejarah = $request->sejarah;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Sejarah Masjid Berhasil diupdate');
        return redirect()->route('showmasjid', $masjid);
    }

    public function destroysejarah($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        $sejarah->delete();

        Alert::success('Informasi Pesan!', 'Sejarah Masjid Berhasil dihapus!');
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

        $dtUpload = new Foto();
        $dtUpload->masjid_id = $request->masjid_id;
        $file = $request->file('galeri');
        if ($request->validate([
            'galeri' => 'required|mimes:png,jpg,jpeg|max:10000'
        ])) {
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/galeri/foto/', $filename);
            $dtUpload->galeri = $filename;
        }
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Galeri Masjid Baru Berhasil ditambahkan');
        return redirect()->route('showmasjid', $masjid);
    }

    // public function editfoto($id)
    // {
    //     $foto = Foto::findOrFail($id);
    //     $page = "Edit Galeri Masjid";
    //     return view('admin.masjid.foto.edit', compact('page', 'foto'));
    // }

    // public function updatevideo(Request $request, $id)
    // {
    //     $masjid = $request->masjid_id;

    //     $dtUpload = Foto::findOrFail($id);
    //     $dtUpload->masjid_id = $request->masjid_id;
    //     $file = $request->file('gambar');
    //     if ($request->validate([
    //         'gambar' => 'required|mimes:png,jpg,jpeg|max:2048'
    //     ])) {
    //         // menghapus gambar lama
    //         if ($request->oldImage) {
    //             Storage::delete('public/galeri/foto' . $dtUpload->gambar);
    //         }
    //         // menyimpan gambar baru
    //         $filename = $file->getClientOriginalName();
    //         $file->storeAs('public/galeri/foto', $filename);
    //         $dtUpload->gambar = $filename;
    //     }
    //     // $dtUpload->gambar = $request->gambar;
    //     $dtUpload->save();

    //     Alert::success('Informasi Pesan!', 'Galeri Masjid Berhasil Diupdate');
    //     return redirect()->route('showmasjid', $masjid);
    // }

    public function destroyfoto($id)
    {
        $foto = Foto::findOrFail($id);
        Storage::delete('public/galeri/foto/' . $foto->galeri);
        $foto->delete();

        Alert::success('Informasi Pesan!', 'Foto Berhasil dihapus!');
        return back();
    }

    //video
    public function video($id)
    {
        $masjid = Masjid::findOrFail($id);
        $page = "Tambah Galeri Video $masjid->name";
        return view('admin.masjid.video.create', compact('page', 'masjid'));
    }

    public function storevideo(Request $request)
    {
        $masjid = $request->masjid_id;

        $dtUpload = new Video();
        $dtUpload->masjid_id = $request->masjid_id;
        $file = $request->file('video');
        if ($request->validate([
            'video'  => 'required|mimes:mp4,mov,ogg,qt | max:20000'
        ])) {
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/galeri/video/', $filename);
            $dtUpload->video = $filename;
        }
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Galeri Video Masjid Berhasil ditambahkan');
        return redirect()->route('showmasjid', $masjid);
    }

    // public function editvideo($id)
    // {
    //     $video = Video::findOrFail($id);
    //     $page = "Edit Galeri Video Masjid";
    //     return view('admin.masjid.video.edit', compact('page', 'video'));
    // }

    // public function updatevideo(Request $request, $id)
    // {
    //     $masjid = $request->masjid_id;

    //     $dtUpload = Video::findOrFail($id);
    //     $dtUpload->masjid_id = $request->masjid_id;
    //     if ($request->validate([
    //         'video' => 'required|mimes:png,jpg,jpeg|max:2048'
    //     ])) {
    //         // menghapus gambar lama
    //         if ($request->oldImage) {
    //             Storage::delete('public/galeri/video' . $dtUpload->video);
    //         }
    //         // menyimpan gambar baru
    //         $filename = $file->getClientOriginalName();
    //         $file->storeAs('public/galeri/video', $filename);
    //         $dtUpload->gambar = $filename;
    //     }
    //     // $dtUpload->gambar = $request->gambar;
    //     $dtUpload->save();

    //     Alert::success('Informasi Pesan!', 'Video Masjid Berhasil Diupdate');
    //     return redirect()->route('showmasjid', $masjid);
    // }

    public function destroyvideo($id)
    {
        $video = Video::findOrFail($id);
        Storage::delete('public/galeri/video/' . $video->video);
        $video->delete();

        Alert::success('Informasi Pesan!', 'Video Berhasil dihapus!');
        return back();
    }
}
