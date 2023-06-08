<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Cart;
use App\Models\transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin123',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('admin123'),
            'phone' => null,
        ]);

        Cart::create([
            'menu_id' => 1,
            'quantity' => 1,
            'additional_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum magnam molestias nesciunt, quod sunt, voluptatem omnis dolorem, impedit sapiente est assumenda? At voluptas tempora sint consectetur inventore laboriosam veniam et.',
            'jenis' => 'Lorem ipsum d',
            'user_id' => 1,
        ]);

        Cart::create([
            'menu_id' => 2,
            'quantity' => 8,
            'additional_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum magnam molestias nesciunt, quod sunt, voluptatem omnis dolorem, impedit sapiente est assumenda? At voluptas tempora sint consectetur inventore laboriosam veniam et.',
            'jenis' => 'Lorem ipsum d',
            'user_id' => 1,
        ]);

        Transaction::create([
            'menu_id' => 15,
            'quantity' => 1,
            'additional_description' => 'Mozzanya jangan terlalu lumer',
            'jenis' => null,
            'time' => '2023-05-08 11:23:00.00',
            'user_id' => 1,
        ]);


        $this->call([tenant_categorySeeder::class, tenantSeeder::class, MenuSeeder::class, TopUpSeeder::class, TopUpPaymentMethodSeeder::class, TopUpTransaction::class, MoneySeeder::class, NotificationSeeder::class]);
    }
}
