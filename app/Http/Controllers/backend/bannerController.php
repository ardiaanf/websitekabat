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
   // 
}
public function store(Request $request)
{
    $this->validate($request, [
        'gambar_banner' => 'required|image|file|max:1024',
    ]);

    $data = $request->all();
    $gambar = $request->file('gambar_banner');
    $new_gambar = date('s' . 'i' . 'H' . 'd' . 'm' . 'Y') . '_' . $gambar->GetClientOriginalName();

    $data['gambar_banner'] = 'images/banner/' . $new_gambar;

    $gambar->storeAs('public/images/banner', $new_gambar);
    Banners::create($data);

    return redirect()->route('banner.view')->with('success', 'Banner berhasil ditambahkan');
}
public function show(Banners $banner)
{
    //
}
public function edit($id_banner)
{
    $id_banner = Crypt::decrypt($id_banner);
    $banner = Banners::findorfail($id_banner);
    return view('banner.edit', compact('banner'));
}
public function update(Request $request, $id_banner)
    {
        $this->validate($request, [
            'gambar_banner' => 'file|mimes:png,jpg|max:2024',
            'keterangan'    => 'required',
        ]);

        $banner = Banners::findorfail($id_banner);

        $gambar = $request->file('gambar_banner');

        if (!empty($gambar)) {
            $data = $request->all();
            $gambar = $request->file('gambar_banner');
            $new_gambar = date('s' . 'i' . 'H' . 'd' . 'm' . 'Y') . '_' . $gambar->GetClientOriginalName();
            $data['gambar_banner'] = 'images/banner/' . $new_gambar;
            $gambar->storeAs('public/images/banner', $new_gambar);
            $banner->update($data);
        } else {
            $data['keterangan'] = $request->keterangan;
            $banner->update($data);
        }
        return redirect()->route('banner.view')->with('success', 'Banner berhasil ditambahkan');
    }
    public function destroy($id_banner)
    {
        Banners::findOrFail($id_banner)->delete();
        return redirect()->route('banner.view')->with('error', 'Data banner berhasil dihapus');
    }

}
