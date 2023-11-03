<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\labels;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        labels::factory()->create([
            'title' => 'high',
        ]);
        labels::factory()->create([
            'title' => 'medium',
        ]);
        labels::factory()->create([
            'title' => 'low',
        ]);
    }
}
