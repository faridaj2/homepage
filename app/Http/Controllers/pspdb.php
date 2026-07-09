<?php

namespace App\Http\Controllers;

use App\Models\UserInput;
use Illuminate\Http\Request;

class pspdb extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = UserInput::orderByDesc('created_at')->get();
        return view('admin.pspdb.index', compact('data'));
    }
}
