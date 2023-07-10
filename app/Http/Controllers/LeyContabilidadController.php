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
        
        return view('LeyGeneralContabilidad',['Obligaciones'=>$Obligaciones]);
    }
    function trimestre($trimestre)
    {
        $Obligaciones=Obligacion::buscarPorTrimestre($trimestre);
        return view('LeyGeneralContabilidad',['Obligaciones'=>$Obligaciones]);
    }
}
