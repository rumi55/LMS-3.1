<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::insert([
            ['title' => 'Management', 'status' => 1, 'description' => 'Management'],
            ['title' => 'Web Development', 'status' => 1, 'description' => 'Web Development'],
            ['title' => 'Mobile Development', 'status' => 1, 'description' => 'Mobile Development'],
        ]);
    }
}
