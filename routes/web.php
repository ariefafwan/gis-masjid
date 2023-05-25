<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, 'welcome'])->name('welcome');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    //masjid
    Route::get('/content', [AdminController::class, 'index'])->name('masjid');
    Route::get('/tambahmasjid', [AdminController::class, 'createmasjid'])->name('createmasjid');
    Route::post('/tambahmasjid', [AdminController::class, 'storemasjid'])->name('storemasjid');
    Route::get('/showmasjid/{id}', [AdminController::class, 'showmasjid'])->name('showmasjid');
    Route::get('/editmasjid/{id}', [AdminController::class, 'editmasjid'])->name('editmasjid');
    Route::post('/editmasjid/{id}/update', [AdminController::class, 'updatemasjid'])->name('updatemasjid');
    Route::post('/editmasjid/{id}/destroy', [AdminController::class, 'destroymasjid'])->name('destroymasjid');
    //kegitan
    Route::get('/kegiatan/{id}', [AdminController::class, 'kegiatan'])->name('ckegiatan');
    Route::post('/kegitan', [AdminController::class, 'storekegiatan'])->name('skegiatan');
    Route::get('/kegiatan/edit/{id}', [AdminController::class, 'editkegiatan'])->name('ekegiatan');
    Route::post('/kegiatan/edit/{id}/update', [AdminController::class, 'updatekegiatan'])->name('ukegiatan');
    Route::post('/kegiatan/{id}/destroy', [AdminController::class, 'destroykegiatan'])->name('dkegiatan');
    //foto
    Route::get('/foto/{id}', [AdminController::class, 'foto'])->name('cfoto');
    Route::post('/foto', [AdminController::class, 'storefoto'])->name('sfoto');
    Route::get('/foto/edit/{id}', [AdminController::class, 'editfoto'])->name('efoto');
    Route::post('/foto/edit/{id}/update', [AdminController::class, 'updatefoto'])->name('ufoto');
    Route::post('/foto/{id}/destroy', [AdminController::class, 'destroyfoto'])->name('dfoto');
    //fasilanak
    Route::get('/fasilanak/{id}', [AdminController::class, 'fasilanak'])->name('cfasilanak');
    Route::post('/fasilanak', [AdminController::class, 'storefasilanak'])->name('sfasilanak');
    Route::get('/fasilanak/edit/{id}', [AdminController::class, 'editfasilanak'])->name('efasilanak');
    Route::post('/fasilanak/edit/{id}/update', [AdminController::class, 'updatefasilanak'])->name('ufasilanak');
    Route::post('/fasilanak/{id}/destroy', [AdminController::class, 'destroyfasilanak'])->name('dfasilanak');
    //fasilumum
    Route::get('/fasilumum/{id}', [AdminController::class, 'fasilumum'])->name('cfasilumum');
    Route::post('/fasilumum', [AdminController::class, 'storefasilumum'])->name('sfasilumum');
    Route::get('/fasilumum/edit/{id}', [AdminController::class, 'editfasilumum'])->name('efasilumum');
    Route::post('/fasilumum/edit/{id}/update', [AdminController::class, 'updatefasilumum'])->name('ufasilumum');
    Route::post('/fasilumum/{id}/destroy', [AdminController::class, 'destroyfasilumum'])->name('dfasilumum');
    //fasildisabilitas
    Route::get('/fasildisabilitas/{id}', [AdminController::class, 'fasildisabilitas'])->name('cfasildisabilitas');
    Route::post('/fasildisabilitas', [AdminController::class, 'storefasildisabilitas'])->name('sfasildisabilitas');
    Route::get('/fasildisabilitas/edit/{id}', [AdminController::class, 'editfasildisabilitas'])->name('efasildisabilitas');
    Route::post('/fasildisabilitas/edit/{id}/update', [AdminController::class, 'updatefasildisabilitas'])->name('ufasildisabilitas');
    Route::post('/fasildisabilitas/{id}/destroy', [AdminController::class, 'destroyfasildisabilitas'])->name('dfasildisabilitas');
    //pimpinan
    Route::get('/pimpinan/{id}', [AdminController::class, 'pimpinan'])->name('cpimpinan');
    Route::post('/pimpinan', [AdminController::class, 'storepimpinan'])->name('spimpinan');
    Route::get('/pimpinan/edit/{id}', [AdminController::class, 'editpimpinan'])->name('epimpinan');
    Route::post('/pimpinan/edit/{id}/update', [AdminController::class, 'updatepimpinan'])->name('upimpinan');
    Route::post('/pimpinan/edit/{id}/destroy', [AdminController::class, 'destroypimpinan'])->name('dpimpinan');
    //json
    Route::get('getmasjid/masjid', [AdminController::class, 'masjid']);
});
