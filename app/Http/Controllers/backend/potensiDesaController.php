<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\desa;
use App\Models\potensiDesa;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class potensiDesaController extends Controller
{
    public function index (){
    
    $data['allDataPotensi']=potensiDesa::with('desas')->get();
        return view('admin.potensiDesa.index', $data);
     }
     public function show($id){
        $desa=desa::all();
                $showData=potensiDesa::findOrFail($id);
                return view('admin.potensiDesa.show',compact('showData','desa'));
        
    }
     public function add()
     {
      
        $desa=desa::all();
        return view('admin.potensiDesa.add',compact('desa'));
     }
     public function store(Request $request)
     {
        
         $rules = [
            'desa_id' =>'required',
            'judul' => 'required',
            'gambar' =>'required|max:1000|mimes:jpg,jpeg,png',
            'content' =>'required|min:20',
         ];

        $messages = [
            'desa_id.required' => 'Nama Desa wajib dipilih !!',
            'judul.required' => 'Judul wajib diisi !!',
            'gambar.required' => 'gambar wajib diisi !!',
            'content.required' => 'Content Wajib Diisi Min.20 Huruf !!',
        ];

         $this->validate($request, $rules, $messages);

      
            //gambar potensi
            $fileName = time().'.'.$request->gambar->extension();
            $request->file('gambar')->storeAs('public/potensidesa/gambar/', $fileName);

            // content
            $content = $request ['content'];
        
            // Handle gambar summernote
            preg_match_all('/<img[^>]+src="([^"]+)"/', $content, $matches);
            $uploadedImages = $matches[1];
        
            foreach ($uploadedImages as $uploadedImage) {
                if (strpos($uploadedImage, 'data:image') === 0) {
                   
                    $imageData = substr($uploadedImage, strpos($uploadedImage, ',') + 1);
                    $decodedImage = base64_decode($imageData);
                    $imageName = time() . '_' . Str::random(8) . '.png';
                    Storage::disk('public')->put('potensidesa/konten/' . $imageName, $decodedImage);
        
                  
                    $imageUrl = Storage::url('potensidesa/konten/' . $imageName);
                    $content = str_replace($uploadedImage, $imageUrl, $content);
                }
            }
            $data = new potensiDesa();
            $data->desa_id=$request->desa_id;
            $data->judul=$request->judul;
            $data->gambar = $fileName;
            $data->content = $content;
            $data->save();

            return redirect()->route('potensi.view')->with('success','Data Berhasil Ditambahkan');

           
            }
            public function edit(Request $request, $id)
            {
               
                $desa=desa::all();
                $editData=potensiDesa::findOrFail($id);
                return view('admin.potensiDesa.edit',compact('editData','desa'));
            }
            public function update(Request $request, $id)
            {
                $editData = potensiDesa::find($id);
                if ($request->hasFile('gambar')) {
                    $fileCheck = 'nullable|max:1000|mimes:jpg,jpeg,png';
                } else {
                    $fileCheck = 'max:1000|mimes:jpg,jpeg,png';
                }
        

                $this->validate($request, [
                    'judul' => 'required',
                    'desa_id' =>'required',
                    'gambar' =>'max:1000|mimes:jpg,jpeg,png',
                    'content' =>'required|min:10',
                ]);
        
               
        
                // Image
               if ($request->hasFile('gambar')) {
                    if (\File::exists('storage/potensidesa/gambar/'.$editData->gambar)) {
                        \File::delete('storage/potensidesa/gambar/'.$editData->gambar);
                    }
                    $fileName = time().'.'.$request->gambar->extension();
                    $request->file('gambar')->storeAs('public/potensidesa/gambar', $fileName);
               }
        
               if ($request->hasFile('gambar')) {
                    $checkFileName = $fileName;
                   
               } else {
               
                $checkFileName = $editData->gambar;
               }
           

                 // content
            $content = $request ['content'];
        
            // Handle gambar summernote
            preg_match_all('/<img[^>]+src="([^"]+)"/', $content, $matches);
            $uploadedImages = $matches[1];
            $uploadedImageUrls = [];
        
            foreach ($uploadedImages as $uploadedImage) {
                if (strpos($uploadedImage, 'data:image') === 0) {
                   
                    $imageData = substr($uploadedImage, strpos($uploadedImage, ',') + 1);
                    $decodedImage = base64_decode($imageData);
                    $imageName = time() . '_' . Str::random(8) . '.png';
                    Storage::disk('public')->put('potensidesa/konten/' . $imageName, $decodedImage);
                    $imageUrl = Storage::url('potensidesa/konten/' . $imageName);
                    $content = str_replace($uploadedImage, $imageUrl, $content);
                    $uploadedImageUrls[] = $imageUrl;
                }
            }
             // Hapus gambar-gambar lama dalam konten Summernote
             preg_match_all('/<img[^>]+src="([^"]+)"/', $editData->content, $oldImages);
             $oldUploadedImages = $oldImages[1];
         
             foreach ($oldUploadedImages as $oldUploadedImage) {
                 if (strpos($oldUploadedImage, 'storage/potensidesa/konten') !== false && !in_array($oldUploadedImage, $uploadedImages)) {
                     $oldImagePath = str_replace(Storage::url(''), '', $oldUploadedImage);
                     Storage::disk('public')->delete($oldImagePath);
                 }
             }
             
            $editData->update([
                $editData->judul=$request->input('judul'),
                $editData->desa_id = $request->input('desa_id') ?? $editData->desa_id,
                'gambar' => $checkFileName,
                'content' => $content,
            ]);

            return redirect()->route('potensi.view')->with('success', 'data berhasil di update');                
    }

    
    public function delete($id)
    {
        $delete = potensiDesa::find($id);
          // Hapus gambar utama
      if ($delete->gambar) {
        Storage::disk('public')->delete('potensidesa/gambar/' . $delete->gambar);
    }

    // content
    $content = $delete->content;

    // Handle gambar summernote
    preg_match_all('/<img[^>]+src="([^"]+)"/', $content, $matches);
    $uploadedImages = $matches[1];

    foreach ($uploadedImages as $uploadedImage) {
        if (strpos($uploadedImage, 'storage/potensidesa/konten/') !== false) {
            $imagePath = str_replace(Storage::url(''), '', $uploadedImage);
            Storage::disk('public')->delete($imagePath);
        }
    }

    // Hapus data berita
    $delete->delete();

    return redirect()->route('potensi.view')->with('success', 'Data berita berhasil dihapus');
}
}

     



            
        
        
           
 
           

          

       
        
            
       
    

