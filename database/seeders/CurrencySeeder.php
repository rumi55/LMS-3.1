<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::insert([
            ['currency_code' => 'USD', 'symbol' => '$', 'currency_placement' => 'before', 'current_currency' => 'on'],
            ['currency_code' => 'BDT', 'symbol' => '৳', 'currency_placement' => 'before', 'current_currency' => 'off'],
            ['currency_code' => 'INR', 'symbol' => '₹', 'currency_placement' => 'before', 'current_currency' => 'off'],
            ['currency_code' => 'GBP', 'symbol' => '£', 'currency_placement' => 'after', 'current_currency' => 'off'],
            ['currency_code' => 'MXN', 'symbol' => '$', 'currency_placement' => 'before', 'current_currency' => 'off'],
            ['currency_code' => 'SAR', 'symbol' => 'SR', 'currency_placement' => 'before', 'current_currency' => 'off'],
            ['currency_code' => 'TRY', 'symbol' => '₺', 'currency_placement' => 'after', 'current_currency' => 'off'],
            ['currency_code' => 'ARS', 'symbol' => '$', 'currency_placement' => 'before', 'current_currency' => 'off'],
            ['currency_code' => 'EUR', 'symbol' => '€', 'currency_placement' => 'before', 'current_currency' => 'off'],
        ]);
    }
}
