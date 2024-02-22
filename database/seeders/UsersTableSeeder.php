<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'role_id' => 1, // Sesuaikan dengan ID peran 'admin' yang telah dibuat sebelumnya
        ]);

        User::create([
            'name' => 'Teacher',
            'email' => 'teacher@example.com',
            'password' => Hash::make('123456'),
            'role_id' => 2, // Sesuaikan dengan ID peran 'user' yang telah dibuat sebelumnya
        ]);

        User::create([
            'name' => 'Student',
            'email' => 'student@example.com',
            'password' => Hash::make('123456'),
            'role_id' => 3, // Sesuaikan dengan ID peran 'user' yang telah dibuat sebelumnya
        ]);
    }
}
