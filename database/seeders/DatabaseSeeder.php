<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Pharmacist;
use App\Models\Prescription;
use App\Models\Report;
use App\Models\Service;
use App\Models\User;
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
       Admin::factory(5)->create();
       Department::factory(6)->create();
       Doctor::factory(20)->create();
       Patient::factory(40)->create();
       Medicine::factory(15)->create();
      Prescription::factory(15)->create();
       Nurse::factory(30)->create();
       Report::factory(30)->create();
       Appointment::factory( 30)->create();
       Service::factory( 30)->create();
       User::factory(7)->create();
        // \App\Models\User::factory(10)->create();
    }
}
