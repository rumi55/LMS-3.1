<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['id' => 1, 'uuid' => Str::uuid()->toString(), 'name' => 'Development', 'image' => 'uploads_demo/category/1.png', 'is_feature' => 'yes', 'slug' => 'development', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'uuid' => Str::uuid()->toString(), 'name' => 'IT & Software', 'image' => 'uploads_demo/category/2.png', 'is_feature' => 'yes', 'slug' => Str::slug('IT & Software'), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'uuid' => Str::uuid()->toString(), 'name' => 'Office Productivity', 'image' => 'uploads_demo/category/3.png', 'is_feature' => 'yes', 'slug' => 'office-productivity', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'uuid' => Str::uuid()->toString(), 'name' => 'Personal Development', 'image' => 'uploads_demo/category/4.png', 'is_feature' => 'yes', 'slug' => 'personal-development', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'uuid' => Str::uuid()->toString(), 'name' => 'Business', 'is_feature' => 'no', 'image' => null, 'slug' => 'business', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'uuid' => Str::uuid()->toString(), 'name' => 'Marketing', 'is_feature' => 'no', 'image' => null, 'slug' => 'marketing', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'uuid' => Str::uuid()->toString(), 'name' => 'Design', 'is_feature' => 'no', 'image' => null, 'slug' => 'design', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'uuid' => Str::uuid()->toString(), 'name' => 'Health & Fitness', 'is_feature' => 'no', 'image' => null, 'slug' => Str::slug('health-fitness'), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'uuid' => Str::uuid()->toString(), 'name' => 'Finance & Accounting', 'is_feature' => 'no', 'image' => null, 'slug' => Str::slug('Finance & Accounting'), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
