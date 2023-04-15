<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaTerkait extends Model
{
    use HasFactory;

    protected $table = 'berita_terkaits';

    protected $fillable = [
        'title',
        'slug',
        'banner',
        'url',
    ];
}
