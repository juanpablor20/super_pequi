<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'environment_id' =>1,
            'equipment_id' => 1,
            'user_borrower_id' => 1,
            'user_returner_id' => 1,
            'librarian_borrower_id' => 1,
            'librarian_returner_id' => 1,
            'date_ser' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'return_ser' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
