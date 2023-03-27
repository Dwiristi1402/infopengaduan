<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduans';
    protected $fillable = [
        // 'id',
        'tgl_pengaduan',
        'nik',
        'isi_laporan',
        'status',
    ];
}