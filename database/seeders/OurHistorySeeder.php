<?php

namespace Database\Seeders;

use App\Models\OurHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OurHistory::insert([
            ['year' => 1998, 'title' => 'Mere tranquil existence', 'subtitle' => 'Possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart am alone'],
            ['year' => 1998, 'title' => 'Incapable of drawing', 'subtitle' => 'Exquisite sense of mere tranquil existence that I neglect my talents add should be incapable of drawing'],
            ['year' => 1998, 'title' => 'Foliage access trees', 'subtitle' => 'Serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my'],
            ['year' => 1998, 'title' => 'Among grass trickling', 'subtitle' => 'Should be incapable of drawing a single stroke at the present moment; and yet I feel that I never'],
        ]);
    }
}
