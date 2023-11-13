<?php

namespace Database\Seeders;

use App\Models\Forms;
use Illuminate\Database\Seeder;

class FormsTableSeeder extends Seeder
{
    public function run()
    {
        // factory(Forms::class, 25)->create();
        Forms::factory()->count(50)->create();
    }
}
