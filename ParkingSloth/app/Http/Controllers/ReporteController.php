<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Estacionamiento;
use App\Models\ListaEstacionamientos;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estacionamientos = Estacionamiento::all();
        $lista_estacionamientos = ListaEstacionamientos::all();
        $datos['reportes']= Reporte::paginate(5);
        return view('reportes.index',$datos,compact('estacionamientos','lista_estacionamientos'));
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

        Reporte::create($datosReporte);

        return redirect('navegarmapa');  
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
        $estacionamientos = Estacionamiento::all();
        $lista_estacionamientos = ListaEstacionamientos::all();
        return view('reportes.show', compact('ReporteVerMas', 'estacionamientos','lista_estacionamientos'));
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

    public function pdf()
    {
        $estacionamientos = Estacionamiento::all();
        $lista_estacionamientos = ListaEstacionamientos::all();
        $datos['reportes']= Reporte::paginate();

        $pdf = Pdf::loadView('reportes.pdf', $datos,compact('estacionamientos','lista_estacionamientos'));
        return $pdf->stream();
    }
}
