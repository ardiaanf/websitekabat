<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\test;

class testController extends Controller
{
    
        public function index(){
    
            $data['allData']=test ::all();
           return view('admin.test.index', $data);
         }
          public function add()
          {
             return view('admin.test.add');
         }
         public function store(Request $request)
{
         $validatedData = $request->validate([
                'content' => 'required'
            ]);
        
            // Save the content
            $content = $validatedData['content'];
        
            // Handle the Summernote image uploads
            preg_match_all('/<img[^>]+src="([^"]+)"/', $content, $matches);
            $uploadedImages = $matches[1];
        
            foreach ($uploadedImages as $uploadedImage) {
                if (strpos($uploadedImage, 'data:image') === 0) {
                    // Handle base64-encoded image data
                    $imageData = substr($uploadedImage, strpos($uploadedImage, ',') + 1);
                    $decodedImage = base64_decode($imageData);
                    $imageName = time() . '_' . Str::random(8) . '.png';
                    Storage::disk('public')->put('images/' . $imageName, $decodedImage);
        
                    // Replace the base64-encoded image with the image URL
                    $imageUrl = Storage::url('images/' . $imageName);
                    $content = str_replace($uploadedImage, $imageUrl, $content);
                }
            }
        
            // Save or process the content as needed
            $data = new test;
            $data->content = $content;
            $data->save();
            // Redirect or return a response
            return redirect()->route('indextest.view')->with('info','Tambah Alat berhasil');
        
        }
}
