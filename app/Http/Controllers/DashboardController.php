<?php

namespace App\Http\Controllers;

use App\Models\ArticleLeader;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function pemimpin()
    {
        $article = ArticleLeader::all();
        return view('admin.articleLeader', compact('article'));
    }
}
