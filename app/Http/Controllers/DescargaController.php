<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obligacion;
use Illuminate\Support\Facades\Response;

class DescargaController extends Controller
{
    public function descargar_pdf($id)
    {
        $obligacion = Obligacion::distinct()
        ->select('direccion','archivo')
        ->from('obligaciones')
        ->where('id',$id)
        ->first();


        $file = storage_path('app/'.($obligacion->direccion).'/'.($obligacion->archivo));
        $dir = 'app/'.($obligacion->direccion).'/'.($obligacion->archivo);
        if (file_exists($file)) {
            $nombreArchivo = $obligacion->archivo;
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $nombreArchivo . '"',
            ];

            //return response()->json(['exito' => 'El archivo  existe.']);
            return response()->download($file, $nombreArchivo, $headers);
            //return response()->download($file);
        } else {
            return response()->json(['error' => 'El archivo no existe.']);
        }
        //return response()->json(['response'=>$dir]);
    }
    public function descargarCont_pdf($id)
    {
        $Contobligacion = Obligacion::distinct()
        ->select('direccion','archivo')
        ->from('cont_obligaciones')
        ->where('id',$id)
        ->first();


        $file = storage_path('app/'.($Contobligacion->direccion).'/'.($Contobligacion->archivo));
        $dir = 'app/'.($Contobligacion->direccion).'/'.($Contobligacion->archivo);
        if (file_exists($file)) {
            $nombreArchivo = $Contobligacion->archivo;
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $nombreArchivo . '"',
            ];

            //return response()->json(['exito' => 'El archivo  existe.']);
            return response()->download($file, $nombreArchivo, $headers);
            //return response()->download($file);
        } else {
            return response()->json(['error' => 'El archivo no existe.']);
        }
        //return response()->json(['response'=>$dir]);
    }
}
