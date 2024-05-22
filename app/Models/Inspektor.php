<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Inspektor extends Model
{
    use HasFactory, SoftDeletes;



    protected $fillable = [
        'user_id',
        'foto_inspektor',
        'nama_inspektor',
        'no_hp',
        'posisi_jabatan',
    ];

    protected $casts = [
        'user_id' => 'integer',
    ];

    /**
     * Get the URL for foto inspektor.
     *
     * @return string|null
     */
    public function getFotoInspektorUrlAttribute()
    {
        if ($this->foto_inspektor) {
            return Storage::url($this->foto_inspektor);
        }

        return null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
