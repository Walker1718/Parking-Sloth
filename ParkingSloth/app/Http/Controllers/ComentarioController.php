<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        $datos['comentarios']= Comentario::paginate();
        return view('comentarios.index',$datos,compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comentarios/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Titulo'=>'required|string',
            'Mensaje'=> 'required|string',
            'Calificacion'=> 'required|string'
        ];
        
        $Mensaje=[
            "Calificacion.required"=>'Debe ingresar una calificación',
            "Titulo.required"=>'Debe ingresar un Título',
            "Mensaje.required"=>'Debe ingresar un Mensaje'
        ];
        $this->validate($request,$campos,$Mensaje);

        $datosComentario=$request->except('_token');

        Comentario::insert($datosComentario);

        return redirect('comentarios'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show($ID_Comentario)
    {
        $ComentarioVerMas = Reporte::find($ID_Comentario);
        return view('comentarios.show', compact('ComentarioVerMas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID_Comentario)
    {
        Comentario::destroy($ID_Comentario);
        
        return redirect('comentarios');
    }
}
