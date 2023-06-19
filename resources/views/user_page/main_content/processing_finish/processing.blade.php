@php
    $menu;
    $tenant;
@endphp

<div class="processingcontent">
    @if ($transactions->count())
        @foreach ($transactions as $transaction)
            @foreach ($menus as $i)
                @if ($i->id == $transaction->menu_id)
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
                    <img src={{ asset('/storage/tenant_images/'.$tenant->image_link) }} alt="">
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
                        <p>Rp{{number_format($menu->price * $transaction->quantity + 1500, 0 , '.' , '.' )}}</p>
                    </div>

                </div>

                <div class="statusinfo">
                    <div class="statusorder">
                        <p class="prosestxt"><strong>In Progress</strong></p>
                    </div>
                    <div class="estimation">
                        <p>Estimated ready at {{$transaction->expected_clock}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p class="no_result">No Order Found</p>
    @endif
</div>

