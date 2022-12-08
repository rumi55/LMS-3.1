<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'manage_course']);
        Permission::create(['name' => 'pending_course']);
        Permission::create(['name' => 'hold_course']);
        Permission::create(['name' => 'approved_course']);
        Permission::create(['name' => 'all_course']);
        Permission::create(['name' => 'manage_course_reference']);
        Permission::create(['name' => 'manage_course_category']);
        Permission::create(['name' => 'manage_course_subcategory']);
        Permission::create(['name' => 'manage_course_tag']);
        Permission::create(['name' => 'manage_course_language']);
        Permission::create(['name' => 'manage_course_difficulty_level']);
        Permission::create(['name' => 'manage_instructor']);
        Permission::create(['name' => 'pending_instructor']);
        Permission::create(['name' => 'approved_instructor']);
        Permission::create(['name' => 'all_instructor']);
        Permission::create(['name' => 'add_instructor']);
        Permission::create(['name' => 'manage_student']);
        Permission::create(['name' => 'manage_coupon']);
        Permission::create(['name' => 'manage_promotion']);
        Permission::create(['name' => 'manage_blog']);
        Permission::create(['name' => 'payout']);
        Permission::create(['name' => 'finance']);
        Permission::create(['name' => 'manage_certificate']);
        Permission::create(['name' => 'ranking_level']);
        Permission::create(['name' => 'manage_language']);
        Permission::create(['name' => 'account_setting']);
        Permission::create(['name' => 'support_ticket']);
        Permission::create(['name' => 'manage_contact']);
        Permission::create(['name' => 'application_setting']);
        Permission::create(['name' => 'global_setting']);
        Permission::create(['name' => 'home_setting']);
        Permission::create(['name' => 'mail_configuration']);
        Permission::create(['name' => 'payment_option']);
        Permission::create(['name' => 'content_setting']);
        Permission::create(['name' => 'user_management']);
        Permission::create(['name' => 'manage_affiliate']);
        Permission::create(['name' => 'manage_subscriptions']);
        Permission::create(['name' => 'manage_saas']);
        Permission::create(['name' => 'manage_organization']);
        Permission::create(['name' => 'pending_organization']);
        Permission::create(['name' => 'approved_organization']);
        Permission::create(['name' => 'all_organization']);
        Permission::create(['name' => 'add_organization']);
        Permission::create(['name' => 'skill']);

        $role = Role::where('name', 'Super Admin')->first();
        if ($role){
            $role->givePermissionTo(Permission::all());
        }
    }
}