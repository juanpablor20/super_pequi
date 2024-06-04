<?php

namespace Database\Factories;

use App\Models\IndexCard;
use Illuminate\Database\Eloquent\Factories\Factory;

class IndexCardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IndexCard::class;


    public function definition()
    {
        return [
            'number' => $this->faker->unique()->randomNumber(),
            'program_id' => 1,
        ];
    }
}
