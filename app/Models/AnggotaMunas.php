<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaMunas extends Model
{
    use HasFactory;
    
    protected $table = 'anggotamunass';

    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'approved',
    ];
}
