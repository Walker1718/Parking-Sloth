<?php

namespace App\Http\Controllers;

use App\Models\Estacionamiento;
use App\Models\ListaEstacionamientos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EstacionamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estacionamientos = Estacionamiento::all();
        $listaEstacionamientos = ListaEstacionamientos::all();

        return view('estacionamientos.index', compact('estacionamientos','listaEstacionamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calles = ListaEstacionamientos::all();
        return view('estacionamientos.create',compact('calles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        //  dd($request);
        $estacionamiento = new Estacionamiento();

        $estacionamiento->ID_Lista = $request->input('ID_Lista');

        $estacionamiento->Numero =  $request->input('numero');

        $estacionamiento->Latitud =  $request->input('latitud');
        $estacionamiento->Longitud =  $request->input('longitud');

        if($request->input('activo')=='on'){
            $estacionamiento->Activo = true;
        }else{
            $estacionamiento->Activo = false;
        }
        
        $estacionamiento->Capacidad_Total =  $request->input('capacidad_total');
        $estacionamiento->Referencia =  $request->input('referencia');

        $estacionamiento->Capacidad_Utilizada = 0;

        $estacionamiento->save();
        return redirect()->route('estacionamientos.index');
        //return 'Guardado!';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return $id;
        //$estacionamientos = Estacionamiento::all();
        $estacionamiento = new Estacionamiento();
        $estacionamiento = Estacionamiento::find($id);
        $calles = ListaEstacionamientos::all();

        // $estacionamiento = DB::table('Estacionamientos')
        //                     ->where('ID_Estacionamiento','=',$id)
        //                     ->get()->first();

        return view('estacionamientos.edit', compact('estacionamiento','calles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request;
        $estacionamiento = new Estacionamiento();
        //$estacionamiento = DB::table('Estacionamientos')
         //                   ->where('ID_Estacionamiento','=',$id)
           //                 ->get()->first();
        // $estacionamiento = Estacionamiento::where('ID_Estacionamiento',$id);
        // dd($estacionamiento);

        $estacionamiento = Estacionamiento::find($id);
        //return $estacionamiento;

        $estacionamiento->Numero =  $request->input('numero');

        if($request->input('activo')=='on'){
            $estacionamiento->Activo = true;
        }else{
            $estacionamiento->Activo = false;
        }
                          
        $estacionamiento->Capacidad_Total =  $request->input('capacidad_total');
        $estacionamiento->Referencia =  $request->input('referencia');

        $estacionamiento->Capacidad_Utilizada = 0;

        //return $estacionamiento;

        $estacionamiento->save();
        return redirect()->route('estacionamientos.index');
        //return 'Actualizado!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estacionamiento = new Estacionamiento();
        $estacionamiento = Estacionamiento::find($id);
        //return $estacionamiento;
        $estacionamiento->delete();
        return redirect()->route('estacionamientos.index');
    }

    // update Estacionamiento
  public function updateEstacionamiento(Request $request){
    $Cantidad = $request->input('Cantidad');
    $id = $request->input('id');

    /*"ID_Estacionamiento"*/
    $Estacionamiento = Estacionamiento::find($id); 

    /*"VALIDACION"*/
    if ($Estacionamiento->Capacidad_Total < $Cantidad) return;
    if (0 > $Cantidad) return;
    /*"VALIDACION"*/

    $Estacionamiento->Capacidad_Utilizada = $Cantidad;
    $Estacionamiento->save();
  }


  public function index2($ID_Usuario)
    {

    date_default_timezone_set('America/Santiago');

    $Fecha = Carbon::now(); // fecha actual total

    $dias = [                                   //dias de la semana en español
        0 => 'DOMINGO',
        1 => 'LUNES',
        2 => 'MARTES',
        3 => 'MIERCOLES',
        4 => 'JUEVES',
        5 => 'VIERNES',
        6 => 'SABADO',
    ];

    $dias = $dias[($Fecha->dayOfWeek)]; // nombre de dia actual

    $Fecha_Inversa = $Fecha->format('d-m-Y'); // array con fecha inversa dia mes y año

    $Fecha = $Fecha->toDateString(); // solo año mes y dia

    $Estacionamiento = DB::table('estacionamientos') 
    ->join('lista_estacionamientos','estacionamientos.ID_Lista','=','lista_estacionamientos.ID_Lista')
    ->join("estacionamiento_asignados","estacionamientos.ID_Estacionamiento","=","estacionamiento_asignados.ID_Estacionamiento")
    ->join("Usuario","estacionamiento_asignados.ID_Usuario","=","Usuario.ID_Usuario")
    ->select(   'estacionamientos.ID_Estacionamiento',
                'estacionamientos.Numero',
                'estacionamientos.Capacidad_Total',
                'estacionamientos.Capacidad_Utilizada',
                'lista_estacionamientos.Nombre_Calle',
                'Usuario.Nombre',
                'Usuario.Apellido',
                'Usuario.ID_Usuario',
                'estacionamiento_asignados.TurnoAsistencia')
    ->where("Usuario.ID_Usuario",$ID_Usuario) 
    ->where("estacionamiento_asignados.Horario",$Fecha)
    ->first();

    if($Estacionamiento){
        return view('ActualizarEstacionamientos.Main', compact('dias','Fecha_Inversa','Estacionamiento'));
    }

        return view('ActualizarEstacionamientos.Notempty', compact('dias','Fecha_Inversa'));

    }
    
}
