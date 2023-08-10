<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obligacion;
use App\Models\contDocumento;
use App\Models\contObligacion;
use Illuminate\Support\Carbon;

class LeyContabilidadController extends Controller
{
    function change_year()
    {
        
    } 
    function mostrar()
    {   
        $añoActual = Carbon::now()->year;
        $ContDocu=contDocumento::get();
        $trimestre = 1;
        $contador=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u'];
        $obligacionCont=contObligacion::get()->where('trimestre',$trimestre)->where('año',$añoActual);
        return view('ContabilidadPortal',['obligacionCont'=>$obligacionCont,'documentoCont'=>$ContDocu,'contLetras'=>$contador]);
    }
    function trimestre($trimestre)
    {
        $añoActual = Carbon::now()->year;
        $ContDocu=contDocumento::get();
        $contador=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u'];
        $obligacionCont=contObligacion::get()->where('trimestre',$trimestre)->where('año',$añoActual);
        //$Obligaciones=contObligacion::buscarPorTrimestre($trimestre);
        if ($obligacionCont==null){
            $obligacionCont= new Obligacion();
        }
        return view('ContabilidadPortal',['obligacionCont'=>$obligacionCont,'documentoCont'=>$ContDocu,'contLetras'=>$contador]);
    }
    function mostrarAprobar()
    {   
        $añoActual = Carbon::now()->year;
        $ContDocu=contDocumento::all();
        $trimestre = 1;
        $obligacionCont=contObligacion::all()->where('trimestre',$trimestre);
        $resultado = [
            'obligacionCont' => $obligacionCont,
            'documentoCont' => $ContDocu,
        ];
        return view('aprobarContable',['resultado'=>$resultado]);
    }
    function mostrarCargar()
    {   
        // $departamento = Fragmento::distinct()
        // ->select('fragmentos.nombre')
        // ->from('fragmentos')
        // ->join('users','fragmentos.id','=','users.fragmento')
        // ->where('users.id',Auth::id())
        // ->first();
        // $fracciones = Fraccion::distinct()
        // ->select('fracciones.nombre', 'fracciones.id')
        // ->join('asig_frags', 'fracciones.id', '=', 'asig_frags.idfraccion')
        // ->join('users', 'asig_frags.idfragmento', '=', 'users.fragmento')
        // ->where('users.id', Auth::id())
        // ->where('fracciones.articulo',Session::get('ley'))
        // ->get();
        // return view('CargarFraccion', compact('fracciones','departamento'));
        
        return view('CargarContable');
    }
    public function desplegar(Request $request)
    {
        $año = $request['año'];
        $trimestre = $request['trimestre'];
        $ContDocu=contDocumento::all();
        $obligacionCont=null;

        /*
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
        */

        $resultado = [
            'obligacionCont' => $obligacionCont,
            'documentoCont' => $ContDocu,
        ];
        
        return response()->json($resultado);
    }
}
