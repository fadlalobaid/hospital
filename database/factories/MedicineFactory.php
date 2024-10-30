<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'medicine_name'=>$this->faker->words(1,true),
            'manufacturer'=>$this->faker->words(1,true),
            'date_created'=>$this->faker->date('Y-m-d','now'),
            'date_end'=>$this->faker->date('Y-m-d'),
            'quantity'=>$this->faker->randomNumber(),
            'price'=>$this->faker->randomNumber(),

        ];
    }
}
