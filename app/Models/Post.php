<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'thumbnail',
        'judul',
        'konten',
        'status',
        'tanggal_publikasi',
    ];
}
