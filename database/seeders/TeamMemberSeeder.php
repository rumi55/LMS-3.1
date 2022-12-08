<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeamMember::insert([
            ['image' => 'uploads_demo/team_member/1.jpg', 'name' => 'Arnold keens', 'designation' => 'CREATIVE DIRECTOR', 'created_at' => now(), 'updated_at' => now()],
            ['image' => 'uploads_demo/team_member/2.jpg', 'name' => 'James Bond', 'designation' => 'Designer', 'created_at' => now(), 'updated_at' => now()],
            ['image' => 'uploads_demo/team_member/3.jpg', 'name' => 'Ketty Perry', 'designation' => 'Customer Support', 'created_at' => now(), 'updated_at' => now()],
            ['image' => 'uploads_demo/team_member/4.jpg', 'name' => 'Scarlett Johansson', 'designation' => 'CREATIVE DIRECTOR', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
