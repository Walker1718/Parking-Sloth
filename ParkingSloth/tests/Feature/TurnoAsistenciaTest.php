<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TurnoAsistenciaTest extends TestCase
{
   /** @test */
   public function Turno_Asitencia()
   {

        //CUIDADO PORQUE TIENE QUE EXISTIR UN DATO EN LA BDD CON FECHA DE HOY


        //FECHA
        date_default_timezone_set('America/Santiago');
        $Fecha = Carbon::now(); // fecha actual total
        $Fecha = $Fecha->toDateString(); // solo año mes y dia
        //FECHA


        // solo trabajo con el usuario de prubea 1 y el estacionamiento de prueba 1 que los cree en los seed
        $response = $this->post('/ActualizarTurnoAsistencia',[ // modificamos horario de los datos de prueba
           'TurnoAsistencia' => 1,
           'ID_Usuario' => 1,
           'ID_Estacionamiento' => 1
        ]);


       $estacionamiento_asignados = DB::table('estacionamiento_asignados')
       ->where("estacionamiento_asignados.ID_Usuario",1)
       ->where("estacionamiento_asignados.ID_Estacionamiento",1) 
       ->where("estacionamiento_asignados.Horario",$Fecha)
       ->first();

       $this->assertSame($estacionamiento_asignados->TurnoAsistencia,1); // es correcto 


        // solo trabajo con el usuario de prubea 1 y el estacionamiento de prueba 1 que los cree en los seed
        $response = $this->post('/ActualizarTurnoAsistencia',[ // modificamos horario de los datos de prueba
            'TurnoAsistencia' => 0,
            'ID_Usuario' => 1,
            'ID_Estacionamiento' => 1
         ]);
 
 
        $estacionamiento_asignados = DB::table('estacionamiento_asignados')
        ->where("estacionamiento_asignados.ID_Usuario",1)
        ->where("estacionamiento_asignados.ID_Estacionamiento",1) 
        ->where("estacionamiento_asignados.Horario",$Fecha)
        ->first();
 
        $this->assertSame($estacionamiento_asignados->TurnoAsistencia,0); // es correcto 
    }
}