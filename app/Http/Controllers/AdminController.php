<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Fasilanak;
use App\Models\Fasildisabili;
use App\Models\Fasilumum;
use App\Models\Foto;
use App\Models\Kegiatan;
use App\Models\Masjid;
use App\Models\Pimpinan;
use App\Models\Sejarah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function dashboard()
    {
        $page = "Dashboard";
        $dt1 = Masjid::get()->count();
        return view('admin.dashboard', compact('page', 'dt1'));
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
        $dtUpload->luastanah = $request->luastanah;
        $dtUpload->statustanah = $request->statustanah;
        $dtUpload->luastbangunan = $request->luastbangunan;
        $dtUpload->dayatampung = $request->dayatampung;
        $dtUpload->latitude = $request->latitude;
        $dtUpload->longitude = $request->longitude;        
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Madjid Baru Berhasil ditambahkan');
        return redirect()->route('masjid');
    }

    public function editmasjid($id)
    {
        $page = "Edit Madjid";
        $masjid = Masjid::findOrFail($id);
        return view('admin.masjid.edit', compact('page', 'masjid'));
    }

    public function updatemasjid(Request $request, $id)
    {
        $dtUpload = Masjid::findOrFail($id);
        $dtUpload->name = $request->name;
        $dtUpload->alamat = $request->alamat;
        $dtUpload->luastanah = $request->luastanah;
        $dtUpload->statustanah = $request->statustanah;
        $dtUpload->luastbangunan = $request->luastbangunan;
        $dtUpload->dayatampung = $request->dayatampung;
        $dtUpload->latitude = $request->latitude;
        $dtUpload->longitude = $request->longitude;    
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Profil Masjid Berhasil Diedit');
        return redirect()->route('masjid');
    }

    public function destroymasjid($id)
    {
        $masjid = Masjid::findOrFail($id);
        $masjid->delete();
        
        Alert::success('Informasi Pesan!', 'Masjid Berhasil dihapus!');
        return back();
    }

    //fasilanak
    public function fasilanak()
    {
        $page = "Tambah Fasilitas Ramah Anak Masjid";
        $fasilanak = Fasilanak::latest()->paginate(10);
        return view('admin.masjid.fasilanak.create', compact('fasilanak', 'page'));
    }

    public function storefasilanak(Request $request)
    {
        $dtUpload = new Fasilanak();
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->name = $request->name;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Fasilitas Ramah Anak Baru Berhasil ditambahkan');
        return redirect()->route('masjid');
    }

    //fasilumum
    public function fasilumum()
    {
        $page = "Tambah Fasilitas Umum Masjid";
        $fasilumum = Fasilumum::latest()->paginate(10);
        return view('admin.masjid.fasilumum.create', compact('fasilumum', 'page'));
    }

    public function storefasilumum(Request $request)
    {
        $dtUpload = new Fasilumum();
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->name = $request->name;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Fasilitas Umum Baru Berhasil ditambahkan');
        return redirect()->route('masjid');
    }

    //fasildisabilitas
    public function fasildisabilitas()
    {
        $page = "Tambah Fasilitas Disabilitas Masjid";
        $fasildisabilitas = Fasildisabili::latest()->paginate(10);
        return view('admin.masjid.fasildisabilitas.create', compact('fasildisabilitas', 'page'));
    }

    public function storefasildisabilitas(Request $request)
    {
        $dtUpload = new Fasildisabili();
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->name = $request->name;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Fasilitas Disabilitas Baru Berhasil ditambahkan');
        return redirect()->route('masjid');
    }

    //kegiatan
    public function kegiatan()
    {
        $page = "Tambah Kegiatan Umum Masjid";
        $kegiatan = Kegiatan::latest()->paginate(10);
        return view('admin.masjid.kegiatan.create', compact('kegiatan', 'page'));
    }

    public function storekegiatan(Request $request)
    {
        $dtUpload = new Kegiatan();
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->name = $request->name;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Kegiatan Masjid Baru Berhasil ditambahkan');
        return redirect()->route('masjid');
    }

    //dokumen
    public function dokumen()
    {
        $page = "Tambah Dokumen Umum Masjid";
        $dokumen = Dokumen::latest()->paginate(10);
        return view('admin.masjid.dokumen.create', compact('dokumen', 'page'));
    }

    public function storedokumen(Request $request)
    {
        $dtUpload = new Dokumen();
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->name = $request->name;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Dokumen Masjid Baru Berhasil ditambahkan');
        return redirect()->route('masjid');
    }

    //sejarah
    public function sejarah()
    {
        $page = "Tambah Sejarah Umum Masjid";
        $sejarah = Sejarah::latest()->paginate(10);
        return view('admin.masjid.sejarah.create', compact('sejarah', 'page'));
    }

    public function storesejarah(Request $request)
    {
        $dtUpload = new Sejarah();
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->sejarah = $request->sejarah;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Sejarah Masjid Baru Berhasil ditambahkan');
        return redirect()->route('masjid');
    }

    //pimpinan
    public function pimpinan()
    {
        $page = "Tambah Pimpinan Masjid";
        $pimpinan = Sejarah::latest()->paginate(10);
        return view('admin.masjid.pimpinan.create', compact('pimpinan', 'page'));
    }

    public function storepimpinan(Request $request)
    {
        $dtUpload = new Pimpinan();
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->pimpinan = $request->pimpinan;
        $dtUpload->jmlhpengurus = $request->jmlhpengurus;
        $dtUpload->imam = $request->imam;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Pimpinan Masjid Baru Berhasil ditambahkan');
        return redirect()->route('masjid');
    }

    //foto
    public function foto()
    {
        $page = "Tambah Galeri Masjid";
        $foto = Foto::latest()->paginate(10);
        return view('admin.masjid.foto.create', compact('foto', 'page'));
    }

    public function storefoto(Request $request)
    {
        $dtUpload = new Foto();
        $dtUpload->masjid_id = $request->masjid_id;
        $dtUpload->galeri = $request->galeri;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Galeri Masjid Baru Berhasil ditambahkan');
        return redirect()->route('masjid');
    }
}
