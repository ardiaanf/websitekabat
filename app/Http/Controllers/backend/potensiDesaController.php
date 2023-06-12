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
        // $data = potensiDesa::all();
    // return view('admin.potensiDesa.potensiDesaView',/*compact('data')*/);
    $data['allDataPotensi']=potensiDesa::with('desas')->get();
        return view('admin.potensiDesa.index', $data);
     }
     public function add()
     {
        //  return view('admin.potensiDesa.potensiAdd');
        $desa=desa::all();
        return view('admin.potensiDesa.add',compact('desa'));
     }
     public function store(Request $request)
     {
        
         $rules = [
            'desa_id' =>'required',
            'gambar' =>'required|max:1000|mimes:jpg,jpeg,png',
             'content' =>'required|min:10',
         ];

        $messages = [
            'desa_id.required' => 'Nama Desa wajib dipilih !!',
            'gambar.required' => 'Gambar wajib diisi !!',
            'content.required' => 'Content Wajib Diisi Min.10 Huruf !!',
        ];

         $this->validate($request, $rules, $messages);

      
            //gambar potensi
            $fileName = time().'.'.$request->gambar->extension();
            $request->file('gambar')->storeAs('public/potensidesa', $fileName);

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
                    Storage::disk('public')->put('images/' . $imageName, $decodedImage);
        
                  
                    $imageUrl = Storage::url('images/' . $imageName);
                    $content = str_replace($uploadedImage, $imageUrl, $content);
                }
            }
            $data = new potensiDesa();
            $data->desa_id=$request->desa_id;
            $data->gambar = $fileName;
            $data->content = $content;
            $data->save();

            return redirect()->route('potensi.view')->with('info','Tambah Alat berhasil');

           
            }
            public function edit(Request $request, $id)
            {
               
                // $data = potensiDesa::findOrFail($id);
                // return view('admin.potensiDesa.edit');
                $potensi=potensiDesa::findOrFail($id);
                return view('admin.potensiDesa.edit',compact('potensi'));
            }
            public function update(Request $request, $id)
            {
                // dd($request->all());
                $this->validate($request, [
                    'desa_id' =>'required',
                    'gambar' =>'required|max:1000|mimes:jpg,jpeg,png',
                    'content' =>'required|min:10',
                ]);
                
        $potensi= potensiDesa::findorfail($id);
        $gambar = $request->file('gambar');

        if (!empty($gambar)) {
            $data = $request->all();
            $gambar = $request->file('gambar');
            $new_gambar = date('s' . 'i' . 'H' . 'd' . 'm' . 'Y') . '_' . $gambar->GetClientOriginalName();
            $data['gambar'] = '' . $new_gambar;
            $gambar->storeAs('public/potensidesa', $new_gambar);
            $potensi->update($data);
        } else {
            $data['desa_id'] = $request->content;
            $potensi->update($data);
            $data['content'] = $request->content;
        }
        return redirect()->route('potensi.view')->with('success', 'Data berita berhasil ditambahkan');
    }
    }


            
        
        
           
 
           

          

       
        
            
       
    

