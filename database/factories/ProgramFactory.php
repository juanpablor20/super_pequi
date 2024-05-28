<?php

namespace Database\Factories;

use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    protected $model = Program::class;
    public function definition(): array

    {
        return [
            'names_pro' => $this->faker->name(),
            'code_pro' => $this->faker->unique()->randomNumber(),
            'version' => $this->faker->randomFloat(2, 1, 10), // Genera un número decimal entre 1 y 10 con dos decimales
            'states' => $this->faker->randomElement(['active', 'inactive']), // Genera un estado aleatorio

        ];

    }
}

