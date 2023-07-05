<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'ADMIN',
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('123456'),
            'email_verified_at' => now(),
        ]);

        $user->assignRole('Admin');
    }
}
