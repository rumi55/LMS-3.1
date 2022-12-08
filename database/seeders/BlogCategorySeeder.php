<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogCategory::insert([
            ['id' => 1, 'uuid' => Str::uuid()->toString(), 'name' => 'Development', 'slug' => 'development', 'status' => 1,'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'uuid' => Str::uuid()->toString(), 'name' => 'IT & Software', 'slug' => 'it-software', 'status' => 1,'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'uuid' => Str::uuid()->toString(), 'name' => 'Data Science', 'slug' => 'data-science', 'status' => 1,'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'uuid' => Str::uuid()->toString(), 'name' => 'Soft Skills', 'slug' => 'soft-skills', 'status' => 1,'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'uuid' => Str::uuid()->toString(), 'name' => 'Business', 'slug' => 'business', 'status' => 1,'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'uuid' => Str::uuid()->toString(), 'name' => 'Marketing', 'slug' => 'marketing', 'status' => 1,'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'uuid' => Str::uuid()->toString(), 'name' => 'Design', 'slug' => 'design', 'status' => 1,'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
