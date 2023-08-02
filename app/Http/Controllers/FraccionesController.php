<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fraccion;
use App\Models\Fragmento;
use App\Models\Obligacion;
use App\Models\AsigFrag;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class FraccionesController extends Controller
{
    public function mostrarFracciones() //prueba
    {
        $fracciones = Fraccion::all();
        return view('ConsultarFracciones', compact('fracciones'));
    }
    public function FraccionesDisp()
    {
        $departamento = Fragmento::distinct()
        ->select('fragmentos.nombre')
        ->from('fragmentos')
        ->join('users','fragmentos.id','=','users.fragmento')
        ->where('users.id',Auth::id())
        ->first();
        $fracciones = Fraccion::distinct()
        ->select('fracciones.nombre', 'fracciones.id')
        ->join('asig_frags', 'fracciones.id', '=', 'asig_frags.idfraccion')
        ->join('users', 'asig_frags.idfragmento', '=', 'users.fragmento')
        ->where('users.id', Auth::id())
        ->get();
        return view('CargarFraccion', compact('fracciones','departamento'));
    }
    public function desplegar(Request $request)
    {
        $id = $request['fraccion_id'];
        $obligacion = Obligacion::distinct()
        ->select('id','nombre','descripcion','archivo','updated_at','fragmento')
        ->from('obligaciones')
        ->where('fraccion',$id)
        ->get();

        $fragmento = Fragmento::distinct()
        ->select('fragmentos.nombre','fragmentos.id')
        ->from('fragmentos')
        ->join('obligaciones','fragmentos.id','=','obligaciones.fragmento')
        ->where('obligaciones.fraccion',$id)
        ->get();
        //return view('ConsultarFracciones', compact('obligacion','fragmento'));
        $resultado = [
            'obligacion' => $obligacion,
            'fragmento' => $fragmento,
        ];
        return response()->json($resultado);
    }
}