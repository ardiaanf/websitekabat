<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\unggahFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;


class unggahFileController extends Controller
{
    public function index()
    {
        $unggah = unggahFile::all();
        return view('admin.unggahFile.index', compact('unggah'));
    }
    public function add()
    {
        return view('admin.unggahFile.add');
    }
    public function show($id)
{
    $showData = unggahFile::findOrFail($id);
    return view('admin.unggahFile.show', compact('showData'));
}

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'judul' => 'required',
        'unggah_file' => 'required|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx',
        'deskripsi' => 'nullable|string',
    ],[
        'judul.required' => 'judul harus diisi',
        'unggah_file.required' => 'file harus diisi|docx/pdf/ppt/excel.',
      
       ]);

    if ($request->hasFile('unggah_file')) {
        $file = $request->file('unggah_file');
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs('public/unggahFile', $fileName);

        $validatedData['unggah_file'] = $fileName;
    }

    $validatedData['deskripsi'] = $request->input('deskripsi');

    $file = unggahFile::create($validatedData);

    return redirect()->route('unggah.view')->with('success', 'Tambah Alat berhasil');
}
public function edit($id)
{
    $editData = unggahFile::findOrFail($id);
    return view('admin.unggahFile.edit', compact('editData'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'judul' => 'required',
        'unggah_file' => 'nullable|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx',
        'deskripsi' => 'nullable|string',
    ]);

    $file = unggahFile::findOrFail($id);

    if ($request->hasFile('unggah_file')) {
        Storage::delete($file->unggah_file);
        $newFile = $request->file('unggah_file');
        $fileName = $newFile->getClientOriginalName();
        $path = $newFile->storeAs('public/unggahFile', $fileName);
        $validatedData['unggah_file'] = $fileName;
    }

    $validatedData['deskripsi'] = $request->input('deskripsi');

    // Memperbarui data-file
    $file->update($validatedData);

    return redirect()->route('unggah.view')->with('success', 'Data File berhasil diperbarui');
}
public function delete($id)
{
    $file = unggahFile::findOrFail($id);
    $filePath = 'public/unggahFile/' . $file->unggah_file;

    Storage::delete($filePath);
    $file->delete();

    return redirect()->route('unggah.view')->with('success', 'Data File berhasil dihapus');
}
public function download($id)
{
    $file = unggahFile::findOrFail($id);

    $filePath = storage_path('app/public/unggahFile/' . $file->unggah_file);

    return response()->download($filePath, $file->unggah_file, [], 'inline');
}
}
