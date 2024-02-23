<?php

namespace App\Http\Controllers;

use App\Models\UserInput;
use Illuminate\Http\Request;
use App\Http\Controllers\FileUserInputController as FileController;

class UserInputController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = UserInput::where('user_id', auth()->user()->id)->get();
        return view('pspdb.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pspdb.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validate = $request->validate([
            "user_id" => "required|numeric",
            "nama" => "string|required",
            "nik" => "numeric|nullable",
            "asl_sklh" => "string|nullable",
            "nisn" => "numeric|nullable",
            "kk" => "numeric|nullable",
            "tpt_lahir" => "string|nullable",
            "tgl_lahir" => "date|nullable",
            "kelamin" => "string|nullable",
            "formal" => "string|nullable",
            "diniyah" => "string|nullable",
            "email" => "email|nullable",
            "alamat" => "string|nullable",
            "nama_ayah" => "string|nullable",
            "tlp_ayah" => "numeric|nullable",
            "nama_ibu" => "string|nullable",
            "tlp_ibu" => "numeric|nullable",
            "nis" => "numeric|nullable",
        ]);

        $insert = UserInput::create([
            "user_id" => $request->user_id,
            "nama" => $request->nama,
            "nik" => $request->nik,
            "nisn" => $request->nisn,
            "kk" => $request->kk,
            "asal_sekolah" => $request->asal_sklh,
            "tpt_lahir" => $request->tpt_lahir,
            "tgl_lahir" => $request->tgl_lahir,
            "kelamin" => $request->kelamin,
            "formal" => $request->formal,
            "diniyah" => $request->diniyah,
            "email" => $request->email,
            "alamat" => $request->alamat,
            "ayah" => $request->nama_ayah,
            "no_ayah" => $request->tlp_ayah,
            "ibu" => $request->nama_ibu,
            "no_ibu" => $request->tlp_ibu,
            "nis" => $request->nis
        ]);
        if ($insert) {
            return redirect('/pspdb/dokumen-pendukung/create')->with(['status' => 'Upload dokumen pendukung', 'id' => $insert->id]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $check = Auth()->user()->userInput()->where('id', $id)->exists();
        if ($check) {

            $data = [
                'data' => UserInput::find($id)
            ];
            return view('pspdb.show', $data);
        } else {
            return redirect('/pspdb')->with('status', 'Anda tidak memiliki akses untuk data tersebut');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $check = Auth()->user()->userInput()->where('id', $id)->exists();

        if ($check) {
            $data = UserInput::find($id);
            return view('pspdb.edit', compact('data'));
        } else {
            return redirect('/pspdb')->with('status', 'anda tidak memiliki hak mengedit data tsb');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = UserInput::find($id);
        $request->validate([
            "user_id" => "required|numeric",
            "nama" => "string|required",
            "nik" => "numeric|nullable",
            "asl_sklh" => "string|nullable",
            "nisn" => "numeric|nullable",
            "kk" => "numeric|nullable",
            "tpt_lahir" => "string|nullable",
            "tgl_lahir" => "date|nullable",
            "kelamin" => "string|nullable",
            "formal" => "string|nullable",
            "diniyah" => "string|nullable",
            "email" => "email|nullable",
            "alamat" => "string|nullable",
            "nama_ayah" => "string|nullable",
            "tlp_ayah" => "numeric|nullable",
            "nama_ibu" => "string|nullable",
            "tlp_ibu" => "numeric|nullable",
            "nis" => "numeric|nullable",
        ]);
        $insert = $data->update([
            "user_id" => $request->user_id,
            "nama" => $request->nama,
            "nik" => $request->nik,
            "nisn" => $request->nisn,
            "kk" => $request->kk,
            "asal_sekolah" => $request->asal_sklh,
            "tpt_lahir" => $request->tpt_lahir,
            "tgl_lahir" => $request->tgl_lahir,
            "kelamin" => $request->kelamin,
            "formal" => $request->formal,
            "diniyah" => $request->diniyah,
            "email" => $request->email,
            "alamat" => $request->alamat,
            "ayah" => $request->nama_ayah,
            "no_ayah" => $request->tlp_ayah,
            "ibu" => $request->nama_ibu,
            "no_ibu" => $request->tlp_ibu,
            "nis" => $request->nis
        ]);
        if ($insert) {
            return redirect('/pspdb/' . $id)->with('status', 'data berhasil diedit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file =  UserInput::find($id)->fileUserInput()->get();
        $fileController = new FileController();
        if (!$file->isEmpty()) {
            foreach ($file as $file) {
                $fileController->destroy($file->id);
            }
        }
        UserInput::destroy($id);
        return redirect()->back()->with('status', 'data berhasil dihapus');
    }
}
