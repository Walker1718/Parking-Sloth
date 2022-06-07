<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class estacionamiento_asignados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estacionamiento_asignados = [
            [
                'ID_Usuario' => 1,
                'ID_Estacionamiento' => 1,
                'Horario' => Carbon::parse('01-01-2000'),
            ]
        ];
        DB::table('estacionamiento_asignados')->insert($estacionamiento_asignados);
    }
}
