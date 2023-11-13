<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnologiesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('laravel_technologies')->insert([
            ['proficient_language' => 'HTML'],
            ['proficient_language' => 'PHP'],
            ['proficient_language' => 'CSS'],
            ['proficient_language' => 'Java'],
            ['proficient_language' => 'Ruby'],
        ]);
    }
}
