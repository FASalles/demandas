<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Sector;
use App\Models\System;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sector::factory(5)->create();
    }
}
