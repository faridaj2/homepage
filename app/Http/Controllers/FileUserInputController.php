<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUserInput;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateFileUserInputRequest;

class FileUserInputController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pspdb.fileUpload.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('pspdb.fileUpload.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('public/userfile');
            $fileUrl = Storage::url($filePath);
            $fileStore = FileUserInput::create([
                'user_input_id' => $request->id,
                'original_name' => $file->getClientOriginalName(),
                'name' => $file->hashName(),
                'url_file' => $filePath,
                'typeFile' => $request->fileType
            ]);
            if ($fileStore) {
                return redirect('/pspdb/dokumen-pendukung/create')->with(['status' => 'Berkas berhasil diupload, tekan selesai bila sudah selesai', 'id' => $request->id]);
            }
        } else {
            return redirect()->back()->with(['status' => 'Terjadi kesalahan, gagal memasukkan data', 'id' => $request->id]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FileUserInput $fileUserInput)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        return redirect('/pspdb/dokumen-pendukung/create')->with(['status' => 'Masukkan dokumen yang ingin dipuload', 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFileUserInputRequest $request, FileUserInput $fileUserInput)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file = FileUserInput::find($id);
        $url = $file->url_file;
        Storage::delete($url);

        $delete = FileUserInput::destroy($id);

        if ($delete) {
            return redirect()->back()->with(['status' => 'Berhasil terhapus']);
        }
    }
}
