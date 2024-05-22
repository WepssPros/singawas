<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Inspeksi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'inspeksis';

    protected $fillable = [
        'kendaraan_id',
        'nomor_inspeksi',
        'tanggal_inspeksi',
        'hasil_inspeksi',
        'bukti_foto1',
        'bukti_foto2',
        'bukti_foto3',
        'verified',
    ];

    protected $casts = [

        'verified' => 'boolean',
    ];

    public function getBuktiFoto1UrlAttribute()
    {
        if ($this->bukti_foto1) {
            return Storage::url($this->bukti_foto1);
        }

        return null;
    }

    public function getBuktiFoto2UrlAttribute()
    {
        if ($this->bukti_foto2) {
            return Storage::url($this->bukti_foto2);
        }

        return null;
    }

    public function getBuktiFoto3UrlAttribute()
    {
        if ($this->bukti_foto3) {
            return Storage::url($this->bukti_foto3);
        }

        return null;
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
