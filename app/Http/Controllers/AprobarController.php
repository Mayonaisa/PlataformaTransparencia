<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fraccion;
use App\Models\Fragmento;
use App\Models\Obligacion;
use App\Models\AsigFrag;
use App\Models\contDocumento;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\contObligacion;
//use Barryvdh\DomPDF\Facade as PDF; En caso de que no jale el anterior en laragon 5.1

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
    function hiper(Request $request)
    {
        $id = $request['id'];
        $valor = $request['valor'];

        $registro = Obligacion::findOrFail($id);
        $registro->hipervinculo = $valor;
        $registro->save();
        
        return response()->json(['mensaje' => 'cambio de hipervinculo']);
    }

    function aprobarCont($id)
    {
        $registro = contObligacion::findOrFail($id);
        $registro->estado = 'aprobado';

        $registro->save();
        //return $this->mostrar();
        return Redirect::back();
    }
    function rechazarCont($id)
    {
        $registro = contObligacion::findOrFail($id);
        $registro->estado = 'rechazado';

        $registro->save();
        return Redirect::back();
    }
    public function mostrarAcuse(Request $request)
    {
        $id=$request['id'];
        $obligacion=Obligacion::where('id',$id)->first();
        $fraccion=Fraccion::where('id',$obligacion->fraccion)->first();
        $sujeto=Fragmento::where('id',$obligacion->fragmento)->first();
        preg_match('/\b[I|V|X]+/', $fraccion->nombre, $matches);
        $result=$matches[0];
        return view('pdf.Comprobante',['obligacion'=>$obligacion,'fraccion'=>$fraccion,'sujeto'=>$sujeto,'result'=>$result]);
    }
    public function Acuse($id)
    {
        $usuario = User::distinct()
        ->select('users.name')
        ->from('users')
        ->where('users.id',Auth::id())
        ->first();

        $obligacion=Obligacion::where('id',$id)->first();
        $fraccion=Fraccion::where('id',$obligacion->fraccion)->first();
        $sujeto=Fragmento::where('id',$obligacion->fragmento)->first();
        preg_match('/\b[I|V|X]+/', $fraccion->nombre, $matches);
        $result=$matches[0];
        $pdf = Pdf::loadView('pdf.comprobante',compact('obligacion','fraccion','sujeto','result','usuario'))->setPaper('a4');
        return $pdf->stream('comprobante.pdf');
    }
    public function AcuseCont($id)
    {
        $usuario = User::distinct()
        ->select('users.name')
        ->from('users')
        ->where('users.id',Auth::id())
        ->first();

        $obligacion=contObligacion::where('id',$id)->first();
        $ContDoc=contDocumento::where('id',$obligacion->cont_documento)->first();
        $sujeto=Fragmento::where('id',$obligacion->fragmento)->first();
        $result=$ContDoc->nombre;
        $pdf = Pdf::loadView('pdf.comprobanteCont',compact('obligacion','ContDoc','sujeto','result','usuario'))->setPaper('a4');
        
        return $pdf->stream('comprobanteCont.pdf');
    }
    
}
