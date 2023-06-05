<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class strukturDesa extends Model
{
    use HasFactory;
    protected $table = 'struktur_desas';
    protected $primarykey = 'id';
    protected $fillable = [
        'id',
        'desa_id',
        'nama',
        'jabatan',
        'fotoProfil'
    ];
    public function desas(){
        return $this->belongsTo(desa::class, 'desa_id');
    }
    public function jabatan_desas(){
        return $this->belongsTo(jabatanDesa::class, 'jabatan');
    }
    public function setImageAttribute($value)
    {
        $this->attributes['fotoProfil'] = $value ? $value : null;
    }

}
