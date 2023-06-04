@extends('/main_template')

@section('content')
    <div class="topup-history">

        <div id="topup-carousel" class="carousel slide">
            <ol class="carousel-indicators">
                <li data-bs-target="#topup-carousel" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#topup-carousel" data-bs-slide-to="1"></li>
                <li data-bs-target="#topup-carousel" data-bs-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="topup">
                        {{-- @foreach ($emoneys as $emoney) --}}
                        <div class="bipay_home" id="emoney">
                            <div class="method">
                                <img style="width: 1.7vw; height:max-content; display:flex; align-self: center;" src="{{ $emoneys[0]->img }}" alt="bipay">
                                <p style="padding-left: 0.5vw;"> {{ $emoneys[0]->name }}</p>
                            </div>
                            <p style="margin-right: 1vw">Rp{{number_format($moneys[$emoneys[0]->id-1]->totalAmount, 0 , '.' , '.' )}}</p>
                        </div>

                        <a href="/{{$id}}/topup/BiPay/History" class="topup_button">
                            <i class="fa-solid fa-plus"aria-hidden="true" style="color: #ffffff;"></i>
                            <p>TOP UP</p>
                        </a>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="topup">
                        <div class="OVO_home" id="emoney">
                            <div class="method">
                                <img style="width: 1.7vw; height:max-content; display:flex; align-self: center;" src="{{ $emoneys[1]->img }}" alt="bipay">
                                <p style="padding-left: 0.5vw;"> {{ $emoneys[1]->name }}</p>
                            </div>
                            <p style="margin-right: 1vw">Rp{{number_format($moneys[$emoneys[1]->id-1]->totalAmount, 0 , '.' , '.' )}}</p>
                        </div>
                        <a href="/{{$id}}/topup/OVO/History" class="topup_button">
                            <i class="fa-solid fa-plus"aria-hidden="true" style="color: #ffffff;"></i>
                            <p>TOP UP</p>
                        </a>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="topup">
                        <div class="GoPay_home" id="emoney">
                            <div class="method">
                                <img style="width: 1.7vw; height:max-content; display:flex; align-self: center;" src="{{ $emoneys[2]->img }}" alt="bipay">
                                <p style="padding-left: 0.5vw;"> {{ $emoneys[2]->name }}</p>
                            </div>
                            <p style="margin-right: 1vw">Rp{{number_format($moneys[$emoneys[2]->id-1]->totalAmount, 0 , '.' , '.' )}}</p>
                        </div>
                        <a href="/{{$id}}/topup/GoPay/History" class="topup_button">
                            <i class="fa-solid fa-plus"aria-hidden="true" style="color: #ffffff;"></i>
                            <p>TOP UP</p>
                        </a>

                    </div>
                </div>
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
            @if ($tenant->count())
                @if (request('category'))
                    @foreach ($tenant_category as $tc)
                        @if ($tenant[0]->tenant_category_id == $tc['id'])
                            <div class="category-1">
                                <i onclick="window.location.href='/homepage/{{$id}}'" class='fas fa-angle-left'></i>
                                <p style="margin-left: 1vw" >{{$tc['name']}}</p>
                            </div>
                            @break
                        @endif
                    @endforeach
                @endif
            @else
                <p class="no_result">No result found.</p>
            @endif

            <div class="tenant-1">
                @foreach ($tenant as $t)
                    <div style="margin-bottom: 1.5vw"class="box">
                        <div class="img">
                        </div>
                        <p style="font-size: 1.5vw;">{{$t['name']}}</p>
                    </div>
                @endforeach
            </div>
        @else
            @foreach ($tenant_category as $tc)
                <div class="Category">
                    <p>{{$tc['name']}}</p>
                    <a href="/homepage/{{$id}}/?category={{ $tc->id }}"><i class='fas fa-angle-right'></i></a>
                </div>
                <div class="tenant">

                    @php
                        $count = 0;
                    @endphp
                    @foreach ($tenant as $t)
                        @if ($t['tenant_category_id'] == $tc['id'])
                            @if ($count < 4)
                                <div class="box">
                                    <div class="img">
                                    </div>
                                    <p style="font-size: 1.5vw;">{{$t['name']}}</p>
                                </div>

                                @php
                                    $count++;
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
@endsection


