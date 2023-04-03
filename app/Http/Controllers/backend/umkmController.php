<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Umkms;
use Illuminate\Http\Request;
use Illuminate\Facades\Storage;
use Intervention\Image\Facades\Image;

class umkmController extends Controller
{
    public function umkmView(){

        $data['allDataUmkm']=Umkms ::all();
       return view('admin.umkm.umkm_view', $data);
     }
     public function umkmAdd()
     {
         return view('admin.umkm.umkm_add');
     }

    public function storeUmkm(Request $request)
    {
      $rules=[
        'judul' => 'required',
         'gambar' => 'required|max:1000|mimes:jpg,jpeg,png',
         'deskripsi' => 'required|min:20',
        ];


          $messages =[
            'judul.required' => '*Judul harus diisi',
            'gambar.required' => '*Gambar harus diisi',
            'deskripsi.required' => '*Deskripsi harus diisi',
        ];

        $this->validate($request,$rules, $messages);

        $data = new Umkms();


        //judul

        $data->judul=$request->input('judul');



     //gambar

     $fileName = time().'.'.$request->gambar->extension();
        $request->file('gambar')->storeAs('public/umkm', $fileName);

        $data->gambar = $fileName;

     // deskripsi
        $data->deskripsi= $request->input('deskripsi');

        $data->save();
        return redirect()->route('umkm.view')->with('info','Tambah Alat berhasil');

    }
  }















