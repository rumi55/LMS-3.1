<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::insert([
            ['id' => 1, 'uuid' => Str::uuid()->toString(), 'category_id' => 1, 'name' => 'Web Development', 'slug' => Str::slug('Web Development'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'uuid' => Str::uuid()->toString(), 'category_id' => 1, 'name' => 'Data Science', 'slug' => Str::slug('Data Science'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'uuid' => Str::uuid()->toString(), 'category_id' => 1, 'name' => 'Mobile Development', 'slug' => Str::slug('Mobile Development'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'uuid' => Str::uuid()->toString(), 'category_id' => 1, 'name' => 'Programming Language', 'slug' => Str::slug('Programming Language'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'uuid' => Str::uuid()->toString(), 'category_id' => 1, 'name' => 'Game Development', 'slug' => Str::slug('Game Development'), 'created_at' => now(), 'updated_at' => now()],

            ['id' => 6, 'uuid' => Str::uuid()->toString(), 'category_id' => 2, 'name' => 'IT Certifications', 'slug' => Str::slug('IT Certifications'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'uuid' => Str::uuid()->toString(), 'category_id' => 2, 'name' => 'Network & Security', 'slug' => Str::slug('Network & Security'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'uuid' => Str::uuid()->toString(), 'category_id' => 2, 'name' => 'Hardware', 'slug' => Str::slug('Hardware'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'uuid' => Str::uuid()->toString(), 'category_id' => 2, 'name' => 'Operating System & Servers', 'slug' => Str::slug('Operating System & Servers'), 'created_at' => now(), 'updated_at' => now()],

            ['id' => 10, 'uuid' => Str::uuid()->toString(), 'category_id' => 3, 'name' => 'Microsoft', 'slug' => Str::slug('Microsoft'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'uuid' => Str::uuid()->toString(), 'category_id' => 3, 'name' => 'Apple', 'slug' => Str::slug('Apple'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'uuid' => Str::uuid()->toString(), 'category_id' => 3, 'name' => 'Google', 'slug' => Str::slug('Google'), 'created_at' => now(), 'updated_at' => now()],

            ['id' => 13, 'uuid' => Str::uuid()->toString(), 'category_id' => 4, 'name' => 'Career Development', 'slug' => Str::slug('Career Development'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'uuid' => Str::uuid()->toString(), 'category_id' => 4, 'name' => 'Creativity', 'slug' => Str::slug('Creativity'), 'created_at' => now(), 'updated_at' => now()],

            ['id' => 15, 'uuid' => Str::uuid()->toString(), 'category_id' => 5, 'name' => 'Communication', 'slug' => Str::slug('Communication'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 16, 'uuid' => Str::uuid()->toString(), 'category_id' => 5, 'name' => 'Management', 'slug' => Str::slug('Management'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 17, 'uuid' => Str::uuid()->toString(), 'category_id' => 5, 'name' => 'Sales', 'slug' => Str::slug('Sales'), 'created_at' => now(), 'updated_at' => now()],

            ['id' => 18, 'uuid' => Str::uuid()->toString(), 'category_id' => 7, 'name' => 'Web Design', 'slug' => Str::slug('Web Design'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 19, 'uuid' => Str::uuid()->toString(), 'category_id' => 7, 'name' => 'Graphic Design', 'slug' => Str::slug('Graphic Design'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 20, 'uuid' => Str::uuid()->toString(), 'category_id' => 7, 'name' => 'Game Design', 'slug' => Str::slug('Game Design'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 21, 'uuid' => Str::uuid()->toString(), 'category_id' => 7, 'name' => 'Fashion Design', 'slug' => Str::slug('Fashion Design'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 22, 'uuid' => Str::uuid()->toString(), 'category_id' => 7, 'name' => 'User Experience Design', 'slug' => Str::slug('User Experience Design'), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
