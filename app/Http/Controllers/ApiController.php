<?php

namespace App\Http\Controllers;

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
}
