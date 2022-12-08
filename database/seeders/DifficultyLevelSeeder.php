<?php

namespace Database\Seeders;

use App\Models\Difficulty_level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DifficultyLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Difficulty_level::insert([
            ['id' => 1, 'uuid' => Str::uuid()->toString(), 'name' => 'Higher', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'uuid' => Str::uuid()->toString(), 'name' => 'Medium', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
