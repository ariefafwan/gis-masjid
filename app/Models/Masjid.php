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

        // $pembangunan = $this->pembangunan;
        // if ($pembangunan == "1-20") {
        //     return '#8B0000';
        // } elseif ($pembangunan == "21-40") {
        //     return '#FF4500';
        // } elseif ($pembangunan == "41-60") {
        //     return '#FFFF00';
        // } elseif ($pembangunan == "61-80") {
        //     return '#00FF7F';
        // }
        // return '#006400';
    }

    public function getFileGeoAttribute()
    {
        return "/storage/geojson/" . $this->geojson;
    }
}
