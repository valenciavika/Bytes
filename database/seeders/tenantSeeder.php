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
        //
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
