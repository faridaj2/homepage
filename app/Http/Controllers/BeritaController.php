<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = berita::orderByDesc('created_at')->paginate(15);
        return view('admin.berita.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData =  $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:beritas,slug',
            'img' => 'required',
            'content' => 'required'
        ]);
        if (!$validateData) {
            return response()->json(['data' => '✖️ Terjadi kesalahan dalam validasi'], 422);
        }
        berita::create([
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
        $data = berita::find($id);
        return view('admin.berita.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $data = berita::find($id);
        return view('admin.berita.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        berita::find($id)->update([
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
        berita::destroy($id);
        return response()->json(['success' => 'oke'], 200);
    }
}
