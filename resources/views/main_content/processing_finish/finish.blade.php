@php
    $menu;
    $tenant;
@endphp

<div class="processingcontent">

    @if ($orders->count())
        @foreach ($orders as $order)
            @foreach ($menus as $i)
            @if ($i->id == $order->menu_id)
                @php
                    $menu = $i;
                    break;
                @endphp
            @endif
        @endforeach

        @foreach ($tenants as $i)
            @if ($i->id == $menu->tenant_id)
                @php
                    $tenant = $i;
                    break;
                @endphp
            @endif
        @endforeach

        <div class="processing_finish_list">
            <div class="foto">
                <img src="" alt="">
            </div>


            <div class="Partorder">
                <div class="namatenant">
                    <strong>{{ $tenant->name }}</strong>
                </div>

                <div class="orderdetail">
                    <div class="quantity">
                        <p>{{ $transaction->quantity }}x</p>
                    </div>
                    <div class="pesanan">
                        <p>{{ $menu->name }}</p>
                    </div>
                </div>
                    <div class="harga">
                    <p>Rp{{number_format($menu->price * $transaction->quantity + $transaction->quantity * 1500, 0 , '.' , '.' )}}</p>
                </div>

            </div>
        </div>

        @endforeach
    @else
        <p class="no_result">No order found.</p>
    @endif
</div>

{{-- <div class="finishedcontent">
    <div class="statuspickup">
        <p class="pickuptxt"><strong>Ready to Pick up</strong></p>
    </div>
    <div class="buttonpickup">
        <a class="confirmbutton" href="#">
            <p id="Pickup">
                <strong>PICK UP</strong>
            </p>
        </a>
    </div>

    <div class="statuscomplete">
        <p class="finishtxt"><strong>Completed</strong></p>
    </div>

</div> --}}
