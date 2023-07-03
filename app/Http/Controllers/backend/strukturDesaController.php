<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\desa;
//use App\Models\jabatanDesa;
use App\Models\strukturDesa;

class strukturDesaController extends Controller
{
   public function index (){
      
  $data['allDataStruktur']=strukturDesa::with('desas',)->get();
      return view('admin.strukturDesa.index', $data);
   }
   public function add()
   {
      //  return view('admin.potensiDesa.potensiAdd');
      $desa=desa::all();
      $jabatanDesa =strukturDesa ::JABATAN_DESA;
      //$jabatan=jabatanDesa::all();
      return view('admin.strukturDesa.add',compact('desa','jabatanDesa'));
   }
   public function store(Request $request)
    {
      
            $validatedData = $request->validate([
                'desa_id' => 'required',
                'nama' => 'required',
                'jabatan' => 'required',
                'fotoProfil' => 'image|mimes:jpeg,png,jpg|max:2048'
            ],[
                 'desa_id.required' => 'desa harus diisi',
                 'nama.required' => 'nama harus diisi.',
                'jabatan.required' => 'Jabatan harus dipilih.'
               
                ]);

            $data = new StrukturDesa(); // Gunakan model StrukturDesa
            $data->desa_id = $validatedData['desa_id'];
            $data->nama = $validatedData['nama'];
            $data->jabatan = $validatedData['jabatan'];

            // Foto Profil
            if ($request->hasFile('fotoProfil')) {
                $fotoProfil = $request->file('fotoProfil');
                $fileName = uniqid() . '.' . $fotoProfil->getClientOriginalExtension();
                $path = $fotoProfil->storeAs('public/strukturDesa/foto/', $fileName);
                $data->fotoProfil = $fileName;
            // } else {
            //     $data->fotoProfil = null;
             }

            $data->save();

            return redirect()->route('struktur.view')->with('info', 'Tambah Alat berhasil');
        }        
    
     public function edit(Request $request, $id)
     {
      
         $desa=desa::all();
        //  $jabatan=jabatanDesa::all();
        $jabatanDesa = strukturDesa::JABATAN_DESA;
         $editData=strukturDesa::findOrFail($id);
         return view('admin.strukturDesa.edit',compact('desa','jabatanDesa','editData'));
     }
     public function update(Request $request, $id)
     {
         $editData = strukturDesa::find($id);
         $this->validate($request, [
            'desa_id' =>'required',
            'nama'=>'required',
            'jabatan'=>'required',
            'fotoProfil'=>'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

     if ($request->hasFile('fotoProfil')) {
        if (\File::exists('storage/strukturDesa/foto/'.$editData->fotoProfil)) {
            \File::delete('storage/strukturDesa/foto/'.$editData->fotoProfil);
        }
        $fileName = time().'.'.$request->fotoProfil->extension();
        $request->file('fotoProfil')->storeAs('public/strukturDesa/foto/', $fileName);
   }

   if ($request->hasFile('fotoProfil')) {
        $checkFileName = $fileName;
       
   } else {
   
    $checkFileName = $editData->fotoProfil;
   }
         $editData->update([
            $editData->desa_id = $request->input('desa_id') ?? $editData->desa_id,
            $editData->jabatan = $request->input('jabatan') ?? $editData->jabatan,
            $editData->nama=$request->nama,
            'fotoProfil' => $checkFileName,
            
          
          
        ]);

        return redirect()->route('struktur.view')->with('success', 'data berhasil di update');                
}

public function delete($id)
{
    $delete = strukturDesa::find($id);
    if (\File::exists('storage/strukturDesa/foto/'.$delete->fotoProfil)) {
        \File::delete('storage/strukturDesa/foto/'.$delete->fotoProfil);
     
    strukturDesa::whereId($id)->delete();
    return  redirect()->route('struktur.view')->with('success', 'data berhasil di hapus');

}
}

      }


