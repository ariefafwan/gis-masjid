<?php

namespace App\Http\Controllers;

use App\Models\Masjid;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function welcome()
    {
        $page = "SIG MASJID";
        $masjid = Masjid::all();
        return view('welcome', compact('masjid', 'page'));
    }
}
