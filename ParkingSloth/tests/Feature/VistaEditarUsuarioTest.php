<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VistaEditarUsuarioTest extends TestCase
{
    private $user;

    protected function setUp() :void {
        parent::setUp();
        $this->user = Usuario::factory()->create();
    }

    public function test_usuario_existe()
    {
        $id = $this->user->ID_Usuario;
        $response = $this->get('/usuarios/'.$id.'/editar');

        
        $response->assertStatus(200);
        $response->assertSee($this->user->Nombre);
        $response->assertViewIs("usuarios.editar");
    }

    public function test_usuario_no_existe()
    {
        $response = $this->get('/usuarios/-10/editar');
        
        $response->assertStatus(404);
    }
}
