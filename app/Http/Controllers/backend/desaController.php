<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\desa;
use Illuminate\Support\Facades\Crypt;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
   public function show($id){
    $desaa=desa::all();
    $showData=desa::findOrFail($id);
    return view('admin.desa.show',compact('showData','desaa'));
}

   public function store(Request $request)
   {
    $rules=[
      'nama_desa' => 'required',
      'tentang_desa' => 'required',
     ];

       $messages =[
         'nama_desa.required' => '*Nama desa harus diisi',
         'tentang_desa.required' => '*Dekripsi harus diisi',  
     ];

     $this->validate($request,$rules, $messages);
    $a = (float) $request->input('luas_desa');
    $b = (float) $request->input('jumlah_penduduk');

      // Deskripsi
      $tentang_desa = $request ['tentang_desa'];
        
      // Handle gambar summernote
      preg_match_all('/<img[^>]+src="([^"]+)"/', $tentang_desa, $matches);
      $uploadedImages = $matches[1];
  
      foreach ($uploadedImages as $uploadedImage) {
          if (strpos($uploadedImage, 'data:image') === 0) {
             
              $imageData = substr($uploadedImage, strpos($uploadedImage, ',') + 1);
              $decodedImage = base64_decode($imageData);
              $imageName = time() . '_' . Str::random(8) . '.png';
              Storage::disk('public')->put('desa/konten/' . $imageName, $decodedImage);
  
            
              $imageUrl = Storage::url('desa/konten/' . $imageName);
              $tentang_desa = str_replace($uploadedImage, $imageUrl, $tentang_desa);
          }
      }

      $dessa = new desa(); 
      $dessa->nama_desa=$request->input('nama_desa');
      $dessa->luas_desa = $a;
      $dessa->jumlah_penduduk = $b;
      $dessa->tentang_desa = $tentang_desa;
     
      $dessa->save();
      return redirect()->route('desa.view')->with('success', 'Banner berhasil ditambahkan');

   }
  

   public function edit(Request $request, $id){
       $editData = desa::findOrFail($id);
        return view('admin.desa.edit', compact('editData'));

   }
   public function update(Request $request, $id)
   {
    $editData=desa::find($id);
        $validateData= $request->validate([
              'nama_desa'=> 'required', 
              'luas_desa' => 'nullable',
              'jumlah_penduduk' => 'nullable',
              'tentang_desa' => 'required',
    
          ]);
          $tentang_desa = $request ['tentang_desa'];
            
          // Handle gambar summernote
          preg_match_all('/<img[^>]+src="([^"]+)"/', $tentang_desa, $matches);
          $uploadedImages = $matches[1];
          $uploadedImageUrls = [];
      
          foreach ($uploadedImages as $uploadedImage) {
              if (strpos($uploadedImage, 'data:image') === 0) {
                 
                  $imageData = substr($uploadedImage, strpos($uploadedImage, ',') + 1);
                  $decodedImage = base64_decode($imageData);
                  $imageName = time() . '_' . Str::random(8) . '.png';
                  Storage::disk('public')->put('desa/konten/' . $imageName, $decodedImage);
                  $imageUrl = Storage::url('desa/konten/' . $imageName);
                  $tentang_desa = str_replace($uploadedImage, $imageUrl, $tentang_desa);
                  $uploadedImageUrls[] = $imageUrl;
  
                 
                 
              }
          }
          // Hapus gambar-gambar lama dalam konten Summernote
          preg_match_all('/<img[^>]+src="([^"]+)"/', $editData->tentang_desa, $oldImages);
          $oldUploadedImages = $oldImages[1];
      
          foreach ($oldUploadedImages as $oldUploadedImage) {
              if (strpos($oldUploadedImage, 'storage/desa/konten') !== false && !in_array($oldUploadedImage, $uploadedImages)) {
                  $oldImagePath = str_replace(Storage::url(''), '', $oldUploadedImage);
                  Storage::disk('public')->delete($oldImagePath);
              }
          }
        
         
          $editData->update([
            'nama_desa' => $request->input('nama_desa'),
            'luas_desa' => $request->input('luas_desa'),
            'jumlah_penduduk' => $request->input('jumlah_penduduk'),
            'tentang_desa' => $tentang_desa,
        ]);
      
      
          return redirect()->route('desa.view')->with('success','Tambah Bahan berhasil');
   }
   
   public function delete($id)
   {
    $desaa=desa::find($id);

    $tentang_desa = $desaa->tentang_desa;
  
    // Handle gambar summernote
    preg_match_all('/<img[^>]+src="([^"]+)"/', $tentang_desa, $matches);
    $uploadedImages = $matches[1];

    foreach ($uploadedImages as $uploadedImage) {
        if (strpos($uploadedImage, 'storage/desa/konten') !== false) {
            $imagePath = str_replace(Storage::url(''), '', $uploadedImage);
            Storage::disk('public')->delete($imagePath);
        }
    }

    // Hapus data berita
    $desaa->delete();
       return  redirect()->route('desa.view')->with('success', 'data berhasil di hapus');

   }


}
