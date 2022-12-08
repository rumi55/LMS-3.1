<?php

namespace Database\Seeders;

use App\Models\InstructorProcedure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstructorProcedureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InstructorProcedure::insert([
            ['image' => 'uploads_demo/instructor_procedure/become-instructor-1.jpg', 'title' => 'Plan Your Curriculum', 'subtitle' => 'Serenity has taken possession of my entire soul, like these sweet mornings spring which I enjoy with my whole heart. I am alone, and feel the charm existence in this spot, which was created for the bliss of souls like mine so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.', 'created_at' => now(), 'updated_at' => now()],
            ['image' => 'uploads_demo/instructor_procedure/become-instructor-2.jpg', 'title' => 'Plan Your Curriculum', 'subtitle' => 'Serenity has taken possession of my entire soul, like these sweet mornings spring which I enjoy with my whole heart. I am alone, and feel the charm existence in this spot, which was created for the bliss of souls like mine so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.', 'created_at' => now(), 'updated_at' => now()],
            ['image' => 'uploads_demo/instructor_procedure/become-instructor-3.jpg', 'title' => 'Plan Your Curriculum', 'subtitle' => 'Serenity has taken possession of my entire soul, like these sweet mornings spring which I enjoy with my whole heart. I am alone, and feel the charm existence in this spot, which was created for the bliss of souls like mine so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
