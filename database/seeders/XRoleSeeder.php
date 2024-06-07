<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use MIMAXUZ\LRoles\Models\XRoles;

class XRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        XRoles::insert([
            [
                'name' => 'Super Admin',
                'slug' => 'super-admin'
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin'
            ],
            [
                'name' => 'Sklat',
                'slug' => 'sklat'
            ],
            [
                'name' => 'Shop',
                'slug' => 'shop'
            ]
        ]);
    }
}
