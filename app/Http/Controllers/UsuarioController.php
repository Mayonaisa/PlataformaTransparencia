<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Obligacion;
use App\Models\Fraccion;
use App\Models\Fragmento;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller as BaseController;

class UsuarioController extends Controller
{
    public function cargarUsuario() //prueba
    {
        $usuario = User::distinct()
        ->select('users.rol_id')
        ->from('users')
        ->where('users.id',Auth::id())
        ->first();

        Session::put('rol', $usuario->rol_id);

        return view('PortalPrincipal');
    }
}