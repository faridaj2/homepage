<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/v1/search', [Controller::class, 'SearchController']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getAllData', [ApiController::class,  'getAllData']);
Route::get('/getDataByID', [ApiController::class,  'getDataByID']);
Route::get('/accept-status-siswa/{id}', [ApiController::class,  'acceptSiswa']);
Route::get('/slug-pemimpin', [ApiController::class,  'pemimpin']);
Route::get('/slug-pendidikan', [ApiController::class,  'pendidikans']);
Route::get('/slug-sejarah', [ApiController::class,  'sejarahs']);
Route::get('/slug-berita', [ApiController::class,  'berita']);

Route::get('/get-berita', [ApiController::class,  'getBerita']);
