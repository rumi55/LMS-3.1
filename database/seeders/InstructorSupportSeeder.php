<?php

namespace Database\Seeders;

use App\Models\InstructorSupport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstructorSupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InstructorSupport::insert([
            ['logo' => 'uploads_demo/instructor_support/instructor-support-1.png', 'title' => 'Courses', 'subtitle' => 'Single stroke at the present moment and yet I feel that was', 'button_name' => 'Popular Courses', 'button_link' => 'http://lmszai.zainiktheme.com/courses', 'created_at' => now(), 'updated_at' => now()],
            ['logo' => 'uploads_demo/instructor_support/instructor-support-2.png', 'title' => 'Expert instructor', 'subtitle' => 'Single stroke at the present moment and yet I feel that was', 'button_name' => 'Explore Instructor', 'button_link' => 'http://lmszai.zainiktheme.com/all-instructor', 'created_at' => now(), 'updated_at' => now()],
            ['logo' => 'uploads_demo/instructor_support/instructor-support-3.png', 'title' => '27/4 online support', 'subtitle' => 'Single stroke at the present moment and yet I feel that was', 'button_name' => 'Support Center', 'button_link' => 'http://lmszai.zainiktheme.com/support-ticket-faq', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
