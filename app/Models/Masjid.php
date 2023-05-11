<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function fasilanak()
    {
        return $this->hasMany(Fasilanak::class);
    }

    public function fasilumum()
    {
        return $this->hasMany(Fasilumum::class);
    }

    public function fasildisabili()
    {
        return $this->hasMany(Fasildisabili::class);
    }

    public function foto()
    {
        return $this->hasMany(Foto::class);
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function pimpinan()
    {
        return $this->hasOne(Pimpinan::class);
    }

    public function getPembangunanNameAttribute()
    {
        $pembangunan = $this->pembangunan;
        if ($pembangunan == "#781804") {
            return '1-20';
        } elseif ($pembangunan == "#CB2602") {
            return '21-40';
        } elseif ($pembangunan == "#DE3611") {
            return '41-60';
        } elseif ($pembangunan == "#E35131") {
            return '61-80';
        }
            return '81-100';

    }

}
