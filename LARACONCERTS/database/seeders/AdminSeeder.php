<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = User::create([
            'name' => 'admin',
            'email' =>'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
        ]);
        $user->assignRole('admin');
    }
}
