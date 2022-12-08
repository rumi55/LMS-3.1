<?php

namespace Database\Seeders;

use App\Models\Meta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MetaSetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * set default meta
         */

        Meta::insert([
            ['id' => 1, 'uuid' => Str::uuid()->toString(), 'page_name' => 'Home', 'meta_title' => 'Home', 'meta_description' => 'LMSZai Learning management system', 'meta_keyword' => 'Lmszai, Lms, Learning, Course'],
            ['id' => 2, 'uuid' => Str::uuid()->toString(), 'page_name' => 'Courses', 'meta_title' => 'Courses', 'meta_description' => 'LMSZai Course List', 'meta_keyword' => 'Lmszai, Lms, Learning, Course'],
            ['id' => 3, 'uuid' => Str::uuid()->toString(), 'page_name' => 'Courses Details', 'meta_title' => 'Courses Details', 'meta_description' => 'LMSZai Course List', 'meta_keyword' => 'Lmszai, Lms, Learning, Course'],
            ['id' => 4, 'uuid' => Str::uuid()->toString(), 'page_name' => 'Category', 'meta_title' => 'Categories', 'meta_description' => 'All courses categories', 'meta_keyword' => 'course, category'],
            ['id' => 5, 'uuid' => Str::uuid()->toString(), 'page_name' => 'Blog', 'meta_title' => 'Blog', 'meta_description' => 'LMSZAI Blog', 'meta_keyword' => 'blog, course'],
            ['id' => 6, 'uuid' => Str::uuid()->toString(), 'page_name' => 'Blog Details', 'meta_title' => 'Blog Details', 'meta_description' => 'LMSZAI Blog Details', 'meta_keyword' => 'blog, blog details'],
            ['id' => 7, 'uuid' => Str::uuid()->toString(), 'page_name' => 'About Us', 'meta_title' => 'About Us', 'meta_description' => 'LMSZAI About Us', 'meta_keyword' => 'about us'],
            ['id' => 8, 'uuid' => Str::uuid()->toString(), 'page_name' => 'Contact Us', 'meta_title' => 'Contact Us', 'meta_description' => 'LMSZAI contact us', 'meta_keyword' => 'lmszai, contact us'],
            ['id' => 9, 'uuid' => Str::uuid()->toString(), 'page_name' => 'Support Ticket', 'meta_title' => 'Support', 'meta_description' => 'LMSZAI support ticket', 'meta_keyword' => 'lmszai, support, ticket'],
            ['id' => 10, 'uuid' => Str::uuid()->toString(), 'page_name' => 'Privacy Policy', 'meta_title' => 'Privacy Policy', 'meta_description' => 'LMSZAI Privacy Policy', 'meta_keyword' => 'lmszai, privacy, policy'],
            ['id' => 11, 'uuid' => Str::uuid()->toString(), 'page_name' => 'Cookie Policy', 'meta_title' => 'Cookie Policy', 'meta_description' => 'LMSZAI Cookie Policy', 'meta_keyword' => 'lmszai, cookie, policy'],
            ['id' => 12, 'uuid' => Str::uuid()->toString(), 'page_name' => 'FAQ', 'meta_title' => 'FAQ', 'meta_description' => 'LMSZAI FAQ', 'meta_keyword' => 'lmszai, faq'],
			['id' => 13, 'uuid' => Str::uuid()->toString(), 'page_name' => 'Terms & Conditions', 'meta_title' => 'Terms & Conditions', 'meta_description' => 'LMSZAI Terms & Conditions Policy', 'meta_keyword' => 'lmszai, terms, consitions'],
        ]);
    }
}
