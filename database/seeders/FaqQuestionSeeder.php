<?php

namespace Database\Seeders;

use App\Models\FaqQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FaqQuestion::insert([
            ['question' => 'which I enjoy with my whole heart am alone feel?', 'answer' => 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a  greater artist than now. When, while the lovely valley with vapour around me, and the meridian.', 'created_at' => now(), 'updated_at' => now()],
            ['question' => 'which I enjoy with my whole heart am alone feel?', 'answer' => 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a  greater artist than now. When, while the lovely valley with vapour around me, and the meridian.', 'created_at' => now(), 'updated_at' => now()],
            ['question' => 'which I enjoy with my whole heart am alone feel?', 'answer' => 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a  greater artist than now. When, while the lovely valley with vapour around me, and the meridian.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
