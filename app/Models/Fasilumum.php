<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilumum extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['masjid'];

    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    }
}
