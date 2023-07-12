<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller as BaseController;

class GuardarController extends Controller
{
    function guardar_pdf(Request $request)
    {
        if($request -> hasFile('documento'))
        {
            $archivo = $request->file('documento');
            $idley = uniqid();
            $nombreArchivo = $idley .'.'.$archivo->getClientOriginalExtension();
            $rutaArchivo = $idley .'/'. $nombreArchivo;
            $archivo->storeAs('carpeta_destino', $nombreArchivo);

            session::flash("error","Guardado exitoso");
            return back()->withInput();
            //return redirect()->back()->with('flash_message_success', 'Product Images has been added successfully');   
        }
        //return view('prueba');
    }   
}