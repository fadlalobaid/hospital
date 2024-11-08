<?php

namespace Database\Factories;

use App\Models\Department;
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
    public function definition()
    {
        return [
            'department_id' => Department::inRandomOrder()->first()->id,
            'service_name'=>$this->faker->words(2,true),
            'service_charge'=>$this->faker->randomFloat(1,1,599),
            'Doctor_commission'=>$this->faker->randomFloat(1,1,199),
            'discription'=>$this->faker->sentences(10,true),

        ];
    }
}
