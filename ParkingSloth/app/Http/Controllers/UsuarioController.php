<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    
    /**
     * Retorna la vista con el listado de todos los usuarios en el sistema
     * @return \Illuminate\View\View
     */
    public function vistaUsuarios()
    {
        $usuarios = Usuario::all();
        return view('usuarios.listado', [
            'usuarios' => $usuarios
        ]);
    }

    /**
     * Retorna la vista para crear un usuario
     * @return \Illuminate\View\View
     */
    public function vistaCrearUsuarios()
    {
        $roles = Rol::all();
        return view('usuarios.crear', [
            'roles' => $roles
        ]);
    }

    /**
     * Crea y guarda un usuario en la base de datos
     * @return \Models\Usuario
     */
    public function guardarUsuarios(Request $request){
        $pass = bcrypt($request->input('rut'));
        $data = [
            'Nombre' => $request->input('nombre'),
            'Apellido' => $request->input('apellido'),
            'Rut' => $request->input('rut'),
            'Email' => $request->input('email'),
            'ID_Rol' => $request->input('rol'),
            'Contraseña' => $pass,
        ];
        Usuario::create($data);
        return $this->vistaUsuarios();
    }


    /**
     * Retorna la vista para editar un usuario
     * @return \Illuminate\View\View
     */
    public function vistaEditarUsuarios($id)
    {
        $usuario = Usuario::where('ID_Usuario', $id)
            ->first();
        if(!$usuario){
            abort(404);
        }
        return view('usuarios.editar', [
            'usuario' => $usuario
        ]);
    }

    /**
     * Actualiza los datos del usuario en la base de datos
     * @return \Models\Usuario
     */
    public function actualizarUsuarios(Request $req){

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
