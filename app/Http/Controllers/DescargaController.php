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

        $nombreArchivo = $id .'~'.($obligacion->archivo);
        $file = storage_path('app/'.($obligacion->direccion).'/'.$nombreArchivo);
        
        if (file_exists($file)) {
            $headers = [
                'Content-Type' => 'application/xslx',
                'Content-Disposition' => 'attachment; filename="'. $obligacion->archivo . '"',
            ];

            return response()->download($file, $obligacion->archivo, $headers);
        } else {
            return response()->json(['error' => 'El archivo no existe.'. $nombreArchivo]);
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
        $nombreArchivo = $id .'~'.($Contobligacion->archivo);

        $file = storage_path('app/'.($Contobligacion->direccion).'/'.($nombreArchivo));
        if (file_exists($file)) {
           
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $nombreArchivo . '"',
            ];

            //return response()->json(['exito' => 'El archivo  existe.']);
            return response()->download($file, $Contobligacion->archivo, $headers);
            //return response()->download($file);
        } else {
            return response()->json(['error' => 'El archivo no existe.']);
        }
        //return response()->json(['response'=>$dir]);
    }
}
