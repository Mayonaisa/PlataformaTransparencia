<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller as BaseController;

class GuardarController extends Controller
{
    function guardar_pdf($filename)
    {
        $file = storage_path('app/carpeta_destino/' . $filename);

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            return response()->json(['error' => 'El archivo no existe.']);
        }
    }   
}