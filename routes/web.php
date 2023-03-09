<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\PersonaVehiculoController;

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

Route::get('personas', [PersonaController::class, 'index'])->name('personas.index');
Route::get('personas/{person}', [PersonaController::class, 'destroy'])->name('personas.destroy');
Route::get('vehiculos/{vehicle}', [VehiculoController::class, 'destroy'])->name('vehiculos.destroy');
Route::resource('people', PersonaController::class);
Route::resource('vehicle', VehiculoController::class);
Route::post('listarvehiculos', [VehiculoController::class, 'listarvehiculos'])->name('listarvehiculos');
Route::put('cambiarpropietario/{vehicle}', [PersonaVehiculoController::class, 'cambiarpropietario'])->name('cambiarpropietario');
Route::get('personasvehiculos/{person}/{vehicle}/edit', [PersonaVehiculoController::class, 'edit'])->name('personasvehiculos.edit');
Route::resource('peoplevehicle', PersonaVehiculoController::class);