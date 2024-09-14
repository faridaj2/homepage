<?php

namespace App\Http\Controllers;

use App\Models\sejarah;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatesejarahRequest;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = sejarah::all();
        return view('admin.sejarah.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sejarah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData =  $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:sejarahs,slug',
            'img' => 'required',
            'content' => 'required'
        ]);
        if (!$validateData) {
            return response()->json(['data' => '✖️ Terjadi kesalahan dalam validasi'], 422);
        }
        sejarah::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'image_url' => $request->img,
            'content' => $request->content
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $data = sejarah::find($id);
        return view('admin.sejarah.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $data = sejarah::find($id);
        return view('admin.sejarah.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        sejarah::find($id)->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'image_url' => $request->img,
            'content' => $request->content
        ]);
        return response()->json(['data' => 'success', 200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $r, $id)
    {
        sejarah::destroy($id);
        return response()->json(['success' => 'oke'], 200);
    }
}
