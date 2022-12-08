<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Default App Language
         */
        Language::insert([
            ['language' => 'EN ( English )', 'iso_code' => 'en', 'flag' => 'uploads_demo/default/en.png', 'rtl' => 0, 'status' => 1, 'default_language' => 'on'],
            ['language' => 'SA ( Arabic )', 'iso_code' => 'sa', 'flag' => 'uploads_demo/default/sa.png', 'rtl' => 1, 'status' => 1, 'default_language' => 'off']
        ]);
    }
}
