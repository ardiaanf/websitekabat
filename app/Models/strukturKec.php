<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class strukturKec extends Model
{
    use HasFactory;
    const JABATAN_KEC = [
        'Camat',
        'Serketaris Camat',
        'Kasubag Perencanaan dan Keuangan',
        'Kasubag Umum dan Kepegawaian',
        'Seksi Perekonomian, Fisik, dan Sarana/Prasarana',
        'Seksi Kesejahteraan Sosial',
        'Seksi Trantib',
        'Seksi Pemerintahan' 
    ];
    protected $fillable = [
        'nama',
        'jabatan',
        'fotoProfil'
    ];
}
