<?php

namespace Database\Seeders;


use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Check if the user already exists
        $user = User::firstOrCreate(
            ['email' => 'john@gmail.com'], // Check by email
            [
                'name' => 'John Doe',
                // If a user with this email doesn't exist, create one with the additional fields
                'email' => 'john@gmail.com',
                'password' => bcrypt('password'), // Use a valid hashed password
                // Add any other fields required for creating the User
            ]
        );

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        // ...

        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
