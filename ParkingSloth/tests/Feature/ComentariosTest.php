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
     
    public function testIngresarComentario()
    {
        
        $response = $this->post('/comentarios',[
            'Titulo'  =>  "Titulo Test comentario",
            'Mensaje'  =>  "Mensaje Test comentario",
            'Calificacion'  =>  "3",
        ]);

        //$response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    public function testComentarioCampoVacio()
    {
        
        $response = $this->post('/comentarios',[
            'Titulo'  =>  "",
            'Mensaje'  =>  "",
            'Calificacion'  =>  "",
        ]);

        //$response->assertStatus(302);
        $response->assertSessionHasErrors();
    }

    public function testComentarioError()
    {
        
        $response = $this->post('/comentarios',[
            'Titulo'  =>  "Titulo Test comentario con error",
            'Mensaje'  =>  1,
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
