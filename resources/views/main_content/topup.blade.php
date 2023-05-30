@extends('/main_template')

@section('content')
    <div class="body-section">
        <div class="topup-container">
            <div class="emoneyButton">
                <a class="button" href="/{{ $user->id }}/topup/BiPay" >BiPay</a>
                <a class="button" href="/{{ $user->id }}/topup/Ovo">Ovo</a>
                <a class="button" href="/{{ $user->id }}/topup/GoPay">GoPay</a>
            </div>
            <div class="topup2">
                <div class="saldo">
                    <div class="emone">
                        @foreach ($emoney as $em)
                        <img src="{{$em['img']}}" alt="">
                        <p style="margin-left:0.5vw">{{$em['name']}}</p>
                    @endforeach
                    </div>

                    @foreach ($money as $m)
                        <p>Rp{{$m['totalAmount']}}</p>
                    @endforeach
                </div>
                <input class="amount" type="text" name="" id="" placeholder="INSERT AMOUNT..">

                <div class="method-payment">
                    <p class="method-text">Payment Methods</p>
                    <div class="methods">
                        @foreach ($method as $pm)
                        <label>
                            <input type="radio" name="payment-method" id="">
                            {{$pm['name']}}
                        </label>

                    @endforeach
                    </div>

                </div>
                <a href="" class="topup_but">
                    {{-- <i class="fa-solid fa-plus"aria-hidden="true" style="color: #ffffff;"></i> --}}
                    <p>TOP UP</p>
                </a>
            </div>

        </div>

        <div class="history-topup">
            <div class="history-box">
                <p class="judul">History</p>
                <div class="topup-hist">
                    @foreach ($transaction as $t)
                        <div class="date">
                            <p>{{$t['transaction_date']}}</p>
                        </div>


                        <div class="topupp">
                            <p>TopUp</p>
                            <p>Rp{{$t['amount']}}</p>
                        </div>


                        <div class="time-hist">
                            <p>{{$t['transaction_time']}}</p>
                            @foreach ($tr_emone as $em)
                                @if ($em['id']==$t['emoney_id'])
                                    <div class="emoney-hist">
                                        <img src="{{$em['img']}}" alt="">
                                        <p>{{$em['name']}}</p>
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </div>

                    @endforeach
                </div>
            </div>

        </div>


    </div>
@endsection
