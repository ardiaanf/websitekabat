<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\berita;
use Illuminate\Facades\Storage;
use Intervention\Image\Facades\Image;

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
        // $data['berita']=berita ::all();
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
        dd($request->all());
        // $berita = berita::findOrFail($id);

        // // $berita->judul = $request->judul;

        // // $berita->konten = $request->konten;
        // //validate form
        // $this->validate($request, [
        //     'judul'     => 'required|min:5',
        //     'gambar'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'konten'   => 'required|min:10'
        // ]);

        // //check if image is uploaded
        // if ($request->hasFile('gambar')) {

        //     //upload new image
        //     $image = $request->file('gambar');
        //     $image->storeAs('public/berita', $image->hashName());

        //     //delete old image
        //     Storage::delete('public/berita/'.$berita->gambar);

        //     //update post with new image
        //     $berita->update([
        //         'judul'     => $request->judul,
        //         'gambar'     => $image->hashName(),
        //         'konten'   => $request->konten
        //     ]);

        // } else {

        //     //update post without image
        //     $berita->update([
        //         'judul'     => $request->judul,
        //         'konten'   => $request->konten
        //     ]);
        // }

        // //redirect to index
        // return redirect()->route('berita.view')->with(['success' => 'Data Berhasil Diubah!']);
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


        // dd($id);
        $berita = berita::where('id', $id);
        $berita->Delete();
        return redirect()->route('berita.view')->with('info','data berhasil dihapus');
    }
}
