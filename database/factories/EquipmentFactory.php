<?php

namespace Database\Factories;


use App\Models\Equipment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Environment>
 */
class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Equipment::class;

    public function definition(): array
    {
        return [
          'type_equi' => $this->faker->name(),
          'characteristics' => $this->faker->sentence(),
          'serie_equi' => $this->faker->unique()->randomNumber(),
        ];
    }
}
