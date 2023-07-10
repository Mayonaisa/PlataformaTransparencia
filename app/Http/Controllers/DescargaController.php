<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DescargaController extends Controller
{
    public function descargaArchivo($filename)
    {
        $file = storage_path('app/' . $filename);

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            return response()->json(['error' => 'El archivo no existe.']);
        }
    }
}
