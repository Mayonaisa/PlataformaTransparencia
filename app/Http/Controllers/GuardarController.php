<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Obligacion;
use App\Models\Fraccion;
use App\Models\Fragmento;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller as BaseController;

class GuardarController extends Controller
{
    // function guardar_pdf(Request $request)
    // {
    //     if($request -> hasFile('documento'))
    //     {
    //         $archivo = $request->file('documento');
    //         $idley = uniqid();
    //         $nombreArchivo = $idley .'.'.$archivo->getClientOriginalExtension();
    //         $rutaArchivo = $idley .'/'. $nombreArchivo;
    //         $archivo->storeAs('carpeta_destino', $nombreArchivo);

    //         session::flash("error","Guardado exitoso");
    //         return back()->withInput();  
    //     }
    // }
    function guardar_pdf(Request $request)
    {
        if($request -> hasFile('documento'))
        {
            $archivo = $request->file('documento');

        }
    }

    public function mostrarUsuarios() //prueba
    {
        $fracciones = Fraccion::all();
        return view('prueba', compact('fracciones'));
    }   
}