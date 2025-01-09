<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_name'=>$this->faker->unique()->userName(),
            'email'=> $this->faker->unique()->safeEmail(),
            'password'=>Hash::make('1234567890'),
            'status'=>$this->faker->randomElement([
                "active",
                "inactive",
            ])

        ];
    }
}
