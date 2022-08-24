<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class estacionamiento extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estacionamiento = [
            [
                'ID_Lista' => 1,
                'Numero' => '99',
                'Activo' => true,
                'Capacidad_Total' => 13,
                'Capacidad_Utilizada' => 0,
                'Latitud' => -36.82624311167962,
                'Longitud' =>  -73.0516106959861,
                'Referencia' => 'Estacionamiento_Test1'
            ],
            [
                'ID_Lista' => 1,
                'Numero' => '100',
                'Activo' => true,
                'Capacidad_Total' => 8,
                'Capacidad_Utilizada' => 0,
                'Latitud' => -36.825757889786345,
                'Longitud' =>  -73.04704557632546,
                'Referencia' => 'Estacionamiento_Test2'
            ]
        ];
        DB::table('estacionamientos')->insert($estacionamiento);
    }
}
