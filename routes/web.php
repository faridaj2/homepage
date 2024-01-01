<?php

use App\Http\Controllers\ArticleLeaderController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\SejarahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(Controller::class)->group(function () {
    Route::get('warta/{id}', 'GetWarta');
    Route::get('warta', 'Warta');
    Route::get('sejarah/{id}', 'Sejarah');
    Route::get('pendidikan/{id}', 'Pendidikan');
    Route::get('profil-pimpinan/{id}', 'profilPimpinan');
    Route::get('/', 'index');
    Route::get('/login', 'login');
    Route::get('/register', 'register');
});

Route::middleware('auth')->controller(DashboardController::class)->group(function () {
    Route::get('/dashboard/pemimpin', 'pemimpin')->name('pemimpin');
    Route::get('dashboard', 'index')->name('dashboard');
});

Route::resource('/dashboard/article-leader', ArticleLeaderController::class)->middleware('auth');
Route::resource('/dashboard/pendidikan', PendidikanController::class)->middleware('auth')->names([
    'index' => 'pendidikan'
]);
Route::resource('/dashboard/sejarah', SejarahController::class)->middleware('auth')->names([
    'index' => 'sejarah'
]);
Route::resource('/dashboard/berita', BeritaController::class)->middleware('auth')->names([
    'index' => 'berita'
]);
Route::resource('/dashboard/file', FileController::class)->middleware('auth')->names([
    'index' => 'file'
]);

require __DIR__ . '/auth.php';
