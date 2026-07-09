<?php

namespace App\Http\Controllers;

use App\Models\ArticleLeader;
use App\Models\Berita;
use App\Models\Pendidikan;
use App\Models\Sejarah;
use App\Models\UserInput;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $beritaCount = Berita::count();
        $pemimpinCount = ArticleLeader::count();
        $pendidikanCount = Pendidikan::count();
        $sejarahCount = Sejarah::count();
        $pspdbCount = UserInput::count();

        // Recent activities - grab latest 5 from all content types
        $recentBerita = Berita::latest()->take(5)->get();
        $recentPemimpin = ArticleLeader::latest()->take(5)->get();
        $recentPendidikan = Pendidikan::latest()->take(5)->get();
        $recentSejarah = Sejarah::latest()->take(5)->get();

        // Merge and sort by updated_at
        $recentActivities = collect()
            ->merge($recentBerita)
            ->merge($recentPemimpin)
            ->merge($recentPendidikan)
            ->merge($recentSejarah)
            ->sortByDesc('updated_at')
            ->take(5);

        return view('dashboard', compact(
            'beritaCount',
            'pemimpinCount',
            'pendidikanCount',
            'sejarahCount',
            'pspdbCount',
            'recentActivities'
        ));
    }

    public function pemimpin()
    {
        $article = ArticleLeader::all();
        return view('admin.articleLeader', compact('article'));
    }
}
