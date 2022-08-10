<?php

namespace App\Imports;

use App\Models\Estacionamiento;
use App\Models\ListaEstacionamientos;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ImportDataSet implements ToCollection,  WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $Errors = array();
        $booleanErrors = false;
        $booleanErrorsMaster = false;
        $position = 0;
        foreach ($rows as $row) {
            $position += 1;
            $booleanErrors = false;

            $Error = "Error en la fila " . $position . " de la tabla, en las Casillas :";

            if (!$row->has(['calles', 'cuadras','automoviles'])) {
                $Titulos_sin_identificar = "";
                if (!$row->has(['calles'])) $Titulos_sin_identificar = $Titulos_sin_identificar . 'Calles';
                if (!$row->has(['cuadras'])) $Titulos_sin_identificar = $Titulos_sin_identificar . 'Cuadras';
                if (!$row->has(['automoviles'])) $Titulos_sin_identificar = $Titulos_sin_identificar . 'Automoviles';
            return back()->withErrors('No comple con los siguientes titulos predefinidos que tienen que tener las tablas: ' . $Titulos_sin_identificar . ' .');
            } 

                if ($row['calles'] == null || !is_string($row['calles'])){
                    $Error = $Error .' Calle';
                    $booleanErrors = true;
                }
                if (!$row['cuadras'] == null && !is_numeric($row['cuadras'])){
                    $Error = $Error . ' Cuadras';
                    $booleanErrors = true;
                }
                if ($row['automoviles'] == null || !is_numeric($row['automoviles'])  || $row['automoviles']<0) {
                    $Error = $Error . ' Automoviles';
                    $booleanErrors = true;
                }

                if($booleanErrors){
                    $Error = $Error . '.';
                    array_push($Errors, $Error);
                    $booleanErrorsMaster = true;

                }
        }  

        if($booleanErrorsMaster) return back()->withErrors($Errors);

        foreach ($rows as $row) {
         $Calle = $row["calles"];
         $cuadra = $row["cuadras"];
         $automoviles = $row["automoviles"];
        
        if(!ListaEstacionamientos::where('Nombre_Calle', $Calle)->exists()){

        $ListaEstacionamientos = new ListaEstacionamientos;
        $ListaEstacionamientos->Nombre_Calle = $Calle;
        $ListaEstacionamientos->save();
        }

        if(!DB::table('estacionamientos') 
        ->join('lista_estacionamientos','estacionamientos.ID_Lista','=','lista_estacionamientos.ID_Lista')
        ->where('Nombre_Calle', $Calle)
        ->where('Numero', $cuadra)
        ->exists()){
        $Estacionamiento =  new Estacionamiento;
        $Estacionamiento->ID_Lista = ListaEstacionamientos::where('Nombre_Calle', $Calle)->first()->ID_Lista;
        $Estacionamiento->Numero = $cuadra;
        $Estacionamiento->Activo = 1;
        $Estacionamiento->Capacidad_Utilizada = $automoviles;
        $Estacionamiento->Capacidad_Total = 0;
        $Estacionamiento->Referencia = "";
        $Estacionamiento->save();
        }
        }
        return;
    }
}
