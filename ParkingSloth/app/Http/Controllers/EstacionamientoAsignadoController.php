<?php

namespace App\Http\Controllers;

use App\Models\Estacionamiento as ModelsEstacionamiento;
use App\Models\estacionamiento_asignado;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Estacionamiento;
use App\Models\ListaEstacionamientos;

class EstacionamientoAsignadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $estacionamientos = Estacionamiento::all();
        $estacionamientos_asignados = estacionamiento_asignado::all();
        $listaEstacionamientos = ListaEstacionamientos::all();
        $usuarios = Usuario::all();
        return view('estacionamientoAsignado.index',compact('estacionamientos','estacionamientos_asignados','listaEstacionamientos','usuarios'));
         
        

    }

    public function listaAsignada($id)
    {
        //
        $estacionamientos = Estacionamiento::all();
        $listaEstacionamientos = ListaEstacionamientos::all();
        $estacionamientos_asignados = estacionamiento_asignado::where('ID_Usuario', $id)->get();
        $usuario = Usuario::where('ID_Usuario', $id)->get()->first();

        return view('estacionamientoAsignado.indexusuario', compact('estacionamientos','estacionamientos_asignados','usuario','listaEstacionamientos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $estacionamientos = Estacionamiento::all();
        // $usuario = Usuario::where('ID_Usuario', $id)->get()->first();
        // return view('estacionamientoAsignado.create',compact('estacionamientos','usuario'));



        $estacionamientos = Estacionamiento::all();
        $usuarios = Usuario::all();
        return view('estacionamientoAsignado.create', compact('estacionamientos','usuarios'));
    }

    public function asignarEstacionamiento($id)
    {
        $estacionamientos = Estacionamiento::all();
        $usuario = Usuario::where('ID_Usuario', $id)->get()->first();
        return view('estacionamientoAsignado.asignar',compact('estacionamientos','usuario'));
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
            'estacionamientoAsignado'=>'required|integer',
            'moderadorAsignado'=>'required|integer',
            'fecha'=>'required|date'
        ];
        
        $Mensaje=[
            "estacionamientoAsignado.required"=>'Debe seleccionar un estacionamiento',
            "moderadorAsignado.required"=>'Debe seleccionar un moderador',
            "fecha.required"=>"Debe seleccionar una fecha"
        ];

        $this->validate($request,$campos,$Mensaje);

        $estacionamientoAsignado = new estacionamiento_asignado();
        $estacionamientoAsignado->ID_Usuario = $request->input('moderadorAsignado');
        $estacionamientoAsignado->ID_Estacionamiento = $request->input('estacionamientoAsignado');
        $estacionamientoAsignado->Horario = $request->input('fecha');

        $estacionamientoAsignado->save();
        

        return redirect('/asignar_estacionamientos');
    }

    public function guardarEstacionamiento(Request $request, $id)
    {
        //
        $estacionamientoAsignado = new estacionamiento_asignado();
        $estacionamientoAsignado->ID_Usuario = $id;
        $estacionamientoAsignado->ID_Estacionamiento = $request->input('estacionamientoAsignado');
        $estacionamientoAsignado->Horario = $request->input('fecha');

        $estacionamientoAsignado->save();

        return redirect('usuarios/'.$id.'/estacionamientos');
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
    public function desasignarEstacionamiento($id,$id_est)
    {
        DB::table('estacionamiento_asignados')
        ->where("estacionamiento_asignados.ID_Usuario",$id)
        ->where("estacionamiento_asignados.ID_Estacionamiento",$id_est)
        ->delete();
        // $estacionamiento_asignado = new estacionamiento_asignado();
        // $estacionamiento_asignado = estacionamiento_asignado::where([
        //                                                     ['ID_Usuario','=',$id],
        //                                                     ['ID_Estacionamiento','=',$id_est]
        // ])->get()->first();
        
        // $estacionamiento_asignado->delete();
        return redirect('usuarios/'.$id.'/estacionamientos');
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

    public function IndexModerador($ID_Usuario)
    {
        $Estacionamiento = DB::table('estacionamientos') 
        ->join('lista_estacionamientos','estacionamientos.ID_Lista','=','lista_estacionamientos.ID_Lista')
        ->join("estacionamiento_asignados","estacionamientos.ID_Estacionamiento","=","estacionamiento_asignados.ID_Estacionamiento")
        ->select(   'estacionamientos.Numero',
                    'estacionamientos.Activo',
                    'estacionamientos.Referencia',
                    'estacionamiento_asignados.Horario',
                    'estacionamiento_asignados.TurnoAsistencia',
                    'lista_estacionamientos.Nombre_Calle')
        ->where("estacionamiento_asignados.ID_Usuario",$ID_Usuario)
        ->get();
        
        if($Estacionamiento){
            return view('ActualizarEstacionamientos.index', compact('Estacionamiento'));
        }
    }
}