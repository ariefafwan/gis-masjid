<?php

namespace App\Http\Controllers;

use App\Models\Masjid;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $page = "Daftar Masjid";
        $masjid = Masjid::all();
        return view('admin.masjid.index', compact('page', 'masjid'));
    }
}
