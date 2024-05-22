<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kendaraan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'users_id',
        'nomor_registrasi',
        'nopol',
        'brand_kendaraan',
        'type',
        'tahun_pembuatan',
        'nama_owner',
        'alamat_owner',
        'nomorhp_owner',
        'verified',
        'tahun_pembuatan' => 'date',
    ];

    protected $casts = [

        'verified' => 'boolean',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
