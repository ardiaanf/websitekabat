<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\berita;
use Illuminate\Facades\Storage;
use Intervention\Image\Facades\Image;
use illuminate\Support\Str;

class beritacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = berita::all();
        // $berita = berita ::paginate(20);
        return view('admin.berita.berita_view', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                'konten.required' => '*Konten harus diisi',
            ];

            $this->validate($request,$rules, $messages);
            $data = new berita();

            //judul
            $data->judul=$request->input('judul');

            //gambar
            $fileName = time().'.'.$request->gambar->extension();
            $request->file('gambar')->storeAs('public/berita', $fileName);
            $data->gambar = $fileName;

         // deskripsi
            $data->konten= $request->input('konten');
            $data->save();
            return redirect()->route('berita.view')->with('info','Tambah data berhasil');

        // judul ke slug
        // $data->slug_judul = Str::slug($request->get('judul'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // dd($id->all());
        // dd($id);
        $berita = berita::findOrFail($id);
        // dd($berita);
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'judul'  => 'required',
            'gambar' => 'file|mimes:png,jpg|max:2024',
            'konten' => 'required|min:10'
        ]);

        $berita = berita::findorfail($id);
        $gambar = $request->file('gambar');

        if (!empty($gambar)) {
            $data = $request->all();
            $gambar = $request->file('gambar');
            $new_gambar = date('s' . 'i' . 'H' . 'd' . 'm' . 'Y') . '_' . $gambar->GetClientOriginalName();
            $data['gambar'] = '' . $new_gambar;
            $gambar->storeAs('public/berita', $new_gambar);
            $berita->update($data);
        } else {
            $data['judul'] = $request->judul;
            $berita->update($data);
            $data['konten'] = $request->konten;
        }
        return redirect()->route('berita.view')->with('success', 'Data berita berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        // $berita =$id->gambar;
        // Storage::disk('public/berita')->delete($berita);
        // $id->delete();
        berita::findOrFail($id)->delete();
        return redirect()->route('berita.view')->with('error', 'Data berita berhasil dihapus');


        // dd($id);
        // $berita = berita::where('id', $id);
        // $berita->delete();
        // return redirect()->route('berita.view')->with('info','data berhasil dihapus');
    }
}