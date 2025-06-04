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
            'nom' => 'Test User',
            'email' => 'test@example.com',
            'mot_de_passe' => Hash::make('password123'),
            'role' => 'admin',
            'date_inscription' => now(),
        ]);
        

        User::create([
            'nom' => 'Jane Smith',
            'email' => 'jane@example.com',
            'mot_de_passe' => Hash::make('password456'),
            'role' => 'user',
            'date_inscription' => now(),
        ]);
    }
}
