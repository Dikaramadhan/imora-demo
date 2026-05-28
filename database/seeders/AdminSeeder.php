<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus admin lama jika ada (opsional, biar tidak duplikat saatSeeder diulang)
        User::where('email', 'admin@imora.com')->delete();

        // Buat user baru sebagai Admin
        User::create([
            'name'     => 'Admin Imora',
            'email'    => 'admin@imora.com',
            'password' => Hash::make('password123'), // Ganti dengan password yang aman!
            'is_admin' => true, // Set sebagai admin
        ]);
    }
}
