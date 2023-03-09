<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;

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


//GET|HEAD api/v1/personasregistradas
Route::group(['prefix' => 'v1'], function () {
    Route::get('/personasregistradas',[PersonaController::class,'personasregistradas']);
});
