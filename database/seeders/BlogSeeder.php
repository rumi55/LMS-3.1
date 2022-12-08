<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::insert([
            ['uuid' => Str::uuid()->toString(), 'user_id'=> 1, 'title'=>'60 Common C# Interview Questions in 2022: Ace Your Next Interview',
                'slug' => Str::slug('60 Common C# Interview Questions in 2022: Ace Your Next Interview'),
                'details' => 'Getting hired as a programmer can be a challenge. There’s a lot of talent out there, and there’s a lot of competition. Many employers are wary of “paper programmers”; people who have no programming experience but just a degree. Because of this, they often ask in-depth programming questions during their interview. These questions can be hard to answer if you haven’t properly prepared. In this article, I’ll help you prepare to ace your next interview with these questions related to the C# programming language. At the same time, you might want to practice with some C# projects. These 50 essential C# questions and answers will help you understand the technical concepts of the language. You’ll walk into a meeting with the hiring manager with confidence. As a developer myself, I use these concepts daily.',
                'image' => 'uploads_demo/blog/1.jpg', 'status' => 1, 'blog_category_id' => 1, 'created_at' => now(), 'updated_at' => now()
            ], ['uuid' => Str::uuid()->toString(), 'user_id'=> 1, 'title'=>'PostgreSQL vs. MySQL: Which SQL Platform Should You Use?',
                'slug' => Str::slug('PostgreSQL vs. MySQL: Which SQL Platform Should You Use?'),
                'details' => 'MySQL and PostgreSQL are both leading database technologies built on a foundation of SQL: Structured Query Language. SQL forms the basis of how to create, access, update, and otherwise interact with data stored in a relational database. While MySQL has been the most popular platform for many years, PostgreSQL is another major contender. Many database administrators and developers will know both technologies, which are much more similar than they are different. You can learn more about the history of SQL and how the various “flavors” came to be by watching this brief video: Depending on what you’re trying to create, the data you’re trying to manage, and your own background as a programmer or analyst, you may find one language preferable over the other. But in terms of popularity and marketability, both are widely used, with MySQL maintaining the advantage here. Compared to PostgreSQL, MySQL has the largest market share and, therefore, the most job opportunities. Here’s what you need to know about MySQL vs. PostgreSQL — the differences, benefits, and disadvantages — as well as some basic information about SQL and database platforms.',
                'image' => 'uploads_demo/blog/2.jpg', 'status' => 1, 'blog_category_id' => 2, 'created_at' => now(), 'updated_at' => now()
            ], ['uuid' => Str::uuid()->toString(), 'user_id'=> 1, 'title'=>'Java vs. Python: Which Is the Best Programming Language for You?',
                'slug' => Str::slug('Java vs. Python: Which Is the Best Programming Language for You?'),
                'details' => 'Java and Python are both excellent choices for a beginning programmer. You really can’t go wrong by choosing either one. Here are some things these languages have in common. Both are popular and in high demand.Both are open source and don’t require a paid license to use for developers.  In the case of Java, if you use the official Oracle Java version, there may be a fee for commercial use payable by your customer/employer when deploying your Java application.  However, there are free runtime versions available from multiple vendors as well. You can get started coding in either language today as long as you have an internet connection to download the installation files and a computer that runs Windows, OS X, or Linux.The two languages do have their differences, and developers sometimes prefer one or the other for various reasons. Below is a discussion of those reasons, with hopefully enough information to help you decide which language is the one for you.',
                'image' => 'uploads_demo/blog/3.jpg', 'status' => 1, 'blog_category_id' => 1, 'created_at' => now(), 'updated_at' => now()
            ], ['uuid' => Str::uuid()->toString(), 'user_id'=> 1, 'title'=>'Learn Coding in Scratch with a Cool Game Idea',
                'slug' => Str::slug('Learn Coding in Scratch with a Cool Game Idea'),
                'details' => 'A few years ago, the creation of programs and applications was aimed at only a few people with specialized knowledge. Lately, though, programming for beginners has been possible, thanks to software that has been developed, such as Scratch. In this article, you will see how to create your own game in an easy and fun way.
Why start Scratch Coding?
The rate at which jobs in the IT sector are growing is almost twice as high as in other industries, and this is only an indication of work in future new technologies. Researchers estimate that “the digital economy is worth $11.5 trillion globally, equivalent to 15.5 percent of global GDP and has grown two and a half times faster than global GDP over the past 15 years.”
In a few years, programming knowledge will be fully integrated into educational programs for every age. Using coding concepts, it’s possible to design projects that utilize very similar guidelines and rubrics for a digital project, thereby giving students the opportunity to learn about their topic and sharpen their coding skills at the same time. Future human resources, generations Y and Z, will have at their core the digital skills needed to program.',
                'image' => 'uploads_demo/blog/2.jpg', 'status' => 1, 'blog_category_id' => 1, 'created_at' => now(), 'updated_at' => now()
            ],
        ]);
    }
}
