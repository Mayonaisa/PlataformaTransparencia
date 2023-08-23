<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obligacion;
use App\Models\contDocumento;
use App\Models\contObligacion;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LeyContabilidadController extends Controller
{
    function cambiarAño(Request $request)
    {

        $trimestre = $request['trimestre'];
        $año = $request['year'];
        $ContDocu=ContDocumento::distinct()
        ->select('cont_documentos.id', 'cont_documentos.nombre', 'cont_documentos.tipo', 'cont_documentos.created_at')
        ->join('cont_obligaciones', 'cont_documentos.id', '=', 'cont_obligaciones.cont_documento')
        ->where('cont_obligaciones.trimestre', $trimestre)
        ->where('cont_obligaciones.año', $año)
        ->where('cont_obligaciones.estado', "aprobado")
        ->where('cont_obligaciones.hipervinculo', "N")
        ->orderBy('cont_documentos.id')
        ->get();
        $contador=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u'];
        $obligacionCont=contObligacion::get()->where('trimestre',$trimestre)->where('año',$año)->where('estado','aprobado')->where('hipervinculo','N');
        
        if ($obligacionCont==null){
            $obligacionCont= new Obligacion();
        }
        return view('ContabilidadPortal',['obligacionCont'=>$obligacionCont,'documentoCont'=>$ContDocu,'contLetras'=>$contador,'año'=>$año]);

    }
    function aprobarAño(Request $request)
    {
        $trimestre = $request['trimestre'];
        $año = $request['year'];
        $ContDocu=ContDocumento::distinct()
        ->select('cont_documentos.id', 'cont_documentos.nombre', 'cont_documentos.tipo', 'cont_documentos.created_at')
        ->join('cont_obligaciones', 'cont_documentos.id', '=', 'cont_obligaciones.cont_documento')
        ->where('cont_obligaciones.trimestre', $trimestre)
        ->where('cont_obligaciones.año', $año)
        ->where('cont_obligaciones.estado', "subido")
        ->orderBy('cont_documentos.id')
        ->get();
        $contador=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u'];
        $obligacionCont=contObligacion::get()->where('trimestre',$trimestre)->where('año',$año)->where('estado','subido');
        if ($obligacionCont==null){
            $obligacionCont= new Obligacion();
        }
        return view('aprobarContable',['obligacionCont'=>$obligacionCont,'documentoCont'=>$ContDocu,'contLetras'=>$contador,'año'=>$año ]);
    }  
    function mostrar()
    {   
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

        $año = Carbon::now()->year;
        $ContDocu=ContDocumento::distinct()
        ->select('cont_documentos.id', 'cont_documentos.nombre', 'cont_documentos.tipo', 'cont_documentos.created_at')
        ->join('cont_obligaciones', 'cont_documentos.id', '=', 'cont_obligaciones.cont_documento')
        ->get();
        $trimestre = 1;
        $contador=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u'];
        $obligacionCont=contObligacion::get()->where('trimestre',$trimestre)->where('año',$año)->where('estado','aprobado');
        return view('ContabilidadPortal',['obligacionCont'=>$obligacionCont,'documentoCont'=>$ContDocu,'contLetras'=>$contador,'año'=>$año ]);
    }
    /*
    function trimestre($trimestre)
    {
        $año = 2023;
        $ContDocu=ContDocumento::distinct()
        ->select('cont_documentos.id', 'cont_documentos.nombre', 'cont_documentos.tipo', 'cont_documentos.created_at')
        ->join('cont_obligaciones', 'cont_documentos.id', '=', 'cont_obligaciones.cont_documento')
        ->where('cont_obligaciones.trimestre', $trimestre)
        ->where('cont_obligaciones.año', $año)
        ->orderBy('cont_documentos.id')
        ->get();
        $contador=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u'];
        $obligacionCont=contObligacion::get()->where('trimestre',$trimestre)->where('año',$año)->where('estado','aprobado');
        if ($obligacionCont==null){
            $obligacionCont= new Obligacion();
        }
        return view('ContabilidadPortal',['obligacionCont'=>$obligacionCont,'documentoCont'=>$ContDocu,'contLetras'=>$contador,'año'=>$año]);
    }
    function trimestreCont($trimestre, Request $request)
    {
        $año = $request['year'];
        $ContDocu=ContDocumento::distinct()
        ->select('cont_documentos.id', 'cont_documentos.nombre', 'cont_documentos.tipo', 'cont_documentos.created_at')
        ->join('cont_obligaciones', 'cont_documentos.id', '=', 'cont_obligaciones.cont_documento')
        ->where('cont_obligaciones.trimestre', $trimestre)
        ->where('cont_obligaciones.año', $año)
        ->orderBy('cont_documentos.id')
        ->get();
        $contador=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u'];
        $obligacionCont=contObligacion::get()->where('trimestre',$trimestre)->where('año',$año)->where('estado','subido');
        if ($obligacionCont==null){
            $obligacionCont= new Obligacion();
        }
        return view('aprobarContable',['obligacionCont'=>$obligacionCont,'documentoCont'=>$ContDocu,'contLetras'=>$contador,'año'=>$año]);
    }
    */
    function mostrarAprobar()
    {   
        $año = Carbon::now()->year;
        $ContDocu=ContDocumento::distinct()
        ->select('cont_documentos.id', 'cont_documentos.nombre', 'cont_documentos.tipo', 'cont_documentos.created_at')
        ->join('cont_obligaciones', 'cont_documentos.id', '=', 'cont_obligaciones.cont_documento')
        ->get();
        $trimestre = 1;
        $contador=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u'];
        $obligacionCont=contObligacion::get()->where('trimestre',$trimestre)->where('año',$año)->where('estado','subido');
        return view('aprobarContable',['obligacionCont'=>$obligacionCont,'documentoCont'=>$ContDocu,'contLetras'=>$contador, 'año'=>$año]);
        
    }
    function mostrarCargar()
    {   
        $contDoc=contDocumento::all();
        return view('CargarContable',['contDoc'=>$contDoc]);
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
