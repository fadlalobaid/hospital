<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(2, true),
            'birthday' => $this->faker->date('Y-m-d'),
            'gander' => $this->faker->randomElement([
                "male",
                "female",
            ]),
            'number_phone' => $this->faker->unique()->randomNumber(9, true),
            'email' => $this->faker->unique()->safeEmail(),
          

        ];
    }
}
