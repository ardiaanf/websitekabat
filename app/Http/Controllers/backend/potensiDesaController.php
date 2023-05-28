<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\desa;
use App\Models\potensiDesa;

class potensiDesaController extends Controller
{
    public function potensiDesaView (){
        // $data = potensiDesa::all();
    // return view('admin.potensiDesa.potensiDesaView',/*compact('data')*/);
    $data['allDataPotensi']=potensiDesa::with('desas')->get();
        return view('admin.potensiDesa.potensiDesaView', $data);
     }
     public function potensiAdd()
     {
        //  return view('admin.potensiDesa.potensiAdd');
        $desa=desa::all();
        return view('admin.potensiDesa.potensiAdd',compact('desa'));
     }
     public function store(Request $request)
     {
         $validateData= $request->validate([
                
            'desa_id'=>'required',
            'potensi_desa'=>'required',
            'gambar_potensi'=>'required'
            ]);
            
          
            $data = new potensiDesa();
            $data->desa_id=$request->desa_id;
            $data->potensi_desa=$request->potensi_desa;

            //gambar
            $fileName = time().'.'.$request->gambar_potensi->extension();
            $request->file('gambar_potensi')->storeAs('public/potensidesa', $fileName);
             
            $data->gambar_potensi = $fileName;
           
 
            $data->save();
        
            
            return redirect()->route('potensi.view')->with('info','Tambah Alat berhasil');
     }

    }

