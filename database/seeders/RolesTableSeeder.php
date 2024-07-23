<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'admin'],
            ['name' => 'owner'],
            ['name' => 'seller'],
            ['name' => 'manager'],
            ['name' => 'accountant'],
        ];

        Roles::factory()->createMany($roles);
    }
}
