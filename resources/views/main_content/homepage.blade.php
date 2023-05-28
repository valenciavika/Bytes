@extends('/main_template')

@section('content')
    <div class="topup-history">
        <div class="topup">
            <div class="emoney">
                {{-- @foreach ($emoneys as $emoney) --}}
                    <div class="method">
                        @foreach ($emoneys as $emoney)
                        @dd($tenant)
                        @endforeach

                        <img style="width: 1.5vw; height:max-content; display:flex; align-self: center;" src="{{ $emoneys[0]->img }}" alt="bipay">
                        <p style="padding-left: 0.75vw;"> {{ $emoneys[0]->name }}</p>
                    </div>
                    <p style="margin-right: 1vw">Rp{{number_format($moneys[$emoneys[0]->id-1]->totalAmount, 0 , '.' , '.' )}}</p>

                {{-- @endforeach --}}
            </div>
            <a href="/topup" class="topup_button">
                <i class="fa-solid fa-plus"aria-hidden="true" style="color: #ffffff;"></i>
                <p>TOP UP</p>
            </a>
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
                                <i onclick="window.location='{{ url("") }}'" class='fas fa-angle-left'></i>
                                <p style="margin-left: 1vw" >{{$tc['name']}}</p>
                            </div>
                            @break
                        @endif
                    @endforeach
                @endif
            @else
                <p class="no_result">No post found.</p>
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
@endsection
