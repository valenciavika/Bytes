<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopUpTransaction extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('top_up_transactions')->insert([
            [
                "user_id" => 1,
                "emoney_id" => 1,
                "payment_id" => 2,
                "amount" => 20000,
                "time" => '2023-03-19 11:23:00.00',
            ],
            [
                "user_id" => 1,
                "emoney_id" => 1,
                "payment_id" => 2,
                "amount" => 30000,
                "time" => '2023-03-21 11:23:00.00',
            ],
        ]);
    }
}
