<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DescargaController extends Controller
{
    public function descargar_pdf($filename)
    {
        $file = storage_path('app/carpeta_destino/' . $filename);
        if (file_exists($file)) {
            return response()->download($file);
            //return back()->withInput($filename);
        } else {
            return response()->json(['error' => 'El archivo no existe.']);
        }
    }
}
