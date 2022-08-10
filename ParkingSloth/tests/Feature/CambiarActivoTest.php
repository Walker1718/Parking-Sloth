<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CambiarActivoTest extends TestCase
{

    private $userActivado;
    private $userDesactivado;

    protected function setUp() :void {
        parent::setUp();
        $this->userActivado = Usuario::factory()->create();
        $this->userDesactivado = Usuario::factory()->create([
            "Activo" => false
        ]);
    }
    

    public function test_desactivar()
    {
        $url = 'api/usuarios/'.$this->userActivado->ID_Usuario.'/activo';
        $response = $this->patch($url);
        $response->assertStatus(200);
        $content = $response->getContent();
        $userContent = json_decode($content);
        $this->assertEquals($this->userActivado->ID_Usuario, $userContent->ID_Usuario);
        $this->assertEquals(false, $userContent->Activo);
    }

    public function test_activar()
    {
        $url = 'api/usuarios/'.$this->userDesactivado->ID_Usuario.'/activo';
        $response = $this->patch($url);
        $response->assertStatus(200);
        $content = $response->getContent();
        $userContent = json_decode($content);
        $this->assertEquals($this->userDesactivado->ID_Usuario, $userContent->ID_Usuario);
        $this->assertEquals(true, $userContent->Activo);
    }

    public function test_usuario_no_existe()
    {
        $response = $this->patch("api/usuarios/-10/activo");
        $response->assertStatus(404);
    }
}
