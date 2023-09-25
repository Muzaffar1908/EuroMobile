<?php

namespace Database\Seeders;

use MIMAXUZ\LRoles\Models\XRoles;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'name' => 'Administrator',
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
