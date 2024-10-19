<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prescription>
 */
class PrescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'doctor_id'=>Doctor::inRandomOrder()->first()->id,
            'patient_id'=>Patient::inRandomOrder()->first()->id,
            'recipe_name'=>$this->faker->words(2,true),
            'recipe_date'=>$this->faker->date('Y-m-d'),
            'instructions'=>$this->faker->words(12,true)

        ];
    }
}
