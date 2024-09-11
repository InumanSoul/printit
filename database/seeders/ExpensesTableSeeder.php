<?php

namespace Database\Seeders;

use App\Models\Expenses;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Expenses::factory(50)->create();
    }
}
