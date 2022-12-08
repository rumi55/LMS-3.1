<?php

namespace Database\Seeders;

use App\Models\Course_language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course_language::insert([
            ['id' => 1, 'uuid' => Str::uuid()->toString(), 'name' => 'English', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'uuid' => Str::uuid()->toString(), 'name' => 'Bangla', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'uuid' => Str::uuid()->toString(), 'name' => 'Hindi', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'uuid' => Str::uuid()->toString(), 'name' => 'Spanish', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'uuid' => Str::uuid()->toString(), 'name' => 'Arabic', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
