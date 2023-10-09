<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Electronics', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Computers', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Smart Home', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Arts & Crafts', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Beauty and personal care', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
