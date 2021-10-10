<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();
Route::get('/dashboard',[App\Http\Controllers\DashboardController::class, 'index']);
Route::group(['middleware' => ['role:admin|pelayan']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/menu/{category}',[App\Http\Controllers\HomeController::class, 'menu']);
    Route::get('/menu/lihat-pesanan',[App\Http\Controllers\HomeController::class, 'lihat_pesanan']);
    Route::post('/menu/bayar',[App\Http\Controllers\HomeController::class, 'bayar']);
    Route::get('/status-pesan',[App\Http\Controllers\HomeController::class, 'status_pesan']);
});
    
Route::group(['middleware' => ['role:admin|kasir']], function () {
    Route::get('/proses-pesanan/bayar', [App\Http\Controllers\KasirController::class, 'bayarPesanan']);
    Route::get('/proses-pesanan/bayar/cash/{nps}', [App\Http\Controllers\KasirController::class, 'bayarCash']);
    Route::get('/proses-pesanan', [App\Http\Controllers\KasirController::class, 'index']);
    Route::get('/proses-pesanan/delete/{id}', [App\Http\Controllers\KasirController::class, 'delete_pesanan']);
    Route::get('/proses-pesanan/selesai/{id}', [App\Http\Controllers\KasirController::class, 'pesananSelesai']);

});



