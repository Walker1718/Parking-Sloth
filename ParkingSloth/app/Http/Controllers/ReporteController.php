<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Estacionamiento;
use App\Models\ListaEstacionamientos;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        $datos['reportes']= Reporte::paginate();
        return view('reportes.index',$datos,compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estacionamientos = Estacionamiento::all();
        $lista_estacionamientos = ListaEstacionamientos::all();
        return view('reportes/create', compact('estacionamientos','lista_estacionamientos'));
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
            'ID_Estacionamiento'=>'required|integer',
            'Titulo'=>'required|string',
            'Mensaje'=> 'required|string'
        ];
        
        $Mensaje=[
            "ID_Estacionamiento.required"=>'El estacionamiento es requerido',
            "Titulo.required"=>'Debe ingresar un Título',
            "Mensaje.required"=>'Debe ingresar un Mensaje',

        ];
        $this->validate($request,$campos,$Mensaje);

        $datosReporte=$request->except('_token');

        Reporte::insert($datosReporte);

        return redirect('reportes');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function show($ID_Reporte)
    {
        $ReporteVerMas = Reporte::find($ID_Reporte);
        $usuarios = Usuario::all(); 
        return view('reportes.show', compact('ReporteVerMas', 'usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function edit(Reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reporte $reporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID_Reporte)
    {
        Reporte::destroy($ID_Reporte);
        
        return redirect('reportes');
    }
}
