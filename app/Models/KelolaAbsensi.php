<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelolaAbsensi extends Model
{
    use HasFactory;

    protected $table = 'kelola_absensi';

    protected $fillable = [
        'tanggal',
        'waktu_masuk',
        'waktu_keluar',
    ];
}
