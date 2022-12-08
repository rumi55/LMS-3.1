<?php

namespace Database\Seeders;

use App\Models\Instructor;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            ['id' => 1, 'name' => 'Administration', 'email' => 'admin@gmail.com', 'email_verified_at' => now(),'password' => Hash::make(123456), 'role' => 1, 'phone_number' => '+8801999999999',
                'address' => 'Dhaka, Bangladesh', 'image' => 'uploads_demo/user/admin-avatar.jpg', 'created_at' => now(), 'updated_at' => now()]
        ]);

        $user = User::where('email', 'admin@gmail.com')->first();
        if ($user){
            $role = Role::first();
            if ($role){
                $user->assignRole($role);
            }
        }

    }
}
