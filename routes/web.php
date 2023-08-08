<?php

use App\Http\Controllers\AprobarController;
use App\Http\Controllers\DescargaController;
use Illusminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuardarController;
use App\Http\Controllers\FraccionesController;
use App\Http\Controllers\LeyContabilidadController;

//
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\SubirObligacionController;
use Illuminate\Support\Carbon;

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
Route::get('/prueba',function()
{
    $añoActual = Carbon::now()->year;
    return view('prueba', compact('añoActual'));
})->middleware(['auth'])->name('prueba'); //esto ultimo es para enviar al login en caso de no existir una sesión
Route::get('/prueba', [GuardarController::class,'mostrarUsuarios']); //prueba

Route::get('/inicio',function()
{
    return view('inicio');
})->middleware(['auth'])->name('inicio');

Route::post('guardarpdf', [GuardarController::class,'guardar_pdf'])->name('guardar');

//subir archivo----------------------------------------------------------------------------
Route::post('/guardararchivo', [GuardarController::class,'guardar_archivo'])->name('guardararchivo');
//mostrar las obligaciones-----------------------------------------------------------------
Route::post('/desplegar', [FraccionesController::class,'desplegar'])->name('desplegar');
//descarga---------------------------------------------------------------------------------
Route::get('/descarga/{id}', [DescargaController::class,'descargar_pdf'])->name('descargarpdf');

//aprovar----------------------------------------------------------------------------------
Route::get('/aprobar/{id}', [AprobarController::class,'aprobar'])->name('aprobar');
//rechazar---------------------------------------------------------------------------------
Route::get('/rechazar/{id}', [AprobarController::class,'rechazar'])->name('rechazar');

Route::prefix('ContabilidadPortal')
    ->controller(LeyContabilidadController::class)
    ->group(function()
    {
        Route::get('/', 'mostrar')->name('mostrar');
        Route::get('trimestre{trimestre}',[LeyContabilidadController::class,'trimestre'])->name('trimestre');
        //Route::get('/descarga/{id}', [DescargaController::class,'descargar_pdf'])->name('descargarpdf');
        //Route::get('/descarga/{archivo}', [DescargaController::class,'descargar_pdf'])->name('descargarpdf');
    });

// Route::prefix('aprobar')
//     ->controller(AprobarController::class)
//     ->group(function()
//     {
//         Route::get('/', 'mostrar')->name('mostrar');
//     });
// Route::prefix('PortalFracciones')
//     ->controller(SubirObligacionController::class)
//     ->group(function()
//     {
//         Route::get('/', 'mostrar')->name('mostrar');
//     });
    
    Route::get('/TransparenciaPagina',function()
    {
        return view('TransparenciaPiePagina');
    });
    Route::get('/PortalCabecera',function()
    {
        return view('PortalCabecera');
    });
    Route::get('/prueba2',function()
    {
        return view('prueba2');
    });
    
    Route::middleware('auth')->group(function () {
        //consultar fracciones---------------------------------------------------------------
        Route::get('/RevisarFracciones',function()
        {
            return view('RevisarFracciones');
        });
        Route::get('/RevisarFracciones', [FraccionesController::class,'RevisarFracciones']);
        //subir fracciones---------------------------------------------------------------
        // Route::get('/CargarFraccion', function () {
        //          return view('CargarFraccion');
        //      })->name('CargarFraccion');
        // Route::get('/CargarFraccion', [FraccionesController::class,'FraccionesDisp'])->name('CargarDatos');
        Route::get('/CargarFraccion', [FraccionesController::class, 'FraccionesDisp'])->name('CargarFraccion');
    });
    

Route::post('/LeyContabilidad', [LeyContabilidadController::class,'change_year'])->name('change_year');
Route::post('/guardarpdf', [GuardarController::class,'guardar_pdf'])->name('guardar');
Route::get('/guardarpdf',function()
{
    return view('prueba');
});

//breeze (dashboard es una vista de prueba que se usa para comprobar que se hizo login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //consultar fracciones---------------------------------------------------------------
    // Route::get('/PortalFracc',function()
    // {
    //     return view('ConsultarFracciones');
    // });
    Route::get('/PortalFracc/{articulo}', [FraccionesController::class,'mostrarFracciones']);
    //subir fracciones---------------------------------------------------------------
    Route::get('/CargarFraccion', [FraccionesController::class, 'FraccionesDisp'])->name('CargarFraccion');
    
    Route::get('/RevisarFracciones', [FraccionesController::class,'RevisarFracc'])->name('RevisarFracciones');

    //Route::get('/AprobarObligacion', [AprobarController::class, 'mostrar'])->name('AprobarObligacion');
    //principal
    Route::get('/PortalPrincipal',function()
    {
        return view('PortalPrincipal');
    });
});

require __DIR__.'/auth.php';