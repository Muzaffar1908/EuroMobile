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
            'name' => 'Super Admin',
            'email' => 'superadmin@admin.uz',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.uz',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Sklat',
            'email' => 'sklat@sklat.uz',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Shop',
            'email' => 'shop@shop.uz',
            'password' => Hash::make('password')
        ]);
    }
}
