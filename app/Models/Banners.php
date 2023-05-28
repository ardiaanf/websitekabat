<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_banner';
    protected $fillable = ['gambar_banner', 'keterangan'];
    protected $tabel = 'Banners';

    public function get_banner()
    {
        $query = DB::table('Banners')
            ->orderBy('id_banner', 'DESC')
            ->limit(3)
            ->get();
        return $query;
    }
}
