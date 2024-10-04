<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DateTime;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'user_name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'email_verified_at' => new DateTime(),
            'password' => Hash::make('password'),
            'age' => rand(0, 120),
            'visibility_setting' => (bool) rand(0, 1),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            
        ]);
    }
}
