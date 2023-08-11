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
    public function mostrarFracciones($articulo) //prueba
    {
        Session::put('ley', $articulo);
        //$fracciones = Fraccion::all();

        $fracciones = Fraccion::distinct()
        ->select('fracciones.nombre','fracciones.id')
        ->from('fracciones')
        ->where('fracciones.articulo',$articulo)
        ->get();
        // $nombre = array("adaw", "adwd", "adwd", "awdwad");
        // $id = array(1, 2, 3, 4);
        // $algo = "no";
        // if (Session::has('ley')) {
        //     $algo = "si";
        // }
        // $variablesDeSesion = Session::all();

        // $fracciones = array_keys($variablesDeSesion);

        if (Auth::id() != null) {
            $usuario = User::distinct()
            ->select('users.rol_id')
            ->from('users')
            ->where('users.id',Auth::id())
            ->first();

            Session::put('rol', $usuario->rol_id);
        }
        else
        {
            Session::put('rol', 6);
        }

        return view('ConsultarFracciones', compact('fracciones'));
    }
    public function RevisarFracc() //prueba
    {
        //$fracciones = Fraccion::all();
        $fracciones = Fraccion::distinct()
        ->select('fracciones.nombre', 'fracciones.id')
        ->join('asig_frags', 'fracciones.id', '=', 'asig_frags.idfraccion')
        ->join('users', 'asig_frags.idfragmento', '=', 'users.fragmento')
        ->where('users.id', Auth::id())
        ->where('fracciones.articulo',Session::get('ley'))
        ->get();

        $rol = Session::get('rol');

        if($rol == 2)
        {
            return view('RevisarFracciones', compact('fracciones'))->with('articulo',Session::get('ley'));
        }
        elseif($rol == 3)
        {
            return view('PortalPrincipal');
        }
        elseif($rol == 1)
        {
            $fracciones = Fraccion::distinct()
            ->select('fracciones.nombre','fracciones.id')
            ->from('fracciones')
            ->where('fracciones.articulo',Session::get('ley'))
            ->get();
            return view('RevisarFracciones', compact('fracciones'))->with('articulo',Session::get('ley'));
        }
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
        ->where('fracciones.articulo',Session::get('ley'))
        ->get();
        return view('CargarFraccion', compact('fracciones','departamento'));
    }
    public function desplegar(Request $request)
    {
        $tipo = $request['tipo'];
        $id = $request['fraccion_id'];
        $obligacion = Obligacion::distinct()
        ->select('id','nombre','descripcion','archivo','updated_at','fragmento')
        ->from('obligaciones')
        ->where('fraccion',$id)
        ->where('estado', $tipo)
        ->get();
        $fragmento = Fragmento::distinct()
        ->select('fragmentos.nombre','fragmentos.id')
        ->from('fragmentos')
        ->join('obligaciones','fragmentos.id','=','obligaciones.fragmento')
        ->where('obligaciones.fraccion',$id)
        ->where('obligaciones.estado',$tipo)
        ->get();
        $resultado = [
            'obligacion' => $obligacion,
            'fragmento' => $fragmento,
        ];
        
        return response()->json($resultado);
        // $id = $request['fraccion_id'];
        // $obligacion = Obligacion::distinct()
        // ->select('id','nombre','descripcion','archivo','updated_at','fragmento')
        // ->from('obligaciones')
        // ->where('fraccion',$id)
        // ->get();

        // $fragmento = Fragmento::distinct()
        // ->select('fragmentos.nombre','fragmentos.id')
        // ->from('fragmentos')
        // ->join('obligaciones','fragmentos.id','=','obligaciones.fragmento')
        // ->where('obligaciones.fraccion',$id)
        // ->get();
        // $resultado = [
        //     'obligacion' => $obligacion,
        //     'fragmento' => $fragmento,
        // ];
        // return response()->json($resultado);
    }
}