<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopUpPaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('top_up_payment_methods')->insert([
            [
                'name' => 'Debit',
            ],
            [
                'name' => 'M-BCA',
            ],
            [
                'name' => 'Credit',
            ],
        ]);
    }
}
