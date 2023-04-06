<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class bannerController extends Controller
{
    public function bannerView(){

        $banner = Banners::all();
        return view('admin.banner.banner_view', compact('banner'));

     }

    public function bannerAdd(){
        // return view('admin.banner.banner_view');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar_banner' => 'required|image|file|max:1024',
            'keterangan'    => 'required|min:10'
        ]);

        $data = $request->all();
        $gambar = $request->file('gambar_banner');
        $new_gambar = date('s' . 'i' . 'H' . 'd' . 'm' . 'Y') . '_' . $gambar->GetClientOriginalName();
        $gambar->storeAs('public/images/banner', $new_gambar);

        $data['gambar_banner'] = 'images/banner/' . $new_gambar;
        Banners::create($data);

        return redirect()->route('banner.view')->with('success', 'Banner berhasil ditambahkan');
    }

    public function destroy($id){
        Banners::findOrFail($id)->delete();
        return redirect()->route('banner.view')->with('error', 'Data banner berhasil dihapus');
    }


}
