<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'member',
            'email' => 'member@example.com',
            'username' => 'member',
            'password' => 'member',
        ]);
    }                                   
}
