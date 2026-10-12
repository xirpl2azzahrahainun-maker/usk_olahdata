<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Skema;
class peserta extends Model
{

use HasFactory;

    protected $table = 'pesertas';
    protected $fillable = ['nama', 'nik', 'email', 'telepon', 'skema_id'];
    public function skema()
    {
        return $this->belongsTo(Skema::class, 'skema_id');
    }
}
