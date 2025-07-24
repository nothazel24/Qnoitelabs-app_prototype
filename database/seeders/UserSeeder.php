<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Qnoite Administrator',
            'email' => 'admin@qnoite.com',
            'password' => Hash::make('admin1234'),
            'phone' => '081370021414',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Ryan bajindul',
            'email' => 'iann@qnoite.com',
            'password' => Hash::make('author1234'),
            'phone' => '081370021414',
            'role' => 'author',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Yamada ryo',
            'email' => 'ryoo@qnoite.com',
            'password' => Hash::make('author12345'),
            'phone' => '081370021414',
            'role' => 'user',
            'email_verified_at' => now(),
        ]);

    }
}