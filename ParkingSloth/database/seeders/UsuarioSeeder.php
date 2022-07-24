<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Faker\Extension\Container;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    // Aaron test creo un usuario test
    $UsuarioTest = [
        [
            'ID_Usuario' => 1,
            'Nombre' => 'Usuario_test',
            'Apellido' => 'Usuario_test',
            'Rut' => '9.999.999-9',
            'Email' => 'email@test',
            'Contraseña' => 'Usuariotest',
            'ID_Rol' => 1
        ]
    ];
    DB::table('Usuario')->insert($UsuarioTest);
    // Aaron test

       Usuario::factory()->count(10)->create();
    }
}
