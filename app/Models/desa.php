<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class desa extends Model
{
    use HasFactory;
    protected $table = 'desas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama_desa',
        'luas_desa',
        'jumlah_penduduk',
        'tentang_desa'
    ];
    public function potensiDesa(){
        return $this->hasMany(potensiDesa::class);
    }
    public function strukturDesa(){
        return $this->hasMany(strukturDesa::class);
    }
}
