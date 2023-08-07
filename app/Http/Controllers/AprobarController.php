<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fraccion;
use App\Models\Fragmento;
use App\Models\Obligacion;
use App\Models\AsigFrag;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AprobarController extends Controller
{
    function mostrar()
    {   
        $fracciones = Fraccion::distinct()
        ->select('fracciones.nombre', 'fracciones.id')
        ->join('asig_frags', 'fracciones.id', '=', 'asig_frags.idfraccion')
        ->join('users', 'asig_frags.idfragmento', '=', 'users.fragmento')
        ->where('users.id', Auth::id())
        ->get();
        return view('aprobar', compact('fracciones'));
    }
    function aprobar($id)
    {
        $registro = Obligacion::findOrFail($id);
        $registro->estado = 'aprobado';

        $registro->save();
        //return $this->mostrar();
        return Redirect::back();
    }
    function rechazar($id)
    {
        $registro = Obligacion::findOrFail($id);
        $registro->estado = 'rechazado';

        $registro->save();
        return Redirect::back();
    }
}
