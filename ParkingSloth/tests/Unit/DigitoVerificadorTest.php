<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\UsuarioController;
class DigitoVerificadorTest extends TestCase
{
    private $controller;

    protected function setUp() :void {
        parent::setUp();
        $this->controller = new UsuarioController();
    }

    public function test_digito_1_a_9(){
        //17977932-3	
        $digito = $this->controller->generarDV(17977932);
        $this->assertEquals("3", $digito);
    }

    public function test_digito_0(){
        //30738753-0
        $digito = $this->controller->generarDV(30738753);
        $this->assertEquals("0", $digito);
    }

    public function test_digito_k(){
        //66561381-k	
        $digito = $this->controller->generarDV(66561381);
        print $digito;
        $this->assertEquals("K", $digito);
    }

    public function test_digito_numero_negativo(){
        //-30738753-0
        $digito = $this->controller->generarDV(-30738753);
        $this->assertEquals("0", $digito);
    }

}
