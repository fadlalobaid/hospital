<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nurse>
 */
class NurseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            // 'user_id'=>User::inRandomOrder()->first()->id,
            'department_id' => Department::inRandomOrder()->first()->id,
            'birthday' => $this->faker->date('Y-m-d','now'),
            'email' => $this->faker->unique()->safeEmail(),
            'gander' => $this->faker->randomElement([
                "male",
                "female",
            ]),
            'phone' => $this->faker->unique()->randomNumber(9, true),
            'country' => $this->faker->countryCode(2),
            'city'=>$this->faker->city(),
            'street'=>$this->faker->streetName()
        ];
    }
}
