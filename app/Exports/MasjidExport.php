<?php

namespace App\Exports;

use App\Models\Masjid;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MasjidExport implements FromView
{
    public function view(): View
    {
        return view('admin.masjid.export.masjid', [
            'masjid' => Masjid::all()
        ]);
    }
}
