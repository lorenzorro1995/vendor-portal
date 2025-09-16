<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(AdminUserSeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => bcrypt('1234qwer'), // Ensure you use bcrypt for password hashing
            'role' => 'vendor',
        ]);
    }
}
