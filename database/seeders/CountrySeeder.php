<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::insert([
            ['id' => 1, 'short_name' => 'BD', 'country_name' => 'Bangladesh', 'flag' => '', 'slug' => Str::slug('Bangladesh'),'phonecode' => '+88','continent' => 'Asia'],
            ['id' => 2, 'short_name' => 'USA', 'country_name' => 'United States', 'flag' => '', 'slug' => Str::slug('United States'),'phonecode' => '+1','continent' => 'North America'],
            ['id' => 3, 'short_name' => 'UK', 'country_name' => 'United Kingdom', 'flag' => '', 'slug' => Str::slug('United Kingdom'),'phonecode' => '+44','continent' => 'Europe'],
        ]);
    }
}
