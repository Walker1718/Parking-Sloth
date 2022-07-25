<?php

namespace App\Http\Controllers;

use App\Models\estacionamiento_asignado;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class EstacionamientoAsignadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estacionamiento_asignado  $estacionamiento_asignado
     * @return \Illuminate\Http\Response
     */
    public function show(estacionamiento_asignado $estacionamiento_asignado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estacionamiento_asignado  $estacionamiento_asignado
     * @return \Illuminate\Http\Response
     */
    public function edit(estacionamiento_asignado $estacionamiento_asignado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\estacionamiento_asignado  $estacionamiento_asignado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, estacionamiento_asignado $estacionamiento_asignado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estacionamiento_asignado  $estacionamiento_asignado
     * @return \Illuminate\Http\Response
     */
    public function destroy(estacionamiento_asignado $estacionamiento_asignado)
    {
        //
    }

    public function ActualizarTurnoAsistencia(Request $request)
    {
        //FECHA
        date_default_timezone_set('America/Santiago');
        $Fecha = Carbon::now(); // fecha actual total
        $Fecha = $Fecha->toDateString(); // solo año mes y dia
        //FECHA

        //VARIABLE
        $TurnoAsistencia = $request->input('TurnoAsistencia');
        if($TurnoAsistencia == true) $TurnoAsistencia=1;
        if($TurnoAsistencia == false) $TurnoAsistencia=0;
        $ID_Usuario = $request->input('ID_Usuario');
        $ID_Estacionamiento = $request->input('ID_Estacionamiento');
        //VARIABLE
        

        //CONSULTA
        $estacionamiento_asignados = DB::table('estacionamiento_asignados')
        ->where("estacionamiento_asignados.ID_Usuario",$ID_Usuario)
        ->where("estacionamiento_asignados.ID_Estacionamiento",$ID_Estacionamiento) 
        ->where("estacionamiento_asignados.Horario",$Fecha)
        ->update(['TurnoAsistencia' => $TurnoAsistencia]);
        //CONSULTA
        //exit; 
    }
}
