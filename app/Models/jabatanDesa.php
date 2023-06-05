<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatanDesa extends Model
{
    use HasFactory;
    protected $table = 'jabatan_desas';
    protected $primaryKey = 'id';  
    protected $fillable = [
        'id',
       'namaJabatan'
    ];

    public function strukturDesa(){
        return $this->hasMany(strukturDesa::class);
    }
}
