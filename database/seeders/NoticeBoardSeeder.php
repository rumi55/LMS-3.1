<?php

namespace Database\Seeders;

use App\Models\NoticeBoard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NoticeBoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NoticeBoard::insert([
            ['uuid' => Str::uuid()->toString(), 'user_id' => 2, 'course_id' => 1, 'topic' => 'Topic for Notice Board','details' => 'This is a description', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
