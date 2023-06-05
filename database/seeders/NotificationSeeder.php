<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            [
                'title' =>'Your order is ready to be picked up!',
                'description' => 'Your order at Bakmi Effata is ready, you can pick up your order at the cafeteria.',
                'type' => 'ready',
                'clicked_status' => true,
                'direct_to'=> '',
                'time'=> now(),
            ],
            [
                'title' =>'Your order has been submitted!',
                'description' => 'Thank you for ordering, please wait for the tenant to finish your order!',
                'type' => 'ordersubmitted',
                'clicked_status' => true,
                'direct_to'=> '',
                'time'=> now(),
            ],
            [
                'title' =>'You have an unpaid order!',
                'description' => "You haven't paid your order at Bakmi Effata, please proceed to pay at your shopping cart.",
                'type' => 'unpaid',
                'clicked_status' => true,
                'direct_to'=> '',
                'time'=> now(),
            ],
        ]);
    }
}
