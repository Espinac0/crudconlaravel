<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            "nombre" => $this->faker->name(),
            "email" => $this->faker->unique()->safeEmail(),
            "edad" => $this->faker->numberBetween($min = 18, $max = 99)
        ];
    }
}
