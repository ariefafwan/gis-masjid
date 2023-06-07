<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function fasilumum()
    {
        return $this->hasMany(Fasilumum::class);
    }

    public function foto()
    {
        return $this->hasMany(Foto::class);
    }

    public function video()
    {
        return $this->hasMany(Video::class);
    }

    public function sejarah()
    {
        return $this->hasOne(Sejarah::class);
    }

    public function getPembangunanNameAttribute()
    {
        $pembangunan = $this->pembangunan;
        if ($pembangunan == "#8B0000") {
            return '1-20';
        } elseif ($pembangunan == "#FF4500") {
            return '21-40';
        } elseif ($pembangunan == "#FFFF00") {
            return '41-60';
        } elseif ($pembangunan == "#00FF7F") {
            return '61-80';
        }
        return '81-100';
    }
}
