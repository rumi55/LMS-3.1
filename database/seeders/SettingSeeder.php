<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insert([
            ['option_key' => 'app_name', 'option_value' => 'LMSZAI', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'app_email', 'option_value' => 'demo@mail.com', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'app_contact_number', 'option_value' => '(123-458-987254824185)', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'app_location', 'option_value' => '45/7 dreem street, albania dnobod, USA', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'app_date_format', 'option_value' => 'd/m/Y', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'app_timezone', 'option_value' => 'Asia/Dhaka', 'created_at' => now(), 'updated_at' => now()],
			['option_key' => 'allow_preloader', 'option_value' => 1, 'created_at' => now(), 'updated_at' => now()],
			['option_key' => 'app_preloader', 'option_value' => 'uploads_demo/setting/preloader.png', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'app_logo', 'option_value' => 'uploads_demo/setting/logo.png', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'app_fav_icon', 'option_value' => 'uploads_demo/setting/fav-icon.png', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'app_copyright', 'option_value' => '© 2021 LMSZAI. All Rights Reserved.', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'app_developed', 'option_value' => 'Zainiktheme', 'created_at' => now(), 'updated_at' => now()],

			['option_key' => 'og_title', 'option_value' => 'LMSZAI - Learning Management System', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'og_description', 'option_value' => 'Learning Management System', 'created_at' => now(), 'updated_at' => now()],
			
			['option_key' => 'zoom_status', 'option_value' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'bbb_status', 'option_value' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'jitsi_status', 'option_value' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'jitsi_server_base_url', 'option_value' => 'https://meet.jit.si/', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'registration_email_verification', 'option_value' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'footer_quote', 'option_value' => 'Mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present', 'created_at' => now(), 'updated_at' => now()],

			['option_key' => 'paystack_currency', 'option_value' => 'NGN', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'paystack_conversion_rate', 'option_value' => 420, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'paystack_status', 'option_value' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'PAYSTACK_PUBLIC_KEY', 'option_value' => '', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'PAYSTACK_SECRET_KEY', 'option_value' => '', 'created_at' => now(), 'updated_at' => now()],
			
            ['option_key' => 'paypal_currency', 'option_value' => 'USD', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'paypal_conversion_rate', 'option_value' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'paypal_status', 'option_value' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'PAYPAL_MODE', 'option_value' => 'sandbox', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'PAYPAL_CLIENT_ID', 'option_value' => '', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'PAYPAL_SECRET', 'option_value' => '', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'stripe_currency', 'option_value' => 'USD', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'stripe_conversion_rate', 'option_value' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'stripe_status', 'option_value' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'STRIPE_MODE', 'option_value' => 'sandbox', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'STRIPE_SECRET_KEY', 'option_value' => '', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'STRIPE_PUBLIC_KEY', 'option_value' => '', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'razorpay_currency', 'option_value' => 'INR', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'razorpay_conversion_rate', 'option_value' => 78.04, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'razorpay_status', 'option_value' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'RAZORPAY_KEY', 'option_value' => 'rzp_test_jI4LNxngs3tF4n', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'RAZORPAY_SECRET', 'option_value' => 'lZo8JpuK897uLRrnMB9imhIy', 'created_at' => now(), 'updated_at' => now()],

			['option_key' => 'mollie_currency', 'option_value' => 'EUR', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'mollie_conversion_rate', 'option_value' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'mollie_status', 'option_value' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'MOLLIE_KEY', 'option_value' => '', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'im_currency', 'option_value' => 'INR', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'im_conversion_rate', 'option_value' => 79.84, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'im_status', 'option_value' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'IM_API_KEY', 'option_value' => '', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'IM_AUTH_TOKEN', 'option_value' => '', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'IM_URL', 'option_value' => 'https://test.instamojo.com/api/1.1/payment-requests/', 'created_at' => now(), 'updated_at' => now()],
			
            ['option_key' => 'sslcommerz_currency', 'option_value' => 'BDT', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'sslcommerz_conversion_rate', 'option_value' => 92.00, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'sslcommerz_status', 'option_value' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'sslcommerz_mode', 'option_value' => 'sandbox', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'SSLCZ_STORE_ID', 'option_value' => '', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'SSLCZ_STORE_PASSWD', 'option_value' => '', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'MAIL_DRIVER', 'option_value' => 'smtp', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'MAIL_HOST', 'option_value' => 'mailhog', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'MAIL_PORT', 'option_value' => '1025', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'MAIL_USERNAME', 'option_value' => '', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'MAIL_PASSWORD', 'option_value' => "", 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'MAIL_ENCRYPTION', 'option_value' => '', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'MAIL_FROM_ADDRESS', 'option_value' => 'hello@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'MAIL_FROM_NAME', 'option_value' => '${APP_NAME}', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'MAIL_MAILER', 'option_value' => 'smtp', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'update', 'option_value' => 'Save', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'sign_up_left_text', 'option_value' => 'Discover world best online courses here. 24k online course is waiting for you', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'sign_up_left_image', 'option_value' => 'uploads_demo/home/hero-img.png', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'forgot_title', 'option_value' => 'Forgot Password?', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'forgot_subtitle', 'option_value' => 'Enter the email address you used when you joined and we’ll send you instructions to reset your password.
            For security reasons, we do NOT store your password. So rest assured that we will never send your password via email.', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'forgot_btn_name', 'option_value' => 'Send Reset Instructions', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'facebook_url', 'option_value' => '#', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'twitter_url', 'option_value' => '#', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'linkedin_url', 'option_value' => '#', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'pinterest_url', 'option_value' => '#', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'app_instructor_footer_title', 'option_value' => 'Join One Of The World’s Largest Learning Marketplaces.', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'app_instructor_footer_subtitle', 'option_value' => 'Donald valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my tree', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'get_in_touch_title', 'option_value' => 'Get in Touch', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'send_us_msg_title', 'option_value' => 'Send Us a Message', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'contact_us_location', 'option_value' => '32 Yaool, myself down around dupal the street, London', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'contact_us_email_one', 'option_value' => 'mail@lmszai.co.uk', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'contact_us_email_two', 'option_value' => 'info@lmazaiinner.co.uk', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'contact_us_phone_one', 'option_value' => '328-456-07875', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'contact_us_phone_two', 'option_value' => '128-456-07875', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'contact_us_map_link', 'option_value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1839.0179632416985!2d89.5538504127622!3d22.801132631062536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff8f2b1098bf95%3A0xbce09c90b98f8380!2sJust%20Orders%20Khulna!5e0!3m2!1sen!2sbd!4v1636005141952!5m2!1sen!2sbd', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'contact_us_description', 'option_value' => 'Strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal about the human. It might take 6 -12 hour to replay', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'faq_title', 'option_value' => 'Frequently Ask Questions.', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'faq_subtitle', 'option_value' => 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'faq_image_title', 'option_value' => 'Still no luck?', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'faq_image', 'option_value' => 'uploads_demo/setting\faq-img.jpg', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'faq_tab_first_title', 'option_value' => 'Item Support', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'faq_tab_first_subtitle', 'option_value' => 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'faq_tab_sec_title', 'option_value' => 'Licensing', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'faq_tab_sec_subtitle', 'option_value' => 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'faq_tab_third_title', 'option_value' => 'Your Account', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'faq_tab_third_subtitle', 'option_value' => 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'faq_tab_four_title', 'option_value' => 'Tax & Complications', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'faq_tab_four_subtitle', 'option_value' => 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'home_special_feature_first_logo', 'option_value' => 'uploads_demo/setting\feature-icon1.png', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'home_special_feature_first_title', 'option_value' => 'Learn From Experts', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'home_special_feature_first_subtitle', 'option_value' => 'Mornings of spring which I enjoy with my whole heart about the gen', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'home_special_feature_second_logo', 'option_value' => 'uploads_demo/setting/feature-icon2.png', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'home_special_feature_second_title', 'option_value' => 'Earn a Certificate', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'home_special_feature_second_subtitle', 'option_value' => 'Mornings of spring which I enjoy with my whole heart about the gen', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'home_special_feature_third_logo', 'option_value' => 'uploads_demo/setting\feature-icon3.png', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'home_special_feature_third_title', 'option_value' => '5000+ Courses', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'home_special_feature_third_subtitle', 'option_value' => 'Serenity has taken possession of my entire soul, like these sweet spring', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'course_logo', 'option_value' => 'uploads_demo/setting/courses-heading-img.png', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'course_title', 'option_value' => 'A Broad Selection Of Courses', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'course_subtitle', 'option_value' => 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', 'created_at' => now(), 'updated_at' => now()],
			
			['option_key' => 'bundle_course_logo', 'option_value' => 'uploads_demo/setting/bundle-courses-heading-img.png', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'bundle_course_title', 'option_value' => 'Latest Bundle Courses', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'bundle_course_subtitle', 'option_value' => 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'top_category_logo', 'option_value' => 'uploads_demo/setting/categories-heading-img.png', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'top_category_title', 'option_value' => 'Our Top Categories', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'top_category_subtitle', 'option_value' => 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'top_instructor_logo', 'option_value' => 'uploads_demo/setting\top-instructor-heading-img.png', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'top_instructor_title', 'option_value' => 'Top Rated Courses From Our Top Instructor.', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'top_instructor_subtitle', 'option_value' => 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'become_instructor_video', 'option_value' => 'uploads_demo/setting/test.mp4', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'become_instructor_video_preview_image', 'option_value' => 'uploads_demo/setting/video-poster.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'become_instructor_video_logo', 'option_value' => 'uploads_demo/setting/top-instructor-heading-img.png', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'become_instructor_video_title', 'option_value' => 'We Only Accept Professional Courses Form Professional Instructors', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'become_instructor_video_subtitle', 'option_value' => 'Noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'customer_say_logo', 'option_value' => 'uploads_demo/setting/customers-say-heading-img.png', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'customer_say_title', 'option_value' => 'What Our Valuable Customers Say.', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'customer_say_first_name', 'option_value' => 'DANIEL JHON', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'customer_say_first_position', 'option_value' => 'UI/UX DESIGNER', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'customer_say_first_comment_title', 'option_value' => 'Great instructor, great course', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'customer_say_first_comment_description', 'option_value' => 'Wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'customer_say_first_comment_rating_star', 'option_value' => '5', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'customer_say_second_name', 'option_value' => 'NORTH', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'customer_say_second_position', 'option_value' => 'DEVELOPER', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'customer_say_second_comment_title', 'option_value' => 'Awesome course & good response', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'customer_say_second_comment_description', 'option_value' => 'Noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'customer_say_second_comment_rating_star', 'option_value' => '4.5', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'customer_say_third_name', 'option_value' => 'HIBRUPATH', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'customer_say_third_position', 'option_value' => 'MARKETER', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'customer_say_third_comment_title', 'option_value' => 'Fantastic course', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'customer_say_third_comment_description', 'option_value' => 'Noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'customer_say_third_comment_rating_star', 'option_value' => '5', 'created_at' => now(), 'updated_at' => now()],


            ['option_key' => 'achievement_first_logo', 'option_value' => 'uploads_demo/setting\1.png', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'achievement_first_title', 'option_value' => 'Successfully trained', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'achievement_first_subtitle', 'option_value' => '2000+ students', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'achievement_second_logo', 'option_value' => 'uploads_demo/setting\2.png', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'achievement_second_title', 'option_value' => 'Video courses', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'achievement_second_subtitle', 'option_value' => '2000+ students', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'achievement_third_logo', 'option_value' => 'uploads_demo/setting\3.png', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'achievement_third_title', 'option_value' => 'Expert instructor', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'achievement_third_subtitle', 'option_value' => '2000+ students', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'achievement_four_logo', 'option_value' => 'uploads_demo/setting\4.png', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'achievement_four_title', 'option_value' => 'Proudly Received', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'achievement_four_title', 'option_value' => 'Proudly Received', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'achievement_four_subtitle', 'option_value' => '2000+ students', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'support_faq_title', 'option_value' => 'Frequently Ask Questions. 2', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'support_faq_subtitle', 'option_value' => 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS 3', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'ticket_title', 'option_value' => 'Is That Helpful?', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'ticket_subtitle', 'option_value' => 'Are You Still Confusion?', 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'cookie_button_name', 'option_value' => 'Allow cookies', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'cookie_msg', 'option_value' => 'Your experience on this site will be improved by allowing cookies', 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'COOKIE_CONSENT_STATUS', 'option_value' => true, 'created_at' => now(), 'updated_at' => now()],

            ['option_key' => 'platform_charge', 'option_value' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'sell_commission', 'option_value' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['option_key' => 'app_version', 'option_value' => 3, 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
