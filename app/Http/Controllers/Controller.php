<?php

namespace App\Http\Controllers;

use App\Models\ArticleLeader;
use App\Models\Berita;
use App\Models\Others;
use App\Models\Pendidikan;
use App\Models\Sejarah;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        $data = [
            'berita' => Berita::orderBy('created_at', 'desc')->limit(3)->get()
        ];
        return view('page.index', $data);
    }
    public function login()
    {
        return view('page.login');
    }
    public function register()
    {
        return view('page.register');
    }
    public function profilPimpinan($slug)
    {
        $page = ArticleLeader::where('slug', $slug)->first();
        if (!$page) return view('404');
        $data = [
            'data' => $page,
            'page' => 'Profil Pimpinan'
        ];
        return view('page.page', $data);
    }
    public function Pendidikan($slug)
    {
        $page = Pendidikan::where('slug', $slug)->first();
        if (!$page) return view('404');
        $data = [
            'data' => $page,
            'page' => 'Profil Instansi Pendidikan'
        ];
        return view('page.page', $data);
    }
    public function sejarah($slug)
    {
        $page = Sejarah::where('slug', $slug)->first();
        if (!$page) return view('404');
        $data = [
            'data' => $page,
            'page' => 'Sejarah'
        ];
        return view('page.page', $data);
    }
    public function pendaftaran()
    {
        $data = [
            'page' => 'Pendaftaran',
            'title' => 'Info Pendaftaran',
            'content' => Others::where('type', 'pendaftaran')->first()
        ];
        return view('page.others', $data);
    }
    public function kontak()
    {
        $data = [
            'page' => 'Kontak',
            'title' => 'Kontak & Alamat',
            'content' => Others::where('type', 'kontak')->first()
        ];
        return view('page.others', $data);
    }

    public function Warta(Request $request)
    {
        $query = $request->q;
        if ($query) {
            $data = Berita::where('title', 'like', '%' . $query . '%')
                ->orWhere('content', 'like', '%' . $query . '%')
                ->orderByDesc('created_at')->paginate(15);

            $beritas = [
                'data' => $data,
                'random' => Berita::inRandomOrder()->limit(7)->get()
            ];
            return view('page.warta', $beritas);
        } else {
            $data = Berita::orderByDesc('created_at')->paginate(15);
            $data = [
                'data' => $data,
                'random' => Berita::inRandomOrder()->limit(7)->get()
            ];
            return view('page.warta', $data);
        }
    }
    public function GetWarta($slug)
    {
        $page = Berita::where('slug', $slug)->first();
        if (!$page) return view('404');
        $data = [
            'data' => Berita::where('slug', $slug)->first(),
            'page' => 'Berita'
        ];
        return view('page.page', $data);
    }
    public function SearchController(Request $request)
    {
        $query = $request->q;
        $mode = $request->mode;
        $berita = Berita::where('title', 'like', '%' . $query . '%')
            ->orWhere('content', 'like', '%' . $query . '%')
            ->limit(5)->get();
        if ($query == '') {
            return response()->json();
        }
        if ($mode == 'json') {
            return response()->json(array('data' => $berita));
        }
    }

    public function navData()
    {
        $data = [
            'pemimpin' => ArticleLeader::get(),
            'pendidikan' => Pendidikan::get(),
            'sejarah' => Sejarah::get()
        ];
        return $data;
    }
    public function createSiteMap()
    {
        SitemapGenerator::create('https://darussalam2.com')->writeToFile(public_path('sitemap.xml'));
    }
}
