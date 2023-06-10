@extends('/user_page.main_template')

@section('content')
    @php
        function getNotificationUrl($type, $user_id)
        {
            switch ($type) {
                case 'ready':
                    return url($user_id . '/cart');
                case 'ordersubmitted':
                    return url($user_id . '/order');
                case 'unpaid':
                    return url($user_id . '/cart');
                default:
                    return '#'; // Default fallback URL
            }
        }

        $count = 0;

    @endphp

    <div class="notificationSection">
        <div class="all-notif">
            @foreach ($notifications as $notif)
                @php
                    $count += 1;
                @endphp
                {{-- {{$count}} --}}
                <div class="each-notif" style="border-bottom: {{ $count == $count_notif ? '': '1.5px solid black'}}">
                    <a href="{{ getNotificationUrl($notif->type, $id) }}">
                        <div class="head">
                            <p class="headtxt"><strong>{{ $notif->title }}</strong></p>
                            <p class="time">{{ \Carbon\Carbon::parse($notif->time)->diffForHumans()}}</p>
                        </div>
                        <p>{{ $notif->description }}</p>
                    </a>
                </div>
            @endforeach
        </div>



        {{-- <div class="ready">
            <a href="">
                <div class="head">
                    <p class="headtxt"><strong>Your order is ready to be picked up!</strong></p>
                    <p class="time">3 mins ago</p>
                </div>
                <p>Your order at Bakmi Effata is ready, you can pick up your order at the cafeteria.</p>
            </a>
        </div>

        <div class="ordersubmitted">
            <a href="">
                <div class="head">
                    <p class="headtxt"><strong>Your order has been submitted!</strong></p>
                    <p class="time">10 mins ago</p>
                </div>
                <p>Thank you for ordering, please wait for the tenant to finish your order!</p>
            </a>
        </div>

        <div class="unpaid">
            <a href="">
                <div class="head">
                    <p class="headtxt"><strong>You have an unpaid order!</strong></p>
                    <p class="time">12 mins ago</p>
                </div>
                <p>You haven't paid your order at Bakmi Effata, please proceed to pay at your shopping cart.</p>
            </a>
        </div> --}}
    </div>
@endsection

@push('styles')
    <link href="{{asset('css/notification.css')}}" rel="stylesheet" />
@endpush

