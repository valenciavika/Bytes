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
                'name' => 'Bakmi Effata',
                'tenant_category_id'=> 1,
                'image_link' => 'bakmie_effata.jpg',
                'description' =>'Bakmi Effata adalah restoran yang terkenal dengan hidangan bakmi ayam khas Bangka. Restoran ini dikenal dengan cita rasa yang lezat dan autentik dari hidangan bakmi ayamnya yang dibuat dengan bahan-bahan berkualitas tinggi. ' ,
            ],
            [
                'name' =>'Cerita Cinta' ,
                'tenant_category_id'=> 1,
                'image_link' => 'cerita_cinta.webp',
                'description' => 'Cerita Cinta adalah sebuah destinasi kuliner yang menawarkan pengalaman makan yang unik dengan kelezatan ayam geprek yang menggoda selera dan segar yang dipotong dan digoreng dengan sempurna, sehingga menghasilkan kulit yang renyah dan daging yang lembut.',
            ],
            [
                'name' => 'Xiao Kee',
                'tenant_category_id'=> 1,
                'image_link' => 'xiao_kee.jpg',
                'description' => 'Restoran "Xiao Kee" adalah sebuah destinasi kuliner yang menghadirkan cita rasa autentik Nasi Hainam di kawasan Binus. Tidak hanya menyajikan nasi hainam, Xiao Kee juga menyajikan berbagai olahan ayam seperti ayam penyet',
            ],
            [
                'name' => 'Sticky Finger',
                'tenant_category_id'=> 1,
                'image_link' => 'sticky_fingers.webp',
                'description' => 'Sticky Finger adalah gerai yang menyediakan berbagai macam rice bowl dengan aneka topping olahan daging ayam',
            ],
            [
                'name' => 'Rasa Sayange',
                'tenant_category_id'=> 1,
                'image_link' => 'rasa_sayange.webp',
                'description' => 'Rasa sayange adalah sebuah gerai menyajikan berbagai hidangan khas Manado yang kaya akan rasa, rempah-rempah, dan keunikan budaya Manado',
            ],
            [
                'name' => 'Oriental Chicken Rice',
                'tenant_category_id'=> 1,
                'image_link' => 'oriental_chicken_rice.jpg',
                'description' => 'Oriental Chicken Rice adalah sebuah gerai makanan yang menonjolkan hidangan utamanya, yaitu nasi hainan. Gerai ini dikenal karena menyajikan hidangan-hidangan seperti nasi hainan, chicken fillet, katsudon, dan menu ayam lainnya yang menggugah selera',
            ],
            [
                'name' => 'Rasela Catering',
                'tenant_category_id'=> 1,
                'image_link' => 'rasela_catering.jpg',
                'description' => 'Rasela catering adalah sebuah gerai yang menyediakan menu yang beragam dari Masakan Nusantara, Masakan Asia, Masakan Barat, dan lainnya',
            ],
            [
                'name' => 'Bakso Akiaw 88',
                'tenant_category_id'=> 1,
                'image_link' => 'bakso_akiaw.webp',
                'description' => 'Bakso Akiaw 88 adalah sebuah gerai makanan yang terkenal dengan menu baksonya yang lezat dan memiliki harga yang ekonomis. Bakso Akiaw 88 menyajikan berbagai jenis bakso, seperti bakso sapi, bakso ayam, dan bakso ikan',
            ],
            [
                'name' => 'Hakuya Beef Bowl',
                'tenant_category_id'=> 1,
                'image_link' => 'hakuya_beef_bowl.webp',
                'description' => 'Hakuya Bowl Beef adalah gerai yang menawarkan hidangan ikonik berupa mangkuk daging sapi lembut dan lezat yang disajikan dengan berbagai bumbu dan saus.',
            ],
            [
                'name' => 'Marlene Kitchen',
                'tenant_category_id'=> 1,
                'image_link' => 'marlene_kitchen.webp',
                'description' => 'Marlene Kitchen adalah gerai yang memberikan hidangan khas dengan sentuhan internasional dan menggabungkan cita rasa autentik dengan kreasi kreatif.',
            ],
            [
                'name' => 'S&S Kitchen',
                'tenant_category_id'=> 1,
                'image_link' => 's&s_kitchen.jpg',
                'description' => 'S&S Kitchen adalah Gerai S&S Kitchen adalah tempat makan yang menghadirkan hidangan lezat dengan cita rasa khas Jepang, seperti ramen dan curry',
            ],
            [
                'name' => 'Tea Well',
                'tenant_category_id'=> 3,
                'image_link' => 'tea_well.png',
                'description' => 'Tea Well adalah tempat yang menyajikan beragam minuman segar dan inovatif dengan berbagai pilihan rasa yang memanjakan lidah pengunjung.',
            ],
            [
                'name' => 'Good Waffle',
                'tenant_category_id'=> 2,    
                'image_link' => 'good_waffle.jpg',
                'description' => 'Good Waffle adalah surganya para pecinta waffle, kami menyajikan waffle berkualitas tinggi dengan berbagai varian rasa dan pilihan topping yang menggoda selera.',
            ],
            [
                'name' => 'My Crepes',
                'tenant_category_id'=> 2, 
                'image_link' => 'my_crepes.jpg',
                'description' => 'My Crepes adalah gerai crepes terbaik yang menyediakan berbagai pilihan jenis crepes mulai dari klasik seperti crepes cokelat, stroberi, dan pisang hingga varian yang lebih eksotis seperti crepes green tea atau blueberry. Setiap crepes disajikan dengan 
                keahlian, menjadikan setiap gigitan sebagai pengalaman yang tak terlupakan.',
            ],
            [
                'name' => "Omon's Corner",
                'tenant_category_id'=> 3,
                'image_link' => 'my_crepes.jpg',
                'description' => "Omon's Corner adalah toko jus yang menyajikan berbagai jenis jus berkualitas tinggi dengan menggunakan bahan -  bahan segar dan alami.",
            ]
        ]);
    }
}
