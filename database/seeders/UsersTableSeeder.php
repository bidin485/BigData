<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //admin
            [
                'name' =>  'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],

            //agent
            [
                'name' =>  'Patron',
                'email' => 'agent@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'patron',
            ],

            //user
            [
                'name' =>  'Researcher',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'research_assistant',
            ]
        ]);
    }
}
