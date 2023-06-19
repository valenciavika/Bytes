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
                <img src={{ asset('/storage/tenant_images/'.$tenant->image_link) }} alt="">
            </div>

            <div class="Partorder">
                <div class="namatenant">
                    <strong>{{ $tenant->name }}</strong>
                </div>

                <div class="orderdetail">
                    <div class="quantity">
                        <p>{{ $order->quantity }}x</p>
                    </div>
                    <div class="pesanan">
                        <p>{{ $menu->name }}</p>
                    </div>
                </div>

                <div class="harga">
                    <p>Rp{{number_format($menu->price * $order->quantity + 1500, 0 , '.' , '.' )}}</p>
                </div>
            </div>

            <div class="finishedcontent" id="finishedcontent_{{ $order->id }}"></div>

            <div id="finishedcontent1_{{ $order->id }}" class="finishedcontent1" style="display: none">
                <div class="statuspickup">
                    <p class="pickuptxt"><strong>Ready to Pick up</strong></p>
                </div>

                <div class="buttonpickup">
                    <div class="confirmbutton" onclick="confirmPickUp({{ $order->id}})">
                        <p id="Pickup">
                            <strong>Confirm Pick Up</strong>
                        </p>
                    </div>
                </div>
            </div>


            <div id="finishedcontent2_{{ $order->id }}" class="finishedcontent2" style="display: none">
                {{-- {{$order->id}} --}}
                <div class="statuscomplete">
                    <p class="finishtxt"><strong>Completed</strong></p>
                </div>
                <div class="time">
                    <p>{{$order->date}} {{$order->clock}}</p>
                </div>
            </div>
        </div>

        <script>
            fillContent('{{ $order->confirmStatus }}', {{ $order->id }});
        </script>
    @endforeach
@else
    <p class="no_result">No Order Found</p>
@endif
