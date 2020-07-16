<?php

use Illuminate\Database\Seeder;
use App\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
            'currency' => 'Euro',
        ]);
        Currency::create([
            'currency' => 'US dollar',
        ]);
    }
}
