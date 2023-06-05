<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\jabatanDesa;

class jabatanDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        jabatanDesa::create([
            'namaJabatan' => 'Kepala Desa',
        
        ]);
        jabatanDesa::create([
            'namaJabatan' => 'Serketaris Desa',
        
        ]);
        jabatanDesa::create([
            'namaJabatan' => 'Bendahara Desa',
        
        ]);

    

        // DB::table('jabatan_desas')->insert([
     
        //     'namaJabatan' => 'Kepala Desa',
    
        // ],
        // [
        //     'namaJabatan' => 'Serketaris Desa',
            
        // ],
        // [
        //     'namaJabatan' => 'Bendahara Desa',
            
        // ]);
    }
}
