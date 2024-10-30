<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DoctorFactory extends Factory
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
            'department_id' => Department::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'specialization'=>$this->faker->words(1,true),
            'birthday' => $this->faker->date('Y-m-d'),
            'email' => $this->faker->unique()->safeEmail(),
            'gander' => $this->faker->randomElement([
                "male",
                "female",
            ]),
            'phone' => $this->faker->unique()->randomNumber(9, true),
             'country' => $this->faker->countryCode(),
            'city'=>$this->faker->city(),
            'street'=>$this->faker->words(2,true)


        ];
    }
}
