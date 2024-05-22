<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sertifikat extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'inspektor_id',
        'inspeksi_id',
        'kendaraan_id',
        'sertifikat_number',
        'valid_from_date',
        'valid_until_date',
        'issued_by',
        'verified',
    ];

    protected $casts = [

        'verified' => 'boolean',
    ];

    public function inspektor()
    {
        return $this->belongsTo(Inspektor::class);
    }


    public function inspeksi()
    {
        return $this->belongsTo(Inspeksi::class);
    }


    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
