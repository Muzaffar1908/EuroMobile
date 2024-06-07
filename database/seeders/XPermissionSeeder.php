<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use MIMAXUZ\LRoles\Models\XPermissions;

class XPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        XPermissions::insert([
            [
                'name' => 'Grand Access',
                'slug' => 'grand'
            ],
            [
                'name' => 'Create Access',
                'slug' => 'create'
            ],
            [
                'name' => 'Update Access',
                'slug' => 'update'
            ],
            [
                'name' => 'Read Access',
                'slug' => 'read'
            ],
            [
                'name' => 'Delete Access',
                'slug' => 'delete'
            ]
        ]);
    }
}
