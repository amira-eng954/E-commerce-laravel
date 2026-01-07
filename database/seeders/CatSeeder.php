<?php

namespace Database\Seeders;

use App\Models\Cat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Cat::factory(3)->create();
    }
}
