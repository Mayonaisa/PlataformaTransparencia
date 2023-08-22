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
use App\Models\contObligacion;
use App\Models\Obligacion;
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
//hipervinculo-----------------------------------------------------------------------------
Route::post('/hiper', [AprobarController::class,'hiper'])->name('hiper');
//ver hipervinculos------------------------------------------------------------------------
Route::post('/hipervinculo', [FraccionesController::class,'hipervinculo'])->name('hipervinculo');
//Descargar acuseAcuse---------------------------------------------------------------------------------
Route::get('/Acuse/{id}', [AprobarController::class,'Acuse'])->name('Acuse');
//Ruta para ver el diseño del acuse
Route::get('/Comprobante/{id}', [AprobarController::class,'mostrarAcuse'])->name('Comprobante');
// Ruta para cambiar el año o trimestre en contabilidad
Route::post('/ContabilidadPortal/año',[LeyContabilidadController::class,'cambiarAño'])->name('cambiarAño');
// Ruta para descargar archivos de contabilidad financiera
Route::get('/ContabilidadPortal/descarga/{id}', [DescargaController::class,'descargarCont_pdf'])->name('descargarContpdf');
//contabilidad portal
Route::get('/ContabilidadPortal', [LeyContabilidadController::class, 'mostrar'])->name('mostrar');


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
        Route::get('/CargarFraccion', [FraccionesController::class, 'FraccionesDisp'])->name('CargarFraccion');
    });
    

Route::post('/LeyContabilidad', [LeyContabilidadController::class,'change_year'])->name('change_year');
Route::post('/guardarpdf', [GuardarController::class,'guardar_pdf'])->name('guardar');
Route::get('/guardarpdf',function()
{
    return view('prueba');
});

Route::get('/PortalPrincipal',function()
    {
        return view('PortalPrincipal');
    });

Route::get('/PortalFracc/{articulo}', [FraccionesController::class,'mostrarFracciones']);

//breeze (dashboard es una vista de prueba que se usa para comprobar que se hizo login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/CargarFraccion', [FraccionesController::class, 'FraccionesDisp'])->name('CargarFraccion');
    
    Route::get('/RevisarFracciones', [FraccionesController::class,'RevisarFracc'])->name('RevisarFracciones');


    Route::prefix('ContabilidadPortal')
    ->controller(LeyContabilidadController::class)
    ->group(function()
    {
        Route::get('CargarContabilidad',[LeyContabilidadController::class,'mostrarCargar'])->name('mostrarCargar');
        Route::get('AprobarContabilidad',[LeyContabilidadController::class,'mostrarAprobar'])->name('mostrarAprobar');
        

        Route::prefix('AprobarContabilidad')
        ->group(function()
        {
            Route::get('/aprobarCont/{id}', [AprobarController::class,'aprobarCont'])->name('aprobarCont');
            Route::get('/rechazarCont/{id}', [AprobarController::class,'rechazarCont'])->name('rechazarCont');
            Route::get('/AcuseCont/{id}', [AprobarController::class,'AcuseCont'])->name('AcuseCont');
            Route::post('aprobarAño',[LeyContabilidadController::class,'aprobarAño'])->name('aprobarAño');
            Route::post('/guardararchivo', [GuardarController::class,'guardar_archivoCont'])->name('guardararchivo');
            

        });
        

    });
    
});

require __DIR__.'/auth.php';