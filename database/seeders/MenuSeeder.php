<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'name' =>'Bakmi Keriting/Lebar Ayam Biasa Polos',
                'stock' => 20,
                'jenis' => 'Bakmi Keriting, Bakmi Lebar',
                'price' => 20000,
                'tenant_id'=> 1,
            ],
            [
                'name' =>'Bakmi Keriting/Lebar Ayam Jumbo Polos',
                'stock' => 20,
                'jenis' => 'Bakmi Keriting, Bakmi Lebar',
                'price' => 25000,
                'tenant_id'=> 1,
            ],
            [
                'name' =>'Bakmi keriting/lebar ayam + pangsit (goreng/rebus)',
                'stock' => 20,
                'jenis' => 'Bakmi Keriting, Bakmi Lebar',
                'price' => 23000,
                'tenant_id'=> 1,
            ],
            [
                'name' =>'Bakmi keriting/lebar ayam jumbo + pangsit (goreng/rebus)',
                'stock' => 20,
                'jenis' => 'Bakmi Keriting, Bakmi Lebar',
                'price' => 28000,
                'tenant_id'=> 1,

            ],
            [
                'name' =>'Bakmi keriting/lebar ayam + bakso',
                'stock' => 20,
                'jenis' => 'Bakmi Keriting, Bakmi Lebar',
                'price' => 25000,
                'tenant_id'=> 1,
            ],
            [
                'name' =>'Bakmi keriting/lebar ayam jumbo + bakso',
                'stock' => 20,
                'jenis' => 'Bakmi Keriting, Bakmi Lebar',
                'price' => 30000,
                'tenant_id'=> 1,
            ],
            [
                'name' =>'Bihun ayam biasa polos',
                'stock' => 20,
                'price' => 20000,
                'tenant_id'=> 1,
            ],
            [
                'name' =>'Bihun Ayam Jumbo Polos',
                'stock' => 20,
                'price' => 25000,
                'tenant_id'=> 1,
            ],
            [
                'name' =>'Bihun ayam + pangsit (goreng/rebus)',
                'stock' => 20,
                'price' => 23000,
                'tenant_id'=> 1,
            ],
            [
                'name' =>'Bihun ayam jumbo + pangsit (goreng/rebus)',
                'stock' => 20,
                'price' => 28000,
                'tenant_id'=> 1,
            ],
            [
                'name' =>'Bihun ayam + bakso',
                'stock' => 20,
                'price' => 25000,
                'tenant_id'=> 1,
            ],
            [
                'name' =>'Bihun ayam jumbo + bakso',
                'stock' => 20,
                'price' => 30000,
                'tenant_id'=> 1,
            ],

            [
                'name' =>'Nasi Ayam Cinta Terindah',
                'stock' => 20,
                'price' => 24000,
                'tenant_id'=> 2,
            ],
            [
                'name' =>'Nasi Ayam Cinta Tak Terlupakan',
                'stock' => 20,
                'price' => 24000,
                'tenant_id'=> 2,
            ],
            [
                'name' =>'Nasi Ayam Cinta Cheesy Mozza',
                'stock' => 20,
                'price' => 27000,
                'tenant_id'=> 2,
            ],
            [
                'name' =>'Nasi Ayam Cinta Sambal Geprek',
                'stock' => 20,
                'price' => 23000,
                'tenant_id'=> 2,
            ],
            [
                'name' =>'Nasi Ayam Cinta Sambal Matah',
                'stock' => 20,
                'price' => 23000,
                'tenant_id'=> 2,
            ],
            [
                'name' =>'Nasi Ayam Cinta Sambal Terasi',
                'stock' => 20,
                'price' => 23000,
                'tenant_id'=> 2,
            ],
            [
                'name' =>'Nasi Ayam Cinta Sambal Ijo',
                'stock' => 20,
                'price' => 23000,
                'tenant_id'=> 2,
            ],
            [
                'name' =>'Nasi Ayam Cinta Sambal Ikan Cakalang',
                'stock' => 20,
                'price' => 23000,
                'tenant_id'=> 2,
            ],
            [
                'name' =>'Nasi Ayam Cinta Sambal Roa',
                'stock' => 20,
                'price' => 23000,
                'tenant_id'=> 2,
            ],

            [
                'name' =>'Nasi Hainam Ayam Rebus',
                'stock' => 20,
                'price' => 25000,
                'tenant_id'=> 3,
            ],
            [
                'name' =>'Nasi Hainam Ayam Katsu',
                'stock' => 20,
                'price' => 25000,
                'tenant_id'=> 3,
            ],
            [
                'name' =>'Nasi Hainam Ayam Goreng',
                'stock' => 20,
                'price' => 25000,
                'tenant_id'=> 3,
            ],
            [
                'name' =>'Nasi Hainam Ayam Yakiniku',
                'stock' => 20,
                'price' => 25000,
                'tenant_id'=> 3,
            ],
            [
                'name' =>'Nasi Hainam Ayam Geprek',
                'stock' => 20,
                'price' => 27000,
                'tenant_id'=> 3,
            ],
            [
                'name' =>'Nasi Hainam Ayam Bakar',
                'stock' => 20,
                'price' => 27000,
                'tenant_id'=> 3,
            ],
            [
                'name' =>'Nasi Hainam Ayam Penyet',
                'stock' => 20,
                'price' => 27000,
                'tenant_id'=> 3,
            ],
            [
                'name' =>'Sf Bowl Sambal Matah',
                'stock' => 20,
                'price' => 27000,
                'tenant_id'=> 4,
            ],
            [
                'name' =>'Sf Bowl Sambal Bawang',
                'stock' => 20,
                'price' => 27000,
                'tenant_id'=> 4,
            ],
            [
                'name' =>'Sf Bowl Cheese Sauce',
                'stock' => 20,
                'price' => 27000,
                'tenant_id'=> 4,
            ],
            [
                'name' =>'Sf Bowl Spicy BBQ Sauce',
                'stock' => 20,
                'price' => 27000,
                'tenant_id'=> 4,
            ],
            [
                'name' =>'Sf Bowl Creamy Carbonara',
                'stock' => 20,
                'price' => 27000,
                'tenant_id'=> 4,
            ],
            // [
            //     'name' =>'',
            //     'stock' => 20,
            //     'price' => 23000,
            //     'tenant_id'=> 4,
            // ],
            // [
            //     'name' =>'',
            //     'stock' => 20,
            //     'price' => 23000,
            //     'tenant_id'=> 4,
            // ],
            // [
            //     'name' =>'',
            //     'stock' => 20,
            //     'price' => 23000,
            //     'tenant_id'=> 4,
            // ],



        ]);
    }
}
