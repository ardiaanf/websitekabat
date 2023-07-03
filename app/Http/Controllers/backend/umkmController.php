<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Umkms;
use Illuminate\Http\Request;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;

class umkmController extends Controller
{
    public function index(){

        $data['allDataUmkm']=Umkms ::all();
       return view('admin.umkm.umkm_view', $data);
     }
     public function create()
     {
         return view('admin.umkm.add');
     }
     public function show($id){
        $umkm=Umkms::all();
        $showData=Umkms::findOrFail($id);
        return view('admin.umkm.show',compact('showData','umkm'));
        
    }

    public function store(Request $request)
    {
        $rules=[
             'judul' => 'required',
             'gambar' => 'required|max:1000|mimes:jpg,jpeg,png',
             'konten' => 'required|min:20',
            ];

              $messages =[
                'judul.required' => '*Nama Umkm harus diisi',
                'gambar.required' => '*Gambar harus diisi',
                'konten.required' => '*Deskripsi harus diisi',
            ];

            $this->validate($request,$rules, $messages);
           

            //gambar
            $fileName = time().'.'.$request->gambar->extension();
            $request->file('gambar')->storeAs('public/umkm/gambar', $fileName);
           

            // content
               $konten = $request ['konten'];
        
               // Handle gambar summernote
               preg_match_all('/<img[^>]+src="([^"]+)"/', $konten, $matches);
               $uploadedImages = $matches[1];
           
               foreach ($uploadedImages as $uploadedImage) {
                   if (strpos($uploadedImage, 'data:image') === 0) {
                      
                       $imageData = substr($uploadedImage, strpos($uploadedImage, ',') + 1);
                       $decodedImage = base64_decode($imageData);
                       $imageName = time() . '_' . Str::random(8) . '.png';
                       Storage::disk('public')->put('umkm/konten/' . $imageName, $decodedImage);
           
                     
                       $imageUrl = Storage::url('umkm/konten/' . $imageName);
                       $konten = str_replace($uploadedImage, $imageUrl, $konten);
                   }
               }

            $data = new Umkms();
            $data->judul=$request->judul;
            $data->gambar = $fileName;
            $data->konten = $konten;
            $data->save();
            return redirect()->route('umkm.view')->with('success','Tambah data berhasil');
    }

    
    public function edit(Request $request, $id)
    { 
        $editData=Umkms::findOrFail($id);
        return view('admin.umkm.edit',compact('editData'));
    }
    public function update(Request $request, $id)
        {
            $editData = Umkms::find($id);
            if ($request->hasFile('gambar')) {
                $fileCheck = 'nullable|max:1000|mimes:jpg,jpeg,png';
            } else {
                $fileCheck = 'max:1000|mimes:jpg,jpeg,png';
            }
            $this->validate($request, [
                'judul'  => 'required',
                'gambar' => 'max:1000|mimes:jpg,jpeg,png',
                'konten' => 'required|min:10'
            ]);
    
            if ($request->hasFile('gambar')) {
                if (\File::exists('storage/umkm/gambar'.$editData->gambar)) {
                    \File::delete('storage/umkm/gambar'.$editData->gambar);
                }
                $fileName = time().'.'.$request->gambar->extension();
                $request->file('gambar')->storeAs('public/umkm/gambar', $fileName);
           }
    
           if ($request->hasFile('gambar')) {
                $checkFileName = $fileName;
               
           } else {
           
            $checkFileName = $editData->gambar;
           }
    
            // content
            $konten = $request ['konten'];
            
            // Handle gambar summernote
            preg_match_all('/<img[^>]+src="([^"]+)"/', $konten, $matches);
            $uploadedImages = $matches[1];
            $uploadedImageUrls = [];
        
            foreach ($uploadedImages as $uploadedImage) {
                if (strpos($uploadedImage, 'data:image') === 0) {
                   
                    $imageData = substr($uploadedImage, strpos($uploadedImage, ',') + 1);
                    $decodedImage = base64_decode($imageData);
                    $imageName = time() . '_' . Str::random(8) . '.png';
                    Storage::disk('public')->put('umkm/konten/' . $imageName, $decodedImage);
                    $imageUrl = Storage::url('umkm/konten/' . $imageName);
                    $konten = str_replace($uploadedImage, $imageUrl, $konten);
                    $uploadedImageUrls[] = $imageUrl;
    
                   
                   
                }
            }
            // Hapus gambar-gambar lama dalam konten Summernote
            preg_match_all('/<img[^>]+src="([^"]+)"/', $editData->konten, $oldImages);
            $oldUploadedImages = $oldImages[1];
        
            foreach ($oldUploadedImages as $oldUploadedImage) {
                if (strpos($oldUploadedImage, 'storage/berita/konten') !== false && !in_array($oldUploadedImage, $uploadedImages)) {
                    $oldImagePath = str_replace(Storage::url(''), '', $oldUploadedImage);
                    Storage::disk('public')->delete($oldImagePath);
                }
            }
            
            $editData->update([
            $editData->judul=$request->input('judul'),
            'gambar' => $checkFileName,
            'konten' => $konten,
        ]);
  return redirect()->route('umkm.view')->with('success', 'data berhasil di update');                
  }
  public function delete(Request $request, $id)
  {
      $umkm = Umkms::findOrFail($id);
      
      // Hapus gambar utama
      if ($umkm->gambar) {
          Storage::disk('public')->delete('umkm/gambar/' . $umkm->gambar);
      }
  
      // content
      $konten = $umkm->konten;
  
      // Handle gambar summernote
      preg_match_all('/<img[^>]+src="([^"]+)"/', $konten, $matches);
      $uploadedImages = $matches[1];
  
      foreach ($uploadedImages as $uploadedImage) {
          if (strpos($uploadedImage, 'storage/umkm/konten') !== false) {
              $imagePath = str_replace(Storage::url(''), '', $uploadedImage);
              Storage::disk('public')->delete($imagePath);
          }
      }
  
      // Hapus data berita
      $umkm->delete();
  
      return redirect()->route('umkm.view')->with('success', 'Data berita berhasil dihapus');
  }
  }
















