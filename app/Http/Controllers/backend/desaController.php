<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\desa;
use Illuminate\Support\Facades\Crypt;

class desaController extends Controller
{
    public function index(){

     // $data['dessa']=desa ::all();
      //return view('admin.desa.index', $data);

      $dessa = desa::all();
      return view('admin.desa.index', compact('dessa'));
    }
    public function desaAdd(){
      // 
   }
   public function store(Request $request)
   {
      $dessa = new desa(); 
      $dessa->nama_desa=$request->input('nama_desa');
      $dessa->save();
      return redirect()->route('index.view')->with('success', 'Banner berhasil ditambahkan');

   }
   public function show($id){

   }

   public function edit(Request $request, $id){
      $dessa = desa::findOrFail($id);
        return view('admin.desa.edit', compact('dessa'));

   }
   public function update(Request $request, $id)
   {
        $validateData= $request->validate([
              'nama_desa'=> 'required',   
    
          ]);
        
          $dessa=desa::find($id);
          $dessa->nama_desa=$request->nama_desa;
          $dessa->save();
      
          return redirect()->route('index.view')->with('info','Tambah Bahan berhasil');
   }

   public function destroy($id)
   {
     
       desa::findOrFail($id)->delete();
       return redirect()->route('index.view')->with('error', 'Data berita berhasil dihapus');
}
}
