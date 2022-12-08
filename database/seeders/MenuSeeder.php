<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = Menu::all();
        foreach($menus as $menu)
        {
            Menu::where('id', $menu->id)->delete();
        }

        Menu::create(['id' => 1, 'name' => 'Blogs', 'slug' => 'blogs', 'url' => null , 'type' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now()]);
        Menu::create(['id' => 2, 'name' => 'About', 'slug' => 'about', 'url' => null , 'type' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now()]);
        Menu::create(['id' => 3, 'name' => 'Contact', 'slug' => 'contact', 'url' => null , 'type' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now()]);
        Menu::create(['id' => 4, 'name' => 'Support', 'slug' => 'support-ticket-faq', 'url' => null , 'type' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now()]);
        Menu::create(['id' => 5, 'name' => 'Privacy Policy', 'slug' => 'privacy-policy', 'url' => null , 'type' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now()]);
        Menu::create(['id' => 6, 'name' => 'Cookie Policy', 'slug' => 'cookie-policy', 'url' => null , 'type' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now()]);
		Menu::create(['id' => 7, 'name' => 'Terms & Conditions', 'slug' => 'terms-conditions', 'url' => null , 'type' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now()]);
    }
}
