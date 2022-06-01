<?php

namespace App\Http\Controllers;

use App\Models\Estacionamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    $Estacionamiento = Estacionamiento::find(2); //CAMBIAR AQUI SEGUN USUARIO 
    $Estacionamiento->Capacidad_Utilizada = $Cantidad;
    $Estacionamiento->save();
    exit; 
  }


  public function index2()
  {
    $Estacionamiento = Estacionamiento::find(2);

      return view('ActualizarEstacionamientos.Main', compact('Estacionamiento'));
  }

}
