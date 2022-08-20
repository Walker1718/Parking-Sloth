<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Estacionamiento;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estacionamiento>
 */
class EstacionamientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'ID_Lista'=> 1,
            'Numero' => 113,
            'Activo' => true,
            'Capacidad_Total' => 6,
            'Capacidad_Utilizada' => 5,
            'Referencia' => "Calle Av. Test entre Calles Uno y Dos",
        ];
    }
}
