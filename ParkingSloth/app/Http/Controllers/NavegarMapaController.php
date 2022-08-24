<?php

namespace App\Http\Controllers;

use App\Models\Estacionamiento;
use App\Models\ListaEstacionamientos;


class NavegarMapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function NavegarMapa()
    {
        $estacionamientos = Estacionamiento::all();
        $listaEstacionamientos = ListaEstacionamientos::all();

        return view('navegarmapa.navegarmapa', compact('estacionamientos','listaEstacionamientos'));
    }

    
}