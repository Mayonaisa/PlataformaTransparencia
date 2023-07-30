<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obligacion;


class LeyContabilidadController extends Controller
{
    function change_year()
    {
        
    } 
    function mostrar()
    {   
        $Obligaciones=Obligacion::buscarPorTrimestre('1');
        return view('ContabilidadPortal',['Obligaciones'=>$Obligaciones]);
    }
    function trimestre($trimestre)
    {
        $Obligaciones=Obligacion::buscarPorTrimestre($trimestre);
        if ($Obligaciones==null){
            $Obligaciones= new Obligacion();
        }
        return view('ContabilidadPortal',['Obligaciones'=>$Obligaciones]);
    }
}
