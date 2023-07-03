<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\berita;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

class beritacontroller extends Controller
{
   
    public function index()
    {
        $berita = berita::all();
      
        return view('admin.berita.berita_view', compact('berita'));
    }
    public function show($id){
        $berita=berita::all();
                $showData=berita::findOrFail($id);
                return view('admin.berita.show',compact('showData','berita'));
        
    }

    public function create()
    {
        return view('admin.berita.add');
    }

    
    public function store(Request $request)
    {
        $rules=[
             'judul' => 'required',
             'gambar' => 'required|max:1000|mimes:jpg,jpeg,png',
             'konten' => 'required|min:20',
            ];

              $messages =[
                'judul.required' => '*Judul harus diisi',
                'gambar.required' => '*Gambar harus diisi',
                'konten.required' => '*Deskripsi harus diisi',
            ];

            $this->validate($request,$rules, $messages);
           

            //gambar
            $fileName = time().'.'.$request->gambar->extension();
            $request->file('gambar')->storeAs('public/berita/gambar', $fileName);
           

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
                       Storage::disk('public')->put('berita/konten/' . $imageName, $decodedImage);
           
                     
                       $imageUrl = Storage::url('berita/konten/' . $imageName);
                       $konten = str_replace($uploadedImage, $imageUrl, $konten);
                   }
               }

            $data = new berita();
            $data->judul=$request->judul;
            $data->gambar = $fileName;
            $data->konten = $konten;
            $data->save();
            return redirect()->route('berita.view')->with('success','Tambah data berhasil');
    }

    public function edit(Request $request, $id)
    {
      
        $editData = berita::findOrFail($id);
        return view('admin.berita.edit', compact('editData'));
    }

  
    public function update(Request $request, $id)
    {
        $editData = berita::find($id);
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
            if (\File::exists('storage/berita/gambar'.$editData->gambar)) {
                \File::delete('storage/berita/gambar'.$editData->gambar);
            }
            $fileName = time().'.'.$request->gambar->extension();
            $request->file('gambar')->storeAs('public/berita/gambar', $fileName);
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
                Storage::disk('public')->put('berita/konten/' . $imageName, $decodedImage);
                $imageUrl = Storage::url('berita/konten/' . $imageName);
                $konten = str_replace($uploadedImage, $imageUrl, $konten);
                $uploadedImageUrls[] = $imageUrl;

               
               
            }
        }
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
        return redirect()->route('berita.view')->with('success', 'Data berita berhasil ditambahkan');
    }

    public function destroy(Request $request, $id)
{
    $berita = berita::findOrFail($id);
    
    // Hapus gambar utama
    if ($berita->gambar) {
        Storage::disk('public')->delete('berita/gambar/' . $berita->gambar);
    }

    // content
    $konten = $berita->konten;

    // Handle gambar summernote
    preg_match_all('/<img[^>]+src="([^"]+)"/', $konten, $matches);
    $uploadedImages = $matches[1];

    foreach ($uploadedImages as $uploadedImage) {
        if (strpos($uploadedImage, 'storage/berita/konten') !== false) {
            $imagePath = str_replace(Storage::url(''), '', $uploadedImage);
            Storage::disk('public')->delete($imagePath);
        }
    }

    // Hapus data berita
    $berita->delete();

    return redirect()->route('berita.view')->with('success', 'Data berita berhasil dihapus');
}
}

 
//     public function destroy(Request $request ,$id)
//     {
       

//         $delete = berita::find($id);
           
//         if (\File::exists('storage/berita/gambar/'.$delete->gambar)) {
//             \File::delete('storage/berita/gambar/'.$delete->gambar); 
//         berita::whereId($id)->delete();   
//         return redirect()->route('berita.view')->with('success', 'Data berita berhasil dihapus');
        
//     }
// }
// }

