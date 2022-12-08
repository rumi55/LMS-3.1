<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::insert([
            ['id' => 1, 'state_id' => 1, 'name' => 'Dhanmondi'],
            ['id' => 2, 'state_id' => 1, 'name' => 'Bannai'],
            ['id' => 3, 'state_id' => 2, 'name' => 'Nirala'],
            ['id' => 4, 'state_id' => 2, 'name' => 'Zero Point'],
            ['id' => 5, 'state_id' => 3, 'name' => 'Tomchombridge'],
            ['id' => 6, 'state_id' => 3, 'name' => 'Cantonment'],
            ['id' => 7, 'state_id' => 4, 'name' => 'Acton'],
            ['id' => 8, 'state_id' => 4, 'name' => 'Alamo'],
            ['id' => 9, 'state_id' => 5, 'name' => 'Albin'],
            ['id' => 10, 'state_id' => 6, 'name' => 'Bartow'],
            ['id' => 11, 'state_id' => 7, 'name' => 'Oban'],
            ['id' => 12, 'state_id' => 8, 'name' => 'Holywood'],
            ['id' => 13, 'state_id' => 9, 'name' => 'Ely'],
        ]);
    }
}
