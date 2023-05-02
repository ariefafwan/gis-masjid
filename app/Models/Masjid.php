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

    public function sejarah()
    {
        return $this->hasMany(Sejarah::class);
    }

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class);
    }

    public function pimpinan()
    {
        return $this->hasMany(Pimpinan::class);
    }

}
