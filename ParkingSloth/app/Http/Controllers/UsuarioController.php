<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

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

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'pass' => 'required',
        ]);

        $usuario = Usuario::where('Email', $request->email)->first();
        if(!$usuario){
            return null;
        }
        $compare = Hash::check($request->pass, $usuario->Contraseña);
        if(!$compare){
            return null;
        }
        return $usuario;
    }

}
