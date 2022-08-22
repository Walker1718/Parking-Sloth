<?php

namespace App\Http\Controllers;

use App\Models\Estacionamiento;
use App\Models\Rol;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Hamcrest\Type\IsNumeric;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class UsuarioController extends Controller
{

    /**
     * Retorna la vista con el listado de todos los usuarios en el sistema
     * @return \Illuminate\View\View
     */
    public function vistaUsuarios()
    {
        $usuarios = Usuario::all();
        $estacionamientos = Estacionamiento::all();
        return view('usuarios.listado', [
            'usuarios' => $usuarios,
            'estacionamientos' => $estacionamientos
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

    public function vistaVerPerfil($id)
    {
        $usuario = Usuario::where('ID_Usuario', $id)
            ->first();
        if(!$usuario){
            abort(404, "Usuario no encontrado");
        }
        return view('usuarios.perfil',[
            "usuario" => $usuario
        ]);
    }

    public function vistaModificarContraseña()
    {
        return view('usuarios.modificar-contraseña');
    }


    public function cambiarContraseña($id, Request $request){
        $pass = $request->input('pass');
        $confirm = $request->input('confirm');

        if(!$pass || !$confirm){
            return null;
        }

        if($pass != $confirm){
            return null;
        }

        $usuario = Usuario::where('ID_Usuario', $id)->first();
        if(!$usuario){
            return null;
        }
        $usuario->Contraseña = bcrypt($pass);
        $usuario->save();
        return $usuario;
    }


    /**
     * Genera el digito verificador de un rut (sin puntos).
     ** asdasd
     * @param integer $numero la parte izquierda del rut sin sus puntos, si el rut es 12.345.678-9 entonces el valor es 12345678
     * @return string el digito verificador
     */
    public function generarDV($numero)
    {
        $numero = abs($numero);
        $i = 0;
        $suma = 0;
        while ($numero > 0) {
            $digito = $numero % 10;
            $factor = $i % 6 + 2;
            $suma += $digito * $factor;
            $numero = intval($numero / 10);
            $i++;
        }
        $numDV = 11 - ($suma % 11);
        switch ($numDV) {
            case 11:
                return '0';
            case 10:
                return 'K';
            default:
                return strval($numDV);
        }
    }

    private function validarRut($rut)
    {

    }
    /**
     * Crea y guarda un usuario en la base de datos
     * @return \Models\Usuario
     */
    public function guardarUsuarios(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'apellido' => 'required',
            'rut' => 'required',
            'email' => 'required|email',
            'rol' => 'required|min:1|max:2|integer',
        ]);

        $errores = $validator->errors();


        $rut = $request->input('rut');
        if($rut){
            $rut = str_replace(".", "", $rut);
            // sepparamos la parte numerica del digito verificador 
            $rutSeparado = explode("-", $rut);
            if (sizeof($rutSeparado) != 2) {
                $validator->getMessageBag()->add('rut','El rut no esta bien formado');
            } else {
                // Not A Number
                if (!is_numeric($rutSeparado[0]) || !is_numeric($rutSeparado[1])) {
                    $validator->getMessageBag()->add('rut','El rut no esta bien formado');
                }
            }
            $numero = intval($rutSeparado[0]);
            $digitoCalculado = $this->generarDV($numero);
            if ($digitoCalculado != $rutSeparado[1]) {
                $validator->getMessageBag()->add('rut','El rut ingresado no es valido');
            }
            // añade los puntos al rut
            $rut = number_format($numero, 0, ",", ".") . '-' . $digitoCalculado;
        }
        
        if ($validator->fails()) {
            return redirect('/usuarios/crear')
                ->withErrors($errores)
                ->withInput();
        }

        $pass = bcrypt($rut);
        $data = [
            'Nombre' => $request->input('nombre'),
            'Apellido' => $request->input('apellido'),
            'Rut' => $rut,
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
        if (!$usuario) {
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
    public function actualizarUsuarios($id, Request $request)
    {
        $rut = $request->input('rut');
        if ($rut) {
            $rut = str_replace(".", "", $rut);
            // sepparamos la parte numerica del digito verificador 
            $rutSeparado = explode("-", $rut);
            if (sizeof($rutSeparado) != 2) {
                return redirect()
                    ->back()
                    ->withErrors(['rut' => 'El rut no esta bien formado'])
                    ->withInput();
            } else {
                // Not A Number
                if (!is_numeric($rutSeparado[0]) || !is_numeric($rutSeparado[1])) {
                    return redirect()
                        ->back()
                        ->withErrors(['rut' => 'El rut no esta bien formado'])
                        ->withInput();
                }
            }
            $numero = intval($rutSeparado[0]);
            $digitoCalculado = $this->generarDV($numero);
            if ($digitoCalculado != $rutSeparado[1]) {
                return redirect()
                    ->back()
                    ->withErrors(['rut' => 'El rut ingresado no es valido'])
                    ->withInput();
            }
            // añade los puntos al rut
            $rut = number_format($numero, 0, ",", ".") . '-' . $digitoCalculado;
        }

        $usuario = Usuario::where('ID_Usuario', $id)
            ->first();

        $rol = $request->input('rol');
        $usuario->Nombre = $request->input('nombre') ?? $usuario->Nombre;
        $usuario->Apellido = $request->input('apellido') ?? $usuario->Apellido;
        $usuario->Rut = $rut ?? $usuario->Rut;
        $usuario->Email = $request->input('email') ?? $usuario->Email;
        $usuario->ID_Rol = $rol == 0 ? $usuario->ID_Rol : $rol;
        $usuario->save();

        return redirect('/usuarios');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'pass' => 'required',
        ]);

        $usuario = Usuario::where('Email', $request->email)->first();
        if (!$usuario || !$usuario->Activo) {
            return null;
        }
        $compare = Hash::check($request->pass, $usuario->Contraseña);
        if (!$compare ) {
            return null;
        }
        return $usuario;
    }

    public function cambiarActivo($id){
        $usuario = Usuario::where('ID_Usuario', $id)->first();
        if($usuario == null){
            throw new NotFoundHttpException("usuario no encontrado");
        }
        $usuario->Activo = !$usuario->Activo;
        $usuario->save();
        return $usuario;
    }

    // FOO

    // public function editarEstacionamiento(Request $request){

    //     app(EstacionamientoAsignadoController:class)->index();
    // }

}
