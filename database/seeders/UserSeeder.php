<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'admin',
            'email'=>'hospital@example.com',
            'password'=>Hash::make('123456789'),


        ]);
        User::create([
            'name'=>'admin',
            'email'=>'hospital2@example.com',
            'password'=>Hash::make('1234567890'),


        ]);
        User::create([
            'name'=>'admin',
            'email'=>'hospital3@example.com',
            'password'=>Hash::make('1234567890'),


        ]);
    }
}
