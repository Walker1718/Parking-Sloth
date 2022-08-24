<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ComentariosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // protected function setUp() :void {
    //     parent::setUp();


    // }
     
    public function test_ingresar_reporte()
    {
        
        $response = $this->post('/comentarios',[
            'Titulo'  =>  "Titulo Test comentario",
            'Mensaje'  =>  "Mensaje Test comentario",
            'Calificacion'  =>  "3",
        ]);

        //$response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    public function testReporteError()
    {
        
        $response = $this->post('/comentarios',[
            'Titulo'  =>  "Titulo Test comentario con error",
            'Mensaje'  =>  "Mensaje Test comentario con error",
            'Calificacion'  =>  3,
        ]);

        //$response->assertStatus(302);
        $response->assertSessionHasErrors();
    }

    // public function tearDown()
    // {
    //     parent::tearDown();
    //     DB::rollBack();
    // }
}
