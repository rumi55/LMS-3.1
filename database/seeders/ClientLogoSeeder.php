<?php

namespace Database\Seeders;

use App\Models\ClientLogo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientLogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClientLogo::insert([
            ['name' => 'Ovita', 'logo' => 'uploads_demo/client-logo/1.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vigon', 'logo' => 'uploads_demo/client-logo/2.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Betribe', 'logo' => 'uploads_demo/client-logo/3.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Parsit', 'logo' => 'uploads_demo/client-logo/4.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Karika', 'logo' => 'uploads_demo/client-logo/5.png', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
