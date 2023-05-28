<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('top_ups')->insert([
            [
                'name' => 'BiPay',
                'img' => 'https://gopay.co.id/icon.png',
            ],
            [
                'name' => 'OVO',
                'img' => 'https://theme.zdassets.com/theme_assets/1379487/2cb35fe96fa1191f49c2b769b50cf8b546fff65e.png',
            ],
            [
                'name' => 'GoPay',
                'img' => 'https://gopay.co.id/icon.png',
            ],
        ]);
    }
}