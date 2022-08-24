<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Estacionamiento;


class ReportesTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */


    protected function setUp() :void {
        parent::setUp();
        //$this->estacionamiento = Estacionamiento::factory()->create();

    }
     
    public function test_ingresar_reporte()
    {
        
        $response = $this->post('/reportes',[
            'ID_Estacionamiento'     =>  1,
            'Titulo'  =>  "Titulo Test Reporte",
            'Mensaje'  =>  "Mensaje Test reporte",
        ]);

        //$response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    public function testReporteError()
    {
        
        $response = $this->post('/reportes',[
            'ID_Estacionamiento'     =>  -1,
            'Titulo'  =>  1214,
            'Mensaje'  =>  "",
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