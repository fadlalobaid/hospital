<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date_report'=>$this->faker->date('Y-m-d'),
            'time_report'=>$this->faker->time('H:i:s'),
            'doctor_id'=>Doctor::inRandomOrder()->first()->id,
            'patient_id'=>Patient::inRandomOrder()->first()->id,
            'report'=>$this->faker->words(12,true),
        ];
    }
}
