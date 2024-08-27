<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\ComprobanteController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProcedenciaController;
use App\Http\Controllers\InfraccionController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\DetallePagoController;

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

Route::resource('personas', PersonaController::class);
Route::resource('procedencias', ProcedenciaController::class);
Route::resource('infracciones', InfraccionController::class);
Route::resource('expedientes', ExpedienteController::class);
Route::resource('archivos', ArchivoController::class);
Route::resource('pagos', PagoController::class);
Route::resource('comprobantes', ComprobanteController::class);
Route::resource('detalles', DetallePagoController::class);
Route::resource('pagos', PagoController::class);

Route::get('/expedientes/{expediente}/edit_estado', [ExpedienteController::class, 'editEstado'])->name('expedientes.edit_estado');
Route::patch('/expedientes/{expediente}/update_estado', [ExpedienteController::class, 'updateEstado'])->name('expedientes.update_estado');

// Ruta para actualizar el estado del expediente

Route::get('/expedientes/reportes', [ExpedienteController::class, 'mostrarReportes'])->name('reportes');

// web.php

// Rutas para comprobantes
Route::patch('/expedientes/{expediente}/edit_estado', [ExpedienteController::class, 'editEstado'])->name('expedientes.edit_estado');
Route::get('/comprobantes/create/{id_expediente}', [ComprobanteController::class, 'create'])->name('comprobantes.create');
Route::post('/comprobantes', [ComprobanteController::class, 'store'])->name('comprobantes.store');
