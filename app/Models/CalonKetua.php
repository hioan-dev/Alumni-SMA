<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonKetua extends Model
{
    use HasFactory;

    protected $table = 'calon_ketuas';

    protected $fillable = [
        'nama_lengkap',
        'foto_ktp',
        'pas_foto',
        'nik',
        'alamat',
        'no_ijazah',
        'ijazah',
        'pekerjaan',
        'visi_misi',
        'rencana_program',
        'user_id',
    ];
}
