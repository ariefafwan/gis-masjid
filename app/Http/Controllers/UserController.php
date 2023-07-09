<?php

namespace App\Http\Controllers;

use App\Models\Fasilumum;
use App\Models\Foto;
use App\Models\Masjid;
use App\Models\Sejarah;
use App\Models\Video;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function welcome(Request $request)
    {
        $page = "SIG MASJID";
        // $masjid = Masjid::all();
        $pagination  = 10;
        $peta = Masjid::all();
        $masjid = Masjid::when($request->keyword, function ($query) use ($request) {

            $query
                ->where('name', 'like', "%{$request->keyword}%");
        })->orderBy('created_at', 'desc')->paginate($pagination);

        $masjid->appends($request->only('keyword'));

        return view('welcome', compact('page', 'peta'), [
            'masjid' => $masjid,

        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
        // return view('welcome', compact('masjid', 'page'));
    }

    public function detailmasjid($id)
    {
        $page = "Detail Masjid";
        $masjid = Masjid::findOrFail($id);
        $sejarah = Sejarah::where('masjid_id', $id)->get();
        $video = Video::where('masjid_id', $id)->get();
        $fasilumum = Fasilumum::where('masjid_id', $id)->get();
        $foto = Foto::where('masjid_id', $id)->get();
        return view('detailmasjid', compact('page', 'masjid', 'sejarah', 'video', 'fasilumum', 'foto'));
    }
}
