<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('money')->insert([
            [
                'totalAmount' => '50000',
                'emoney_id' => 1,
                'user_id' => 1,
            ],
            [
                'totalAmount' => '0',
                'emoney_id' => 2,
                'user_id' => 1,
            ],
            [
                'totalAmount' => '0',
                'emoney_id' => 3,
                'user_id' => 1,
            ],
        ]);
    }
}
