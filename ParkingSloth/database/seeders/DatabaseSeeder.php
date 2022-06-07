<?php

namespace Database\Seeders;

use Database\Seeders\RolSeeder;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolSeeder::class,
            UsuarioSeeder::class,
            lista_estacionamiento::class,
            estacionamiento::class,
            estacionamiento_asignados::class,
        ]);
    }
}
