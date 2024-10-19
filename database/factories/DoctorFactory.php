<?php

namespace Database\Factories;

use App\Models\Department;
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
            'name'=>$this->faker->words(2,true),
            'discription'=>$this->faker->words(15,true),
            'department_id'=>Department::inRandomOrder()->first()->id,
            'email' => $this->faker->unique()->safeEmail(),
            'gender'=>$this->faker->randomElement([
                "male",
                "female",
            ]),
            'Specialization'=>$this->faker->words(1,true),


        ];
    }
}
