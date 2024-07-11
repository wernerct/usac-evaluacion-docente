<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EvaluacionDocente>
 */
class EvaluacionDocenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'descripcion' => $this->faker->sentence(20),
            'archivo' => $this->faker->uuid() . '.pdf',
            'user_id' => $this->faker->randomElement([1, 2, 3]),
            'fecha_carga' => $this->faker->date('Y-m-d H:i:s'),
            'estado' => 1,
        ];
    }
}
