<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Disability>
 */
class DisabilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this -> faker ->sentence(),
            'punishment_date'  => $this -> faker ->dateTimeBetween('-1 year', 'now'),
            'end_date'  => $this -> faker ->dateTimeBetween('-1 year', 'now'),
            'service_id' => 1,
        ];
    }
}
