<?php

namespace Database\Seeders;

use App\Models\RankingLevel;
use Illuminate\Database\Seeder;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startDay = -1;
        $startAmount = -1;
        $startCourseCount = -1;
        $startStudentCount = -1;
        $startSaleCount = -1;
        for($i = 1; $i<= 5; $i++){
            //membership
            $increment = ($i == 5) ? 365*10 : 365;
            $ranking = new RankingLevel;
            $ranking->name = $i.' Years of Membership';
            $ranking->type = RANKING_LEVEL_REGISTRATION;
            $ranking->from = ++$startDay;
            $ranking->to = $startDay+=$increment;
            $ranking->description =  $i.' Years of Membership';
            $ranking->badge_image = 'frontend/assets/img/ranking_badges/membership_'.$i.'.png';
            $ranking->save();

            //author Level
            $increment = 365*$i;
            $ranking = new RankingLevel;
            $ranking->name = 'Author Level '.$i;
            $ranking->type = RANKING_LEVEL_EARNING;
            $ranking->from = ++$startAmount;
            $ranking->to = $startAmount+=$increment;
            $ranking->description = 'Author Level '.$i;
            $ranking->badge_image = 'frontend/assets/img/ranking_badges/rank_'.$i.'.png';
            $ranking->save();
           
            //course count Level
            $increment = 5*$i;
            $fromCourse = ++$startCourseCount;
            $toCourse = $startCourseCount+=$increment;
            $ranking = new RankingLevel;
            $ranking->name = $fromCourse .' to '.$toCourse.' Course';
            $ranking->type = RANKING_LEVEL_COURSES_COUNT;
            $ranking->from = $fromCourse;
            $ranking->to = $toCourse;
            $ranking->description = $fromCourse .' to '.$toCourse.' Course';
            $ranking->badge_image = 'frontend/assets/img/ranking_badges/course_'.$i.'.png';
            $ranking->save();
           
           
            //student count Level
            $increment = 10*$i;
            $fromStudent = ++$startStudentCount;
            $toStudent = $startStudentCount+=$increment;
            $ranking = new RankingLevel;
            $ranking->name = $fromStudent .' to '.$toStudent.' Student';
            $ranking->type = RANKING_LEVEL_STUDENTS_COUNT;
            $ranking->from = $fromStudent;
            $ranking->to = $toStudent;
            $ranking->description = $fromStudent .' to '.$toStudent.' Student';
            $ranking->badge_image = 'frontend/assets/img/ranking_badges/student_'.$i.'.png';
            $ranking->save();
           
            //sale count Level
            $increment = 10*$i;
            $fromSale = ++$startSaleCount;
            $toSale = $startSaleCount+=$increment;
            $ranking = new RankingLevel;
            $ranking->name = $fromSale .' to '.$toSale.' Sold';
            $ranking->type = RANKING_LEVEL_COURSES_SALE_COUNT;
            $ranking->from = $fromSale;
            $ranking->to = $toSale;
            $ranking->description = $fromSale .' to '.$toSale.' Sold';
            $ranking->badge_image = 'frontend/assets/img/ranking_badges/sale_'.$i.'.png';
            $ranking->save();
        }
    }
}
