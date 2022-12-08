<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PackagePlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authUser = User::where('role', USER_ROLE_ADMIN)->first();
        $packageData = [
            'uuid' => Str::uuid()->toString(),
            'user_id' => $authUser->id,
            'title' => 'Starter',
            'package_type' => PACKAGE_TYPE_SUBSCRIPTION,
            'slug' => 'starter-'.rand(100000, 999999),
            'monthly_price' => 0,
            'discounted_monthly_price' => 0,
            'yearly_price' => 0,
            'discounted_yearly_price' => 0,
            'course' => 0,
            'bundle_course' => 0,
            'consultancy' => 0,
            'device' => 1,
            'in_home' => 1,
            'order' => 1,
            'is_default' => 1,
            'icon' => 'frontend/assets/img/package_icon.png',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        
        Package::insert($packageData);

        $packageDataInstructorSaas = [
            'uuid' => Str::uuid()->toString(),
            'user_id' => $authUser->id,
            'title' => 'Starter',
            'package_type' => PACKAGE_TYPE_SAAS_INSTRUCTOR,
            'slug' => 'starter-'.rand(100000, 999999),
            'monthly_price' => 0,
            'discounted_monthly_price' => 0,
            'yearly_price' => 0,
            'discounted_yearly_price' => 0,
            'course' => 5,
            'bundle_course' => 1,
            'consultancy' => 10,
            'subscription_course' => 1,
            'admin_commission' => 20,
            'device' => 1,
            'in_home' => 1,
            'order' => 1,
            'is_default' => 1,
            'icon' => 'frontend/assets/img/package_icon.png',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Package::insert($packageDataInstructorSaas);
       
        $packageDataOrganizationSaas = [
            'uuid' => Str::uuid()->toString(),
            'user_id' => $authUser->id,
            'title' => 'Starter',
            'package_type' => PACKAGE_TYPE_SAAS_ORGANIZATION,
            'slug' => 'starter-'.rand(100000, 999999),
            'monthly_price' => 0,
            'student' => 5,
            'instructor' => 2,
            'discounted_monthly_price' => 0,
            'yearly_price' => 0,
            'discounted_yearly_price' => 0,
            'course' => 5,
            'bundle_course' => 1,
            'consultancy' => 10,
            'device' => 1,
            'in_home' => 1,
            'order' => 1,
            'is_default' => 1,
            'subscription_course' => 1,
            'admin_commission' => 20,
            'icon' => 'frontend/assets/img/package_icon.png',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        
        Package::insert($packageDataOrganizationSaas);
    }
}
