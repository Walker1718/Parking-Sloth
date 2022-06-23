<?php

namespace App\Http\Controllers;

use App\Models\Estacionamiento;
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

        return view('estacionamientos.index', compact('estacionamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('estacionamientos.create');
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
        $estacionamiento = new Estacionamiento();
        $estacionamiento->Numero =  $request->input('numero');

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
        // $estacionamiento = DB::table('Estacionamientos')
        //                     ->where('ID_Estacionamiento','=',$id)
        //                     ->get()->first();

        return view('estacionamientos.edit', compact('estacionamiento'));
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
    $Estacionamiento->Capacidad_Utilizada = $Cantidad;
    $Estacionamiento->save();
    exit; 
  }


  public function index2($ID_Usuario)
  {
    $Fecha = Carbon::now()->toDateString();

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
                'Usuario.Apellido')
    ->where("Usuario.ID_Usuario",$ID_Usuario) 
    ->where("estacionamiento_asignados.Horario",$Fecha)
    ->first();

    if($Estacionamiento){
        return view('ActualizarEstacionamientos.Main', compact('Estacionamiento'));
    }
    return view('ActualizarEstacionamientos.Notempty');
    
      }

}
