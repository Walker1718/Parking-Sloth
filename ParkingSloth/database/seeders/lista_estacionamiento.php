<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class lista_estacionamiento extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lista_estacionamientos = [
            [
                'Nombre_Calle' => 'Lista_Test',
            ]
        ];
        DB::table('lista_estacionamientos')->insert($lista_estacionamientos);
    }
}
