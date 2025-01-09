<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'department_id' => Department::inRandomOrder()->first()->id,
            'patient_name' =>$this->faker->name(),
            'doctor_id' => Doctor::inRandomOrder()->first()->id,
            'time_appointment' => $this->faker->time('H:i:s', 'now'),
            'date_appointment' => $this->faker->date('Y-m-d', 'now'),
            'status' => $this->faker->randomElement([
               'confirmed',
               'pending',
               'cancelled'
            ]),
            'notes'=>$this->faker->words(7,true),
         ];
    }
}
