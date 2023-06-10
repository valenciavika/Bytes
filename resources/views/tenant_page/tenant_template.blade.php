<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $page_title }}</title>
        <link rel = "icon" href = "{{ asset('images/Logo_Binuseats.png') }}" type = "image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        <script src="https://kit.fontawesome.com/db7406598f.js" crossorigin="anonymous"></script>
        <script src="editprofile.js"></script>
        <link href="{{asset('css/tenant_template.css')}}" rel="stylesheet" />

        @stack('styles')

    </head>
    <body>
        <div class="banner">
            @yield('home')
            <img class="home-button" src="{{asset('/images/Logo_Binuseats.png')}}" alt="home-button"onclick="window.location.href='/{{$id}}/homepage'">
            
            <div class="navigation-bar">
                <div class="sapa-tenant">
                    <p class="text-sapa-tenant"><strong>Hello, Bakmi Effata!</strong></p>
                </div>
                <i id="icondrop" class="fa-solid fa-caret-down"></i>
            </div>
            <div class="dropdown">
                <div class="div-transaksi">
                    <i id="icontransaction" class='fas fa-file-alt'></i>
                    <p><strong>Transaction</strong></p>
                </div>
                <div class="div-history"> 
                    <i id="iconhistory" class="fa-solid fa-clock-rotate-left"></i>
                    <p><strong>History</strong></p>
                </div>
                <div class="space">
                    <hr>
                </div>
                <div class="div-logout">
                    <i id="iconlogout" class="fa-solid fa-right-from-bracket"></i>
                    <p><strong>Log Out</strong></p>
                </div>
            </div>
        </div>
        

        <div class="content">
            @yield('content')
        </div>

    </body>
</html>
