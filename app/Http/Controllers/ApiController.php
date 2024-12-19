<?php

namespace App\Http\Controllers;

use App\Models\ArticleLeader;
use App\Models\Berita;
use App\Models\Pendidikan;
use App\Models\Sejarah;
use App\Models\UserInput;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllData(Request $request)
    {
        $q = $request->q;
        $data = UserInput::where('status', 0)->where('nama', 'like', '%' . $q . '%')
            ->paginate(50);

        return response($data);
    }
    public function getDataByID(Request $request)
    {
        $id = $request->id;
        $data = UserInput::with('FileUserInput')->find($id);
        return response($data);
    }
    public function acceptSiswa(Request $request, $id)
    {
        $response = [
            'status' => false,
            'id'   => 'not_found'
        ];
        $siswaData = UserInput::find($id);
        $check = $siswaData->update([
            'status' => 1
        ]);
        if ($check) {
            $response = [
                'status' => true,
                'id'   => $check,
            ];
        }
        return response($response);
    }
    public function pemimpin(Request $request)
    {
        $slug = $request->slug;
        $check = ArticleLeader::where('slug', 'LIKE', "$slug%")->count();
        return response(['exists' => $check]);
    }
    public function pendidikans(Request $request)
    {
        $slug = $request->slug;
        $check = Pendidikan::where('slug', 'LIKE', "$slug%")->count();
        return response(['exists' => $check]);
    }

    public function sejarahs(Request $request)
    {
        $slug = $request->slug;
        $check = Sejarah::where('slug', 'LIKE', "$slug%")->count();
        return response(['exists' => $check]);
    }

    public function Berita(Request $request)
    {
        $slug = $request->slug;
        $check = Berita::where('slug', 'LIKE', "$slug%")->count();
        return response(['exists' => $check]);
    }
    public function getberita()
    {
        $data = Berita::select('id', 'title', 'slug', 'image_url')
            ->limit(5)
            ->orderBy('created_at', 'DESC') // Assuming you want to order by 'created_at'
            ->get();
        return response()->json($data);
    }
}
