<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Peserta;

class Skema extends Model
{
    protected $fillable = [
        'kode_skema',
        'nama_skema',
        'tipe_skema',
        'deskripsi'
    
    ];

    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'skema_id');
    }
}