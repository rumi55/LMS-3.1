<?php

namespace Database\Seeders;

use App\Models\AboutUsGeneral;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsGeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUsGeneral::insert([
            ['gallery_area_title' => 'Mere Tranquil Existence, That I Neglect My Talents Should', 'gallery_area_subtitle' => 'Possession Of My Entire Soul, Like These Sweet Mornings Of Spring Which I Enjoy With My Whole Heart. I Am Alone, And Charm Of Existence In This Spot, Which Was Created For The Bliss Of Souls Like Mine. I Am So Happy, My Dear Friend, So Absorbed In The Exquisite Sense Of Mere Tranquil Existence',
                'gallery_first_image' => 'uploads_demo/gallery/1.jpg', 'gallery_second_image' => 'uploads_demo/gallery/2.jpg', 'gallery_third_image' => 'uploads_demo/gallery/3.jpg',
                'our_history_title' => 'Our History', 'our_history_subtitle' => 'Possession Of My Entire Soul, Like These Sweet Mornings Of Spring Which I Enjoy With My Whole Heart. I Am Alone, And Charm Of Existence In This Spot Which', 'upgrade_skill_logo' => 'uploads_demo/about_us_general/upgrade.jpg', 'upgrade_skill_title' => 'Upgrade Your Skills Today For Upgrading Your Life.',
                'upgrade_skill_subtitle' => 'Noticed by me when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence stalks, and grow familiar with the countless', 'upgrade_skill_button_name' => 'Find Your Course', 'team_member_logo' => 'uploads_demo/about_us_general/team-members-heading-img.png', 'team_member_title' => 'Our Passionate Team Members',
                'team_member_subtitle' => 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', 'instructor_support_title' => 'Quality Course, Instructor And Support', 'instructor_support_subtitle' => 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS']
        ]);
    }
}
