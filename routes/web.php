<?php

use App\Http\Controllers\DescargaController;
use Illusminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuardarController;
use App\Http\Controllers\LeyContabilidadController;

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

Route::post('/LeyContabilidad', [LeyContabilidadController::class,'change_year'])->name('change_year');
Route::post('/guardarpdf', [GuardarController::class,'guardar_pdf'])->name('guardar');
Route::get('/guardarpdf',function()
{
    return view('prueba');
});