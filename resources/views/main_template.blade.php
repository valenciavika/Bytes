<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Homepage</title>
        <script src="https://kit.fontawesome.com/db7406598f.js" crossorigin="anonymous"></script>
        <script src="editprofile.js"></script>

        <link href="{{asset('css/homepage.css')}}" rel="stylesheet" />
        <link href="{{asset('css/profile.css')}}" rel="stylesheet" />
        <link href="{{asset('css/order.css')}}" rel="stylesheet" />


    </head>
    <body>

        <div class="banner">
            <img class="home-button" src="{{asset('/images/Logo_Binuseats.png')}}" alt="home-button"onclick="window.location='{{ url("") }}'">

            <form action="/">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">| <i class="fas fa-search" style="color: #000000;"></i></button>
            </form>

            <div class="navigation-bar">
                <div class="Bell" id="bar" onclick="window.location='{{ url("") }}'">
                    <i class="fa-solid fa-bell" style="color: #ffffff;"></i>
                    <p>Notification</p>
                </div>

                <div class="cart" id="bar">
                    <i class="fas fa-shopping-cart" style="color: #ffffff"></i>
                    <p>Cart</p>
                </div>

                <div class="order" id="bar" onclick="window.location.href='/order'">
                    <i class='fas fa-file-alt' style='color: #ffffff'></i>
                    <p>Order</p>
                </div>


                <div class="profile" id="bar" onclick="window.location.href='/profile'">
                    <i class="fa-solid fa-user" style='color: #ffffff'></i>
                    <p>Profile</p>
                </div>
            </div>
        </div>

        <div class="content">
            @yield('content')
        </div>

    </body>
</html>
