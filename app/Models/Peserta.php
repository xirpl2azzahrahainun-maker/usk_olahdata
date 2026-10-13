<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
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

    public function skema()
    {
        return $this->belongsTo(Skema::class, 'skema_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
