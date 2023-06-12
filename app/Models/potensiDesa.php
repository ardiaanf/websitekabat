<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class potensiDesa extends Model
{
    use HasFactory;
    protected $table = 'potensi_desas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'desa_id',
        'content',
        'gambar'
    ];
    public function desas(){
        return $this->belongsTo(desa::class, 'desa_id');
    }
}
