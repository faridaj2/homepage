<?php

namespace App\Http\Controllers;

use App\Models\others;
use App\Http\Requests\UpdateothersRequest;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = null;
        $check = others::where('type', 'pendaftaran');
        if ($check->count() === 0) {
        } else {
            $data = $check->first();
        }
        return view('admin.pendaftaran.index', compact('data'));   //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = null;
        $check = others::where('type', 'pendaftaran');
        if ($check->count() === 0) {
            $data = '';
        } else {
            $data = $check->first();
        }
        return view('admin.pendaftaran.edit', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $content = $request->content;
        $check = others::where('type', 'pendaftaran');
        if ($check->count() === 0) {
            others::create([
                'type' => 'pendaftaran',
                'content' => $content,
            ]);
            return redirect('/dashboard/info-pendaftaran/');
        } else {
            $check->update([
                'content' => $content,
            ]);
            return redirect('/dashboard/info-pendaftaran/');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(others $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(others $others)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateothersRequest $request, others $others)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(others $others)
    {
        //
    }
}
