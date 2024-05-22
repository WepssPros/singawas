<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AjukanSertifikat extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'nomor_inspeksi',
        'nopol_terdaftar',
        'nomor_registrasi_kendaraan',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
