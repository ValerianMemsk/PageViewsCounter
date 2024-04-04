<?php

namespace Database\Seeders;

use App\Models\PageViewLog;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\PageViewLogFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password'
        ]);

        PageViewLog::factory(100)->create();
    }
}
