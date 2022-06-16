<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        
        $validator = Validator::make($request->all(),([
            'Nombre' => 'required',
            'Apellido' => 'required',
            'Rut' => 'required',
            'Email' => 'required|email',
            'ID_Rol' => 'required|min:1|max:2',
            'Contraseña' => 'required|min:4'
        ]));

        if ($validator->fails()) {
            return redirect('/usuarios/crear')
                ->withErrors($validator)
                ->withInput();
        }
 
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
        return redirect('/usuarios');
    }


    /**
     * Retorna la vista para editar un usuario
     * @return \Illuminate\View\View
     */
    public function vistaEditarUsuarios($id)
    {
        $roles = Rol::all();
        $usuario = Usuario::where('ID_Usuario', $id)
            ->first();
        if(!$usuario){
            abort(404);
        }
        return view('usuarios.editar', [
            'usuario' => $usuario,
            'roles' => $roles
        ]);
    }

    /**
     * Actualiza los datos del usuario en la base de datos
     * @return \Models\Usuario
     */
    public function actualizarUsuarios($id, Request $request){
        $usuario = Usuario::where('ID_Usuario', $id)
            ->first();
 
        $rol = $request->input('rol');

        $usuario->Nombre = $request->input('nombre') ?? $usuario->Nombre;
        $usuario->Apellido = $request->input('apellido') ?? $usuario->Apellido;
        $usuario->Rut = $request->input('rut') ?? $usuario->Rut;
        $usuario->Email = $request->input('email') ?? $usuario->Email;
        $usuario->ID_Rol = $rol == 0 ? $usuario->ID_Rol : $rol;
        $usuario->save();

        return redirect('/usuarios');
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
