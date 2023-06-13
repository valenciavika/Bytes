Frameworks Used
--------------------------------------
- Laravel
- Bootstrap
- Font Awesome

Description
--------------------------------------
BinusEats merupakan sebuah platform aplikasi on-demand berbasis web revolusioner yang dirancang khusus untuk meningkatkan pengalaman makan para Binusian di gerai kantin Binus Anggrek. Dengan BinusEats, memesan makanan tidak pernah semudah ini. Binusian dapat dengan mudah melakukan pre-order makanan dan minuman favorit mereka secara online sebelum waktu istirahat dan mengambil makanannya di kantin pada jam istirahat, memastikan proses memesan makanan dan minuman dari gerai kantin Binus menjadi lebih lancar dan efisien.

Installation
--------------------------------------
1. Pastikan node.js dan laravel sudah tersedia

2. Menjalankan laravel
    ```
    php artisan serve
    ```
    
    - Jika terdapat error saat menjalankan kode, berikut penyelesaian dari error tersebut:
      ```
      composer install
      ```
    
    - jika terdapat error "key not generated" atau "500|server error" pada web
      ```
      php artisan key:generate
      ```
    
    - Jika pada saat menjalankan syntax ini terdapat error tidak dapat menemukan file .env, maka rename dahulu file .env.example menjadi .env kemudian jalankan kembali syntax tersebut
    
    - Menjalankan laravel di terminal project
      1. Buat database BinusEats 
         ```   
         php artisan migrate
         ```
      2. Update dan seed database BinusEats
         ```
         php arisan migrate:fresh --seed
         ```
      3. Sambungkan project dengan storage (untuk mengakses dan menyimpan foto)
         ```
         php artisan storage:link
         ```
      4. Jalankan laravel
         ```
         php artisan serve
         ```
      
Contributors
--------------------------------------
Profile prototype ini dibuat oleh:
1. Matthew Christian Hadiprasetya (2440005252)
2. Jasons Januard Bongtari (2440062123)
3. Vika Valencia Susanto (2440079162)
4. Vieren Cristian (2440102202)
