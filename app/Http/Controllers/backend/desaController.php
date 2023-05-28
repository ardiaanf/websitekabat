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
  
}
