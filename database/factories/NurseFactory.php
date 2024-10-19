<?php

namespace Database\Factories;

use App\Models\Department;
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
            'department_id'=>Department::inRandomOrder()->first()->id,
            'name'=>$this->faker->words(2,true),
            'birthday'=>$this->faker->date('Y-m-d'),
            'gander'=>$this->faker->randomElement([
                "male",
                "female"
            ]),
            'email'=>$this->faker->safeEmail(),
            'hours_work'=>$this->faker->randomNumber(),
        ];
    }
}
