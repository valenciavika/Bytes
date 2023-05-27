<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Homepage</title>
        <script src="https://kit.fontawesome.com/db7406598f.js" crossorigin="anonymous"></script>
        <link href="{{asset('css/welcome.css')}}" rel="stylesheet" />


    </head>
    <body>

        <div class="banner">
            <img class="home-button" src="{{asset('/images/Logo_Binuseats.png')}}" alt="home-button"onclick="window.location='{{ url("") }}'">

            <form action="/">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">| <i class="fas fa-search" style="color: #000000;"></i></button>
            </form>

            <div class="navigation-bar">
                <div class="Bell" id="bar" onclick="window.location='{{ url("login") }}'">
                    <i class="fa-solid fa-bell" style="color: #ffffff;"></i>
                    <p>Notification</p>
                </div>

                <div class="cart" id="bar">
                    <i class="fas fa-shopping-cart" style="color: #ffffff"></i>
                    <p>Cart</p>
                </div>

                <div class="order" id="bar">
                    <i class='fas fa-file-alt' style='color: #ffffff'></i>
                    <p>Order</p>
                </div>


                <div class="profile" id="bar">
                    <i class="fa-solid fa-user" style='color: #ffffff'></i>
                    <p>Profile</p>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="topup-history">
                <div class="topup">
                    <div class="emoney">
                        <div class="method">
                            <img style="width: 1.5vw; height:max-content; display:flex; align-self: center;" src="{{asset('/images/Logo_Binuseats.png')}}" alt="bipay">
                            <p style="padding-left: 0.75vw;">Bipay</p>
                        </div>
                        <p style="margin-right: 1vw">Rp12.000</p>
                    </div>
                    <div class="topup-button">
                        <i class="fa-solid fa-plus"aria-hidden="true" style="color: #ffffff;"></i>
                        <p>TOP UP</p>
                    </div>
                </div>
                <div class="history">
                    <div class="history-container">
                        <div class="history-box">
                            <div class="tenant-time">
                                <p style="font-weight: bold; font-size: 1.5vw;">Bakmie Effata</p>
                                <p style="font-size: 1.5vw;">09.00</p>
                            </div>
                            <div class="hist">
                                <div class="food-order" style="display: flex;">
                                    <p>3x</p>
                                    <p style="padding-left: 0.75vw">Bakmi keriting/lebar ayam biasa polos</p>

                                </div>
                                <p class="status">Completed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="food">
                @if (request('search') or request('category'))
                    @foreach ($tenant as $t)
                        <div>
                            <p>{{$t->name}}</p>
                        </div>
                    @endforeach
                @else
                    @foreach ($tenant_category as $tc)
                        <div class="Category">
                            <p>{{$tc['name']}}</p>
                            <a href="/?category={{ $tc->id }}"><i class='fas fa-angle-right'></i></a>
                        </div>
                        <div class="tenant">

                            @php
                                $count = 0; // Initialize a counter variable
                            @endphp
                            @foreach ($tenant as $t)
                                @if ($t['tenant_category_id'] == $tc['id'])
                                    @if ($count < 4) <!-- Display only four tenants per category -->

                                        <div class="box">
                                            <div class="img">
                                            </div>
                                            <p style="font-size: 1.5vw;">{{$t['name']}}</p>
                                        </div>



                                        @php
                                            $count++; // Increment the counter
                                        @endphp
                                    @else
                                        @break
                                    @endif

                                @endif
                            @endforeach
                        </div>

                    @endforeach
                @endif

            </div>

            <p>ikan</p>
        </div>

    </body>
</html>
