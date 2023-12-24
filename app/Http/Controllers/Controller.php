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
    public function profilPimpinan()
    {
        return view('page.profil');
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
