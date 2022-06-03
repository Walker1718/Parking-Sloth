<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $num = $this->faker->numberBetween(1000000,30000000);
        $digitoVerificador = $this->generarDV($num);
        $rut = number_format($num, 0,",",".").'-'.$digitoVerificador;
        return [
            'Nombre' => $this->faker->firstName(),
            'Apellido'=> $this->faker->lastName(),
            'Rut' => $rut,
            'Email' => $this->faker->unique()->safeEmail(),
            'Contraseña' => bcrypt('123456'),
            'ID_Rol' => $this->faker->numberBetween(1,2),
            'created_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }

    private function generarDV($numero){
        $i = 0;
        $suma = 0;
        while($numero > 0){
            $digito = $numero % 10;
            $factor = $i % 6 + 2;
            $suma += $digito * $factor;
            $numero = intval($numero / 10);
            $i++;
        }
        $numDV = 11 - ($suma%11);
        switch($numDV){
            case 11:
                return '0';
            case 10:
                return 'K';
            default:
                return strval($numDV);
        }
    }
}
