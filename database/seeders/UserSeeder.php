<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;      // ← tambahin ini
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'google_id' => '',
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'), // Catatan: pastikan panjang hash/password aman
                'phone' => '081234567890',
                'address' => 'Jl. Merdeka No. 10, Jakarta',
                'role' => 'admin',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'google_id' => '',
                'name' => 'Hana Setiawan',
                'email' => 'hana@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '089876543210',
                'address' => 'Jl. Kebon Jeruk No. 5, Bandung',
                'role' => 'user',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
