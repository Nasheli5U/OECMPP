<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpedienteController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('expedientes', ExpedienteController::class);
Route::get('/expedientes/{expediente}/edit_estado', [ExpedienteController::class, 'edit_estado'])->name('expedientes.edit_estado');
Route::put('/expedientes/{expediente}/update_estado', [ExpedienteController::class, 'update_estado'])->name('expedientes.update_estado');
Route::get('/reportes', [ExpedienteController::class, 'reportes'])->name('expedientes.reportes');
