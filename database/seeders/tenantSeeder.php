<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1 food, 2 snack, 3 beverage
        DB::table('tenants')->insert([
            [
                'name' => 'Bakmi Efatta',
                'category_id'=> 1,
                'description' =>'Bakmi Effata adalah restoran yang terkenal dengan hidangan bakmi ayam khas Bangka. Restoran ini dikenal dengan cita rasa yang lezat dan autentik dari hidangan bakmi ayamnya yang dibuat dengan bahan-bahan berkualitas tinggi. ' ,
            ],
            [
                'name' =>'Cerita Cinta' ,
                'category_id'=> 1,
                'description' => 'Cerita Cinta adalah sebuah destinasi kuliner yang menawarkan pengalaman makan yang unik dengan kelezatan ayam geprek yang menggoda selera dan segar yang dipotong dan digoreng dengan sempurna, sehingga menghasilkan kulit yang renyah dan daging yang lembut.',
            ],
            [
                'name' => 'Xiao Kee',
                'category_id'=> 1,
                'description' => 'Restoran "Xiao Kee" adalah sebuah destinasi kuliner yang menghadirkan cita rasa autentik Nasi Hainam di kawasan Binus. Tidak hanya menyajikan nasi hainam, Xiao Kee juga menyajikan berbagai olahan ayam seperti ayam penyet',
            ],
            [
                'name' => 'Sticky Finger',
                'category_id'=> 1,
                'description' => 'Sticky Finger adalah gerai yang menyediakan berbagai macam rice bowl dengan aneka topping olahan daging ayam',
            ],
            [
                'name' => 'Rasa Sayange',
                'category_id'=> 1,
                'description' => 'Rasa sayange adalah sebuah gerai menyajikan berbagai hidangan khas Manado yang kaya akan rasa, rempah-rempah, dan keunikan budaya Manado',
            ],
            [
                'name' => 'Oriental Chicken Rice',
                'category_id'=> 1,
                'description' => 'Oriental Chicken Rice adalah sebuah gerai makanan yang menonjolkan hidangan utamanya, yaitu nasi hainan. Gerai ini dikenal karena menyajikan hidangan-hidangan seperti nasi hainan, chicken fillet, katsudon, dan menu ayam lainnya yang menggugah selera',
            ],
            [
                'name' => 'Rasela Catering',
                'category_id'=> 1,
                'description' => 'Rasela catering adalah sebuah gerai yang menyediakan menu yang beragam dari Masakan Nusantara, Masakan Asia, Masakan Barat, dan lainnya',
            ],
            [
                'name' => 'Bakso Akiaw 88',
                'category_id'=> 1,
                'description' => 'Bakso Akiaw 88 adalah sebuah gerai makanan yang terkenal dengan menu baksonya yang lezat dan memiliki harga yang ekonomis. Bakso Akiaw 88 menyajikan berbagai jenis bakso, seperti bakso sapi, bakso ayam, dan bakso ikan',
            ],
            [
                'name' => 'Good Waffle',
                'category_id'=> 2,    
                'description' => 'Good Waffle adalah surganya para pecinta waffle, kami menyajikan waffle berkualitas tinggi dengan berbagai varian rasa dan pilihan topping yang menggoda selera.',
            ],
            [
                'name' => 'My Crepes',
                'category_id'=> 2, 
                'description' => 'My Crepes adalah gerai crepes terbaik yang menyediakan berbagai pilihan jenis crepes mulai dari klasik seperti crepes cokelat, stroberi, dan pisang hingga varian yang lebih eksotis seperti crepes green tea atau blueberry. Setiap crepes disajikan dengan keahlian, menjadikan setiap gigitan sebagai pengalaman yang tak terlupakan.',
            ],
            [
                'name' => "Omon's Corner",
                'category_id'=> 3,
                'description' => "Omon's Corner adalah toko jus yang menyajikan berbagai jenis jus berkualitas tinggi dengan menggunakan bahan -  bahan segar dan alami.",
            ],
            // [
            //     'name' => '',
            //     'description' => '',
            // ],
            // [
            //     'name' => '',
            //     'description' => '',
            // ],
            // [
            //     'name' => '',
            //     'description' => '',
            // ],
            // [
            //     'name' => '',
            //     'description' => '',
            // ],
            // [
            //     'name' => '',
            //     'description' => '',
            // ],
            // [
            //     'name' => '',
            //     'description' => '',
            // ],
            // [
            //     'name' => '',
            //     'description' => '',
            // ],
            // [
            //     'name' => '',
            //     'description' => '',
            // ],
            // [
            //     'name' => '',
            //     'description' => '',
            // ],
        ]);
    }
}
