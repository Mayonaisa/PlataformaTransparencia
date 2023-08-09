<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\RequestGuardar;
use App\Models\User;
use App\Models\Obligacion;
use App\Models\Fraccion;
use App\Models\Fragmento;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
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
    function guardar_pdf(Request $request)//prueba
    {
        if($request -> hasFile('documento'))
        {
            $archivo = $request->file('documento');

        }
    }
    function guardar_archivo(RequestGuardar $request)
    {
        echo("prueba");
        $nombre = Fragmento::distinct()
        ->select('fragmentos.nombre')
        ->from('fragmentos')
        ->join('users','fragmentos.id','=','users.fragmento')
        ->where('users.id',Auth::id())
        ->first();
        $fragmento = Fragmento::distinct()
        ->select('fragmentos.id')
        ->from('fragmentos')
        ->join('users','fragmentos.id','=','users.fragmento')
        ->where('users.id',Auth::id())
        ->first();

        $valor = Session::get('ley');

        $obligacion = new Obligacion(); //a lo mejor luego se tiene que modificar la migración para agregar un campo de ruta
        $obligacion->nombre = $request['titulo'];
        $obligacion->descripcion = $request['descripcion'];
        $obligacion->trimestre = 0;
        $obligacion->año = 0;
        $obligacion->fragmento = $fragmento->id;
        $obligacion->fraccion = $request['fraccion_id'];
        // if (Session::has('ley'))
        // {
        //     $obligacion->articulo = 76;
        // }
        // else
        // {
        //     $obligacion->articulo = 75;
        // }
        //$obligacion->articulo = strval($valor); //temporal, luego seria un session articulo
        $obligacion->articulo = $request['articulo'];
        $obligacion->user_id = Auth::id();
        $obligacion->created_at = Carbon::now()->toDateTimeString();
        $obligacion->updated_at = Carbon::now()->toDateTimeString();
        $obligacion->archivo = $request->file('documento')->getClientOriginalName();
        $obligacion->direccion = 'articulo '.($obligacion->articulo).'/fraccion '.($obligacion->fraccion).'/departamento '.$nombre->nombre;
        $obligacion->save();
        
        
        if($request -> hasFile('documento'))
        {
            $archivo = $request->file('documento');
            $ruta = $obligacion->direccion;
            //$archivo->storeAs($ruta, ($obligacion->nombre).'.pdf');
            $archivo->storeAs($ruta, $request->file('documento')->getClientOriginalName());
        }

        Session::flash("error","Registro exitoso.");
        return back()->withInput();

    }

    public function mostrarUsuarios() //prueba
    {
        $fracciones = Fraccion::all();
        return view('prueba', compact('fracciones'));
    }   
}