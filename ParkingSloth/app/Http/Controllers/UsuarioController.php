<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    
    /**
     * Retorna la vista con el listado de todos los usuarios en el sistema
     *
     * @return \Illuminate\View\View
     */
    public function vistaUsuarios()
    {
        $usuarios = Usuario::all();
        return view('usuarios.listado', [
            'usuarios' => $usuarios
        ]);
    }
}
