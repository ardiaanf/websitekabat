<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unggahFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'unggah_file',
        'deskripsi',
    ];
}
