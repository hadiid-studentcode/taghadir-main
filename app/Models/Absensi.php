<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    protected $fillable = [
        'guru_id',
        'date',
        'waktu_masuk',
        'waktu_keluar',
        'status',
        'poin'
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
