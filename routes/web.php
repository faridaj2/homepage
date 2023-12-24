<?php

use App\Http\Controllers\ArticleLeaderController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
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
    Route::get('/', 'index');
    Route::get('/profil-pimpinan/1', 'profilPimpinan');
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

require __DIR__ . '/auth.php';
