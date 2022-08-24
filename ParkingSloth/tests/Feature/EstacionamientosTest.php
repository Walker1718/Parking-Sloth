<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Estacionamiento;

class EstacionamientosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_crear_estacionamiento()
    {
        $response = $this->post('/estacionamientos',[
            'ID_Lista'     =>  1,
            'numero'  =>  1,
            'Activo'    => true,
            'latitud'  =>  3.3,
            'longitud'  =>  3.3,
            'capacidad_total'  =>  3,
            'referencia'  =>  "Referencia de prueba",


        ]);

        $response->assertSessionHasNoErrors();
    }


    public function test_crear_estacionamiento_sin_campo_obligatorio()
    {
        $response = $this->post('/estacionamientos',[
           
        ]);

        $response->assertSessionHasErrors();
    }


    
}
