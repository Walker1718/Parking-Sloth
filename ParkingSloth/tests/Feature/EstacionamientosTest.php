<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Estacionamiento;

class EstacionamientosTest extends TestCase
{
    private $estacionamiento;

    // protected function setUp() :void {
    //     // parent::setUp();
    //     // $this->estacionamiento = Estacionamiento::factory()->create();
    // }


    public function test_crear_ver_pagina()
    {
        $response = $this->get('/estacionamientos/crear'); //Consulta la url navegarmapa

        $response->assertStatus(200); //Pregunta si 
    }

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

    // public function test_editar_muestra_informacion()
    // {
    //     $id = $this->estacionamiento->ID_Estacionamiento;
    //     $response = $this->get('/estacionamientos/'.$id.'/editar');
    //     $response->assertStatus(200);
    //     $response->assertSee($this->user->ID_Lista);
    //     $response->assertSee($this->user->Numero);
    //     $response->assertSee($this->user->Latitud);
    //     $response->assertSee($this->user->Longitud);
    //     $response->assertSee($this->user->Capacidad_Total);
    //     $response->assertSee($this->user->Referencia);
    //     $response->assertSee($this->user->Activo);
  
    //     $response->assertViewIs("estacionamientos.editar");
    // }


    
}
