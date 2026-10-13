<?php

namespace App\Models;
use App\Models\Skema;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'nik',
        'email',
        'telepon',
        'skema_id',
    ];

    // Relasi ke tabel Skema
    public function skema()
    {
        return $this->belongsTo(Skema::class, 'skema_id');
    }

    // Relasi ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

