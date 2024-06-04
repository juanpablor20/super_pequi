<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Contracts\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users>
 */
class UsersFactory extends Factory
{

    protected $model = Users::class;


    public function definition(): array
    {
        return [
            'names' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'type_identification' => $this->faker->randomElement(['cc', 'ti']),
            'number_identification' => $this->faker->unique()->randomNumber(9, true),
            'sex_user' => $this->faker->randomElement(['m', 'f']),
            'gender_sex' => $this->faker->randomElement(['hombre', 'mujer']),

        ];
    }
}
