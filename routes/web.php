<?php

use App\Http\Controllers\ArticleLeaderController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FileUserInputController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\pspdb;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\UserInputController;

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

// Homepaeg Route Resource
Route::controller(Controller::class)->group(function () {

    Route::get('kontak', 'kontak');
    Route::get('pendaftaran', 'pendaftaran');
    Route::get('warta/{id}', 'GetWarta');
    Route::get('warta', 'Warta');
    Route::get('sejarah/{id}', 'Sejarah');
    Route::get('pendidikan/{id}', 'Pendidikan');
    Route::get('profil-pimpinan/{id}', 'profilPimpinan');
    Route::get('/', 'index');
    Route::get('/login', 'login');
    Route::get('/register', 'register');
    Route::get('/privacy', function () {
        return view('page/privacy');
    });
});
// PSPDB Route resource
Route::resource('/pspdb/dokumen-pendukung', FileUserInputController::class)->names(['index' => 'dokumen'])->middleware('auth');
Route::resource('/pspdb', UserInputController::class)->names(['index' => 'pspdb'])->middleware('auth');


// Dashboard Route resource
Route::middleware(['auth', 'checkRole:admin'])->controller(DashboardController::class)->group(function () {
    Route::get('/dashboard/pemimpin', 'pemimpin')->name('pemimpin');
    Route::get('dashboard', 'index')->name('dashboard');
    Route::resource('/dashboard/article-leader', ArticleLeaderController::class);
    Route::resource('/dashboard/pendidikan', PendidikanController::class)->names([
        'index' => 'pendidikan'
    ]);
    Route::resource('/dashboard/sejarah', SejarahController::class)->names([
        'index' => 'sejarah'
    ]);
    Route::resource('/dashboard/berita', BeritaController::class)->names([
        'index' => 'berita'
    ]);
    Route::resource('/dashboard/file', FileController::class)->names([
        'index' => 'file'
    ]);
    Route::resource('/dashboard/info-pendaftaran', PendaftaranController::class)->names([
        'index' => 'pendaftaran'
    ]);
    Route::resource('/dashboard/kontak', KontakController::class)->names([
        'index' => 'kontak'
    ]);
    Route::resource('/dashboard/pspdb', pspdb::class)->names([
        'index' => 'pspdb'
    ]);
});

// Google Login ROute
Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

// Auth
require __DIR__ . '/auth.php';
