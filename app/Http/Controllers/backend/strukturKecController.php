<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\strukturKec;

class strukturKecController extends Controller
{
    public function index()
    {
        $kec = strukturKec::all();
        return view('admin.strukturKec.index', compact('kec'));
    }
    public function add()
    {
       $jabatanKec =strukturKec ::JABATAN_KEC;
       return view('admin.strukturKec.add',compact('jabatanKec'));
    }
    public function store(Request $request)
    {
        $validateData= $request->validate([        
           'nama'=>'required',
           'jabatan'=>'required',
           'fotoProfil'=>'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ],[
        'nama.required' => 'Nama harus diisi.',
        'jabatan.required' => 'Jabatan harus dipilih.',
       
        ]);
           $data = new strukturKec();
           $data->nama=$request->nama;
           $data->jabatan=$request->jabatan;

           //gambar

           if ($request->hasFile('fotoProfil')) {
              $fotoProfil = $request->file('fotoProfil');
              $fileName = uniqid() . '.' . $fotoProfil->getClientOriginalExtension();
              $path = $fotoProfil->storeAs('public/strukturKec/foto/', $fileName);
              $data->fotoProfil = $fileName; 
       //    } else {
       //        $data['fotoProfil'] = null;
          }
           $data->save();
           return redirect()->route('struKec.view')->with('info','Tambah Alat berhasil');
       }
       public function edit(Request $request, $id)
       {
      
           $jabatanKec =strukturKec ::JABATAN_KEC;
           $editData=strukturKec::findOrFail($id);
           return view('admin.strukturKec.edit',compact('jabatanKec','editData'));
       }
       public function update(Request $request, $id)
     {
         $editData = strukturKec::find($id);
         $this->validate($request, [
            'nama'=>'required',
            'jabatan'=>'required',
            'fotoProfil'=>'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

     if ($request->hasFile('fotoProfil')) {
        if (\File::exists('storage/strukturKec/foto/'.$editData->fotoProfil)) {
            \File::delete('storage/strukturKec/foto/'.$editData->fotoProfil);
        }
        $fileName = time().'.'.$request->fotoProfil->extension();
        $request->file('fotoProfil')->storeAs('public/strukturKec/foto/', $fileName);
   }

   if ($request->hasFile('fotoProfil')) {
        $checkFileName = $fileName;
       
   } else {
   
    $checkFileName = $editData->fotoProfil;
   }
         $editData->update([
         
            $editData->jabatan = $request->input('jabatan') ?? $editData->jabatan,
            $editData->nama=$request->nama,
            'fotoProfil' => $checkFileName,
            
          
          
        ]);

        return redirect()->route('struKec.view')->with('success', 'data berhasil di update');                
}
public function delete($id)
{
    $delete = strukturKec::find($id);
    if (\File::exists('storage/strukturKec/foto/'.$delete->fotoProfil)) {
        \File::delete('storage/strukturKec/foto/'.$delete->fotoProfil);
     
    strukturKec::whereId($id)->delete();
    return  redirect()->route('struKec.view')->with('success', 'data berhasil di hapus');

}
}

}



