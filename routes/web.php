<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //masjid
    Route::get('/content', [AdminController::class, 'index'])->name('masjid');
    Route::get('/tambahmasjid', [AdminController::class, 'createmasjid'])->name('createmasjid');
    Route::post('/tambahmasjid', [AdminController::class, 'storemasjid'])->name('storemasjid');
    Route::get('/editmasjid/{id}', [AdminController::class, 'editmasjid'])->name('editmasjid');
    Route::post('/editmasjid/{id}/update', [AdminController::class, 'updatemasjid'])->name('updatemasjid');
    Route::post('/editmasjid/{id}/destroy', [AdminController::class, 'destroymasjid'])->name('destroymasjid');
    //kegitan
    Route::get('/kegiatan', [AdminController::class, 'kegitan'])->name('ckegitan');
    Route::post('/kegitan', [AdminController::class, 'storekegitan'])->name('skegitan');
    //foto
    Route::get('/foto', [AdminController::class, 'foto'])->name('cfoto');
    Route::post('/foto', [AdminController::class, 'storefoto'])->name('sfoto');
    //dokumen
    Route::get('/dokumen', [AdminController::class, 'dokumen'])->name('cdokumen');
    Route::post('/dokumen', [AdminController::class, 'storedokumen'])->name('sdokumen');
    //fasilanak
    Route::get('/fasilanak', [AdminController::class, 'fasilanak'])->name('cfasilanak');
    Route::post('/fasilanak', [AdminController::class, 'storefasilanak'])->name('sfasilanak');
    //fasilumum
    Route::get('/fasilumum', [AdminController::class, 'fasilumum'])->name('cfasilumum');
    Route::post('/fasilumum', [AdminController::class, 'storefasilumum'])->name('sfasilumum');
    //fasildisabilitas
    Route::get('/fasildisabilitas', [AdminController::class, 'fasildisabilitas'])->name('cfasildisabilitas');
    Route::post('/fasildisabilitas', [AdminController::class, 'storefasildisabilitas'])->name('sfasildisabilitas');
    //pimpinan
    Route::get('/pimpinan', [AdminController::class, 'pimpinan'])->name('cpimpinan');
    Route::post('/pimpinan', [AdminController::class, 'storepimpinan'])->name('spimpinan');
    //sejarah
    Route::get('/sejarah', [AdminController::class, 'sejarah'])->name('csejarah');
    Route::post('/sejarah', [AdminController::class, 'storesejarah'])->name('ssejarah');
    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
