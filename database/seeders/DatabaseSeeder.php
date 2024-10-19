<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
       Department::factory(6)->create();
       Doctor::factory(20)->create();
       Patient::factory(30)->create();
       Appointment::factory(40)->create();
       Medicine::factory(15)->create();
       Prescription::factory(15)->create();
        // \App\Models\User::factory(10)->create();
    }
}
