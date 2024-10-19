<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
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
            'appointment_date'=>$this->faker->date('Y-m-d'),
            'appointment_time'=>$this->faker->time('h:i:s','now')
        ];
    }
}
