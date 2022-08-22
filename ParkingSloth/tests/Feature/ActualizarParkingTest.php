<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Estacionamiento;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActualizarParkingTest extends TestCase
{
    /** @test */
    public function Actualizar_Estacionamiento_Update()
    {
    //acuatualiza mi valor a test del seed para poder realizar operaciones
    $Fecha = Carbon::now(); // fecha actual total    
    $Fecha = $Fecha->toDateString(); // solo año mes y dia
    $Estacionamiento = DB::table('estacionamiento_asignados') 
    ->where("estacionamiento_asignados.ID_Usuario",1) 
    ->where("estacionamiento_asignados.ID_Estacionamiento",1)
    ->update(['Horario' => $Fecha]);

            // solo trabajo con el usuario de prubea 1 y el estacionamiento de prueba 1 que los cree en los seed
        $response = $this->post('/updateEstacionamiento',[ // actualizar los datos con la funcion creada en la web 
            'Cantidad' => 6,
            'id' => 1
        ]);

        $Estacionamiento = Estacionamiento::find(1); 
        $this->assertSame($Estacionamiento->Capacidad_Utilizada,6); // es correcti su se actualiza la forma anterior 

        $Estacionamiento = Estacionamiento::find(1); 
        $Estacionamiento_Capacidad_Utilizada = $Estacionamiento->Capacidad_Utilizada;
        $response = $this->put('/updateEstacionamiento',[
            'Cantidad' => 16,
            'id' => 1
        ]);
        
        $Estacionamiento = Estacionamiento::find(1); 
        $this->assertNotSame($Estacionamiento->Capacidad_Utilizada,16);// es correcti si no se actualiza al dato 16
        $this->assertSame($Estacionamiento->Capacidad_Utilizada,$Estacionamiento_Capacidad_Utilizada);// es correcti su se actualiza la forma anterior 

    }

    /** @test */
    public function Actualizar_Estacionamiento_Index()
    {

            // solo trabajo con el usuario de prubea 1 y el estacionamiento de prueba 1 que los cree en los seed
        $response = $this->get('/ActualizarEstacionamientos/1');
        $response->assertViewIs('ActualizarEstacionamientos.Main');

    }
}
