<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Usuario;
use App\Models\Rol;


class LoginTest extends TestCase
{

    private $user;

    protected function setUp() :void {
        parent::setUp();
        $this->user = Usuario::factory()->create();
    }

    public function testLoginCorrecto()
    {
        $response = $this->post('/api/login',[
            'email'     =>  $this->user->Email,
            'pass'  =>  "123456",
        ]);

        $response->assertStatus(200);
        $content = $response->getContent();
        $this->assertNotEquals("",$content);
    }

    public function testLoginSinCampos()
    {
        $response = $this->post('/api/login',[
            'email'     => "",
            'pass'  =>  "",
        ]);
        //no es una solicitud exitosa
        $response->assertStatus(302);
    }

    public function testLoginUsuarioNoExiste()
    {
        $response = $this->post('/api/login',[
            'email'     =>  "noexisto@mail.com",
            'pass'  =>  "12345",
        ]);

        $response->assertStatus(200);
        $content = $response->getContent();
        //solicitud correcta pero usuario no encontrado
        $this->assertEquals("",$content);
    }

    public function testLoginContraseñaIncorrecta()
    {
        $response = $this->post('/api/login',[
            'email'     =>  $this->user->Email,
            'pass'  =>  "12345",
        ]);

        $response->assertStatus(200);
        $content = $response->getContent();
        //Solicitud exitosa, usuario encontrado, pero contraseña no es correcta
        $this->assertEquals("",$content);
    }
}
