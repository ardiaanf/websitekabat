<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pengumuman;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class pengumumanController extends Controller
{
    public function index (){
        $peng = pengumuman::all();
        return view('admin.pengumuman.index', compact('peng'));
    }
    public function store(Request $request){
    $rules=[
        'judul' => 'required',
        'content' => 'required|min:10',
       ];
         $messages =[
           'judul.required' => '*Judul harus diisi',
           'content.required' => '*Deskripsi harus diisi',  
       ];
       $this->validate($request,$rules, $messages);

        // content
        $konten = $request ['content'];
        
        // Handle gambar summernote
        preg_match_all('/<img[^>]+src="([^"]+)"/', $konten, $matches);
        $uploadedImages = $matches[1];
    
        foreach ($uploadedImages as $uploadedImage) {
            if (strpos($uploadedImage, 'data:image') === 0) {
               
                $imageData = substr($uploadedImage, strpos($uploadedImage, ',') + 1);
                $decodedImage = base64_decode($imageData);
                $imageName = time() . '_' . Str::random(8) . '.png';
                Storage::disk('public')->put('pengumuman/konten/' . $imageName, $decodedImage);
    
              
                $imageUrl = Storage::url('pengumuman/konten/' . $imageName);
                $konten = str_replace($uploadedImage, $imageUrl, $konten);
            }
        }

     $data = new pengumuman();
     $data->judul=$request->judul;
     $data->content = $konten;
     $data->save();
     return redirect()->route('pengumuman.view')->with('success','Tambah data berhasil');
   }
   public function edit(Request $request, $id)
   { 
       $editData=pengumuman::findOrFail($id);
       return view('admin.pengumuman.edit',compact('editData'));
   }
   public function update(Request $request, $id)
   {
       $editData = pengumuman::find($id);
        // content
        $konten = $request ['content'];
            
        // Handle gambar summernote
        preg_match_all('/<img[^>]+src="([^"]+)"/', $konten, $matches);
        $uploadedImages = $matches[1];
        $uploadedImageUrls = [];
    
        foreach ($uploadedImages as $uploadedImage) {
            if (strpos($uploadedImage, 'data:image') === 0) {
               
                $imageData = substr($uploadedImage, strpos($uploadedImage, ',') + 1);
                $decodedImage = base64_decode($imageData);
                $imageName = time() . '_' . Str::random(8) . '.png';
                Storage::disk('public')->put('pengumuman/konten/' . $imageName, $decodedImage);
                $imageUrl = Storage::url('pengumuman/konten/' . $imageName);
                $konten = str_replace($uploadedImage, $imageUrl, $konten);
                $uploadedImageUrls[] = $imageUrl;

               
               
            }
        }
        // Hapus gambar-gambar lama dalam konten Summernote
        preg_match_all('/<img[^>]+src="([^"]+)"/', $editData->content, $oldImages);
        $oldUploadedImages = $oldImages[1];
    
        foreach ($oldUploadedImages as $oldUploadedImage) {
            if (strpos($oldUploadedImage, 'storage/pengumuman/konten') !== false && !in_array($oldUploadedImage, $uploadedImages)) {
                $oldImagePath = str_replace(Storage::url(''), '', $oldUploadedImage);
                Storage::disk('public')->delete($oldImagePath);
            }
        }
        
        $editData->update([
        $editData->judul=$request->input('judul'),
        'content' => $konten,
    ]);
     return redirect()->route('pengumuman.view')->with('success', 'data berhasil di update');                
}

public function delete(Request $request, $id)
{
    $peng = pengumuman::findOrFail($id);
    

    // content
    $konten = $peng->content;

    // Handle gambar summernote
    preg_match_all('/<img[^>]+src="([^"]+)"/', $konten, $matches);
    $uploadedImages = $matches[1];

    foreach ($uploadedImages as $uploadedImage) {
        if (strpos($uploadedImage, 'storage/pengumuman/konten') !== false) {
            $imagePath = str_replace(Storage::url(''), '', $uploadedImage);
            Storage::disk('public')->delete($imagePath);
        }
    }

    // Hapus data 
    $peng->delete();

    return redirect()->route('pengumuman.view')->with('success', 'Data berita berhasil dihapus');
}

 public function show($id){
   $peng=pengumuman::all();
   $showData=pengumuman::findOrFail($id);
   return view('admin.pengumuman.show',compact('showData','peng'));
   
}


   }

