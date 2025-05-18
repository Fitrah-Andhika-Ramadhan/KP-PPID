<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Create default user
        \App\Models\User::factory()->create([
            'name' => 'Profile User',
            'email' => 'test@example.com',
        ]);
        
        // Run the dummy data seeder
        $this->call([
            DummyDataSeeder::class,
        ]);
    }
}
