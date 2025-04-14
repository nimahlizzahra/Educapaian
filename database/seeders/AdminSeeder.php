<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'smkiutama@gmail.com'], // Email tetap
            [
                'name' => 'Informatika Utama', // Bisa diganti sesuai kebutuhan
                'password' => Hash::make('utama123'), // Ganti dengan password yang aman
                'role' => 'admin', // Pastikan role ada di database
            ]
        );
    }
}
