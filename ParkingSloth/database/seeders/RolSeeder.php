<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'Nombre' => 'Admin',
                'Descripcion' => 'Tiene permisos para todo'
            ],
            [
                'Nombre' => 'Moderador',
                'Descripcion' => 'Es el encargado de los parkimetros'
            ]
        ];
        DB::table('Rol')->insert($roles);
    }
}
