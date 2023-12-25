<?php

namespace App\Http\Controllers;

use App\Models\articleLeader;
use App\Models\pendidikan;
use App\Models\sejarah;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        return view('page.index');
    }
    public function login()
    {
        return view('page.login');
    }
    public function register()
    {
        return view('page.register');
    }
    public function profilPimpinan($id)
    {
        $data = [
            'data' => articleLeader::find($id),
            'page' => 'Profil Pimpinan'
        ];
        return view('page.page', $data);
    }
    public function Pendidikan($id)
    {
        $data = [
            'data' => pendidikan::find($id),
            'page' => 'Profil Instansi Pendidikan'
        ];
        return view('page.page', $data);
    }
    public function sejarah($id)
    {
        $data = [
            'data' => sejarah::find($id),
            'page' => 'Sejarah'
        ];
        return view('page.page', $data);
    }
    public function Warta()
    {
        return view('page.warta');
    }

    public function navData()
    {
        $data = [
            'pemimpin' => articleLeader::get(),
            'pendidikan' => pendidikan::get(),
            'sejarah' => sejarah::get()
        ];
        return $data;
    }
}
