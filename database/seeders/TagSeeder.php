<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::insert([
           ['id' => 1, 'uuid' => Str::uuid()->toString(), 'name' => 'Design', 'slug' => Str::slug('Design'), 'created_at' => now(), 'updated_at' => now()],
           ['id' => 2, 'uuid' => Str::uuid()->toString(), 'name' => 'Development', 'slug' => Str::slug('Development'), 'created_at' => now(), 'updated_at' => now()],
           ['id' => 3, 'uuid' => Str::uuid()->toString(), 'name' => 'IT', 'slug' => Str::slug('IT'), 'created_at' => now(), 'updated_at' => now()],
           ['id' => 4, 'uuid' => Str::uuid()->toString(), 'name' => 'Programming', 'slug' => Str::slug('Programming'), 'created_at' => now(), 'updated_at' => now()],
           ['id' => 5, 'uuid' => Str::uuid()->toString(), 'name' => 'Travel', 'slug' => Str::slug('Travel'), 'created_at' => now(), 'updated_at' => now()],
           ['id' => 6, 'uuid' => Str::uuid()->toString(), 'name' => 'Music', 'slug' => Str::slug('Music'), 'created_at' => now(), 'updated_at' => now()],
           ['id' => 7, 'uuid' => Str::uuid()->toString(), 'name' => 'Digital marketing', 'slug' => Str::slug('Digital marketing'), 'created_at' => now(), 'updated_at' => now()],
           ['id' => 8, 'uuid' => Str::uuid()->toString(), 'name' => 'Science', 'slug' => Str::slug('Science'), 'created_at' => now(), 'updated_at' => now()],
           ['id' => 9, 'uuid' => Str::uuid()->toString(), 'name' => 'Math', 'slug' => Str::slug('Math'), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
