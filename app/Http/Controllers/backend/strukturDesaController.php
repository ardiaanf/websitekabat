<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\desa;
use App\Models\jabatanDesa;
use App\Models\strukturDesa;

class strukturDesaController extends Controller
{
   public function index (){
      // $data = potensiDesa::all();
  // return view('admin.potensiDesa.potensiDesaView',/*compact('data')*/);
  $data['allDataStruktur']=strukturDesa::with('desas','jabatan_desas' ,)->get();
      return view('admin.strukturDesa.index', $data);
   }
   public function add()
   {
      //  return view('admin.potensiDesa.potensiAdd');
      $desa=desa::all();
      $jabatan=jabatanDesa::all();
      return view('admin.strukturDesa.add',compact('desa','jabatan'));
   }
   public function store(Request $request)
     {
         $validateData= $request->validate([
                
            'desa_id'=>'required',
            'nama'=>'required',
            'jabatan'=>'required',
            'fotoProfil'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            
          
            $data = new strukturDesa();
            $data->desa_id=$request->desa_id;
            $data->nama=$request->nama;
            $data->jabatan=$request->jabatan;

            //gambar

            if ($request->hasFile('fotoProfil')) {
               $fotoProfil = $request->file('fotoProfil');
   
               // Generate a unique file name
               $fileName = uniqid() . '.' . $fotoProfil->getClientOriginalExtension();
   
               // Store the image in the storage directory
               $path = $fotoProfil->storeAs('public/strukturDesa', $fileName);

               $data->fotoProfil = $fileName;
   
               // Perform further processing or save the path to the database
               // For example:
               // $imageModel = new Image();
               // $imageModel->file_path = $path;
               // $imageModel->save();


   
             
           } else {
               // Handle the case when no image is uploaded

               $data['fotoProfil'] = null;
              // return 'No image file uploaded.';
           }

         //    if ($request->hasFile('fotoProfil')) {
         //       // Upload gambar jika ada file yang diunggah
         //       $image = $request->file('fotoProfil');
         //       $path = $image->store('public/strukturDesa'); // Simpan gambar ke direktori public/images
   
               
         //   } else {
         //       // Tangani ketika tidak ada file yang diunggah
         //       $path = null; // Atur path menjadi null atau sesuai kebutuhan Anda
         //   }


            
         //  $fileName = time().'.'.$request->fotoProfil->extension();
         //    if ($request->file('fotoProfil')->storeAs('public/strukturDesa', $fileName)){
         //        $data->fotoProfil = $fileName;
         //    }else{
         //       $data['fotoProfil'] = null;
         //    }
             
         //    // $data->fotoProfil = $fileName;



         //   if ($request->hasFile('fotoProfil')) {
         //          $fileName = time().'.'.$request->fotoProfil->extension();
         //    $fotoProfil = $request->file('fotoProfil')->storeAs('public/strukturDesa', $fileName);
               
         // //       // Handle image upload
         // //       $imagePath = $fotoProfil->store('public/strukturDesa');
               
         // //       // Save the image path or filename to the database column
         //      $data['fotoProfil'] = $fileName;
         //    } else {
         // //       // No image uploaded, set the image column to null
         //      $data['fotoProfil'] = null;
         // //   }
           
         //    }
            
            $data->save();
        
            
            return redirect()->route('indexDesa.view')->with('info','Tambah Alat berhasil');
     }

}
