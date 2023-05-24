<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tenant_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('tenant_categories')->insert([
            [
                'name' => 'Foods',
            ],
            [
                'name' => 'Snacks' ,
            ],
            [
                'name' => 'Beverages',
            ],
        ]);
    }
}
