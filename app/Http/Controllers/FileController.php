<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatefileRequest;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $file = File::orderByDesc('created_at')->paginate(25);
        return view('admin.file.index', compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('public/file');
            $fileUrl = Storage::url($filePath);
            $fileStore = File::create([
                'originalName' => $file->getClientOriginalName(),
                'name' => $file->hashName(),
                'url' => $filePath,
                'ext' => $file->getClientOriginalExtension()
            ]);
            if ($fileStore) {

                return response(["msg" => "file success uploaded", "url" => $fileUrl], 200);
            }
        } else {
            return response()->json([], 402);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(file $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(file $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatefileRequest $request, file $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $file = File::find($id);
        Storage::delete($file->url);
        File::destroy($id);
        return response()->json(['data' => 'success'], 200);
    }
}
