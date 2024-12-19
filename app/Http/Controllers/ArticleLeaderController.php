<?php

namespace App\Http\Controllers;

use App\Models\ArticleLeader;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatearticleLeaderRequest;

class ArticleLeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.leader.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData =  $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:article_leaders,slug',
            'img' => 'required',
            'content' => 'required'
        ]);
        if (!$validateData) {
            return response()->json(['data' => '✖️ Terjadi kesalahan dalam validasi'], 422);
        }
        ArticleLeader::create([
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
        $article = ArticleLeader::find($id);
        return view('admin.leader.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $data = ArticleLeader::find($id);
        return view('admin.leader.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        ArticleLeader::find($id)->update([
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
        ArticleLeader::destroy($id);
        return response()->json(['success' => 'oke'], 200);
    }
}
