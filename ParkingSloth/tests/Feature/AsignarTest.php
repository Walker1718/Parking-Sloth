<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AsignarTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_asignar_estacionamiento()
    {
        $response = $this->post('/asignar_estacionamientos',[
            'estacionamientoAsignado'     =>  1,
            'moderadorAsignado'=> 1,
            'fecha' => "2022-08-23",
        ]);

        $response->assertSessionHasNoErrors();
    }


    public function test_asignar_estacionamiento_sin_campo_obligatorio()
    {
        $response = $this->post('/asignar_estacionamientos',[
           
        ]);

        $response->assertSessionHasErrors();
    }
}
