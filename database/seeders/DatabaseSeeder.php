<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Bryan Hanggara',
            'password' => bcrypt('adminganteng'),
            'email' => 'admininaja@gmail.com',
            'jabatan_id' => 1,
            'roles' => 'ADMIN'
        ]);
        
    }
}
