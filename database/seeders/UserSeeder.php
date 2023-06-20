<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // WithoutModelEvents::class;
        $admin = [
            'name' => 'Admin',
            'email' => 'admin@admin',
            'role' => 'admin',
            'password' => 'admin',
        ];

        $user = [
            'name' => 'User',
            'email' => 'user@user',
            'role' => 'user',
            'password' => 'user',
        ];

        User::create($admin);
        User::create($user);
    }
}