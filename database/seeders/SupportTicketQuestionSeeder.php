<?php

namespace Database\Seeders;

use App\Models\SupportTicketQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportTicketQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupportTicketQuestion::insert([
            ['question' => 'Where can I see the status of my refund?', 'answer' => ' In the Refund Status column you can see the date your refund request was submitted or when it was processed.', 'created_at' => now(), 'updated_at' => now()],
            ['question' => 'When will I receive my refund?', 'answer' => ' Refund requests are submitted immediately to your payment processor or financial institution after Udemy has received and processed your request. It may take  5 to 10 business days or longer to post the funds in your account, depending on your financial institution or location.', 'created_at' => now(), 'updated_at' => now()],
            ['question' => 'Why was my refund request denied?', 'answer' => ' All eligible courses purchased on Udemy can be refunded within 30 days, provided the request meets the guidelines in our refund policy. ', 'created_at' => now(), 'updated_at' => now()],
            ['question' => 'What is a “credit refund”?', 'answer' => ' In cases where a transaction is not eligible for a refund to your original payment method, the refund will be granted using LMSZAI Credit', 'created_at' => now(), 'updated_at' => now()],
            ['question' => 'Where can I see the status of my refund?', 'answer' => ' In the Refund Status column you can see the date your refund request was submitted or when it was processed.', 'created_at' => now(), 'updated_at' => now()],
            ['question' => 'When will I receive my refund?', 'answer' => ' Refund requests are submitted immediately to your payment processor or financial institution after Udemy has received and processed your request. It may take  5 to 10 business days or longer to post the funds in your account, depending on your financial institution or location.', 'created_at' => now(), 'updated_at' => now()],
            ['question' => 'Why was my refund request denied?', 'answer' => ' All eligible courses purchased on Udemy can be refunded within 30 days, provided the request meets the guidelines in our refund policy. ', 'created_at' => now(), 'updated_at' => now()],
            ['question' => 'What is a “credit refund”?', 'answer' => ' In cases where a transaction is not eligible for a refund to your original payment method, the refund will be granted using LMSZAI Credit', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
