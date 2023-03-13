<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumni extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'alumnis';

    protected $fillable = [
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenkel',
        'ukuran_baju',
        'alamat',
        'tahun_lulus',
        'jurusan',
        'teman_sebangku',
        'pendidikan_terakhir',
        'kelas',
        'no_hp',
        'email',
        'universitas',
        'foto',
        'pekerjaan',
    ];

    protected $hidden = [];
}
