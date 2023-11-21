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
                'img' => 'https://github.com/valenciavika/Bytes/blob/main/public/images/Logo_Binuseats.png?raw=true',

            ],
            [
                'name' => 'OVO',
                'img' => 'https://theme.zdassets.com/theme_assets/1379487/2cb35fe96fa1191f49c2b769b50cf8b546fff65e.png',
            ],
            [
                'name' => 'GoPay',
                'img' => 'https://info.dipendajatim.go.id/landing/img/GoPay.png',
            ],
        ]);
    }
}
