<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vidio extends Model
{
    use HasFactory;

    protected $table = 'vidios';

    protected $fillable = [
        'title',
        'slug',
        'url',
        'image',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
