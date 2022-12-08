<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::insert([
            ['id' => 1, 'country_id' => 1, 'name' => 'Dhaka'],
            ['id' => 2, 'country_id' => 1, 'name' => 'Khulna'],
            ['id' => 3, 'country_id' => 1, 'name' => 'Comilla'],
            ['id' => 4, 'country_id' => 2, 'name' => 'California'],
            ['id' => 5, 'country_id' => 2, 'name' => 'Texas'],
            ['id' => 6, 'country_id' => 2, 'name' => 'Florida'],
            ['id' => 7, 'country_id' => 3, 'name' => 'Argyll'],
            ['id' => 8, 'country_id' => 3, 'name' => 'Belfast'],
            ['id' => 9, 'country_id' => 3, 'name' => 'Cambridge'],
        ]);
    }
}
