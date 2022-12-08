<?php

namespace Database\Seeders;

use App\Models\InstructorFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstructorFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InstructorFeature::insert([
            ['logo' => 'uploads_demo/instructor_feature/build-brand.png', 'title' => 'Build your Bran', 'subtitle' => 'Serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with', 'created_at' => now(), 'updated_at' => now()],
            ['logo' => 'uploads_demo/instructor_feature/instructor-support-2.png', 'title' => 'Inspire learners', 'subtitle' => 'Serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with', 'created_at' => now(), 'updated_at' => now()],
            ['logo' => 'uploads_demo/instructor_feature/top-instructor-heading-img.png', 'title' => 'Get rewarded', 'subtitle' => 'Serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
