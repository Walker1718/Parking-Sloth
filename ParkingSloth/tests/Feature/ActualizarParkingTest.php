<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Estacionamiento;
use Illuminate\Support\Facades\DB;

class ActualizarParkingTest extends TestCase
{

    /** @test */
    public function Actualizar_Estacionamiento_Update()
    {

            // solo trabajo con el usuario de prubea 1 y el estacionamiento de prueba 1 que los cree en los seed
        $response = $this->put('/updateEstacionamiento',[ // actualizar los datos con la funcion creada en la web 
            'Cantidad' => 4,
            'id' => 1
        ]);

        $Estacionamiento = Estacionamiento::find(1); 
        $this->assertSame($Estacionamiento->Capacidad_Utilizada,4); // es correcti su se actualiza la forma anterior 

        $Estacionamiento = Estacionamiento::find(1); 
        $Estacionamiento_Capacidad_Utilizada = $Estacionamiento->Capacidad_Utilizada;
        $response = $this->put('/updateEstacionamiento',[
            'Cantidad' => 16,
            'id' => 1
        ]);

        $this->assertNotSame($Estacionamiento->Capacidad_Utilizada,16);// es correcti si no se actualiza al dato 16
        $this->assertSame($Estacionamiento->Capacidad_Utilizada,$Estacionamiento_Capacidad_Utilizada);// es correcti su se actualiza la forma anterior 

    }
}