<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obligacion;
use App\Models\contDocumento;
use App\Models\contObligacion;

class ContObligacionController extends Controller
{
    function mostrarAprobar()
    {   
        $Obligaciones=Obligacion::buscarPorTrimestre('1');
        return view('ContabilidadPortal',['Obligaciones'=>$Obligaciones]);
    }
    function mostrarCargar()
    {   
        $Obligaciones=Obligacion::buscarPorTrimestre('1');
        return view('ContabilidadPortal',['Obligaciones'=>$Obligaciones]);
    }
}
