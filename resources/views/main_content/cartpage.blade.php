@extends('main_template')

@section('content')

    <div class="inner_div_relative">
        <div class="mycart_section">
            <div class="mycart_head">
                MyCart
            </div>
    
            <div class="mycart_item_list_section">
                @php
                    $price = [];
                    @endphp
                @foreach ($carts as $cart)
                    <div class="mycart_item_lists">
                        @php
                            $menu = $menus[$cart->menu_id-1];
                            $tenant = $tenants[$menu->tenant_id-1];
                            array_push($price, $menu->price);
                        @endphp
                        <input id="check{{$cart->id}}" type="checkbox" onclick="updateTotal(this, {{ $price[$cart->id-1] }}, {{ $cart->id }})">
                        <div class="item_section">
                            <img src="{{''}}" alt="">
                            <div class="item_desc">
                                <p class="item_tenant">{{ $tenant->name }}</p>
                                <p class="item_menu">{{ $menu->name }}</p>
                                <p id="checkbox_{{ $cart->id }}" class="item_price">Rp{{number_format($menu->price, 0 , '.' , '.' )}}</p>
                            </div>
                        </div>
                        <div class="item_quantity_section">
                            <div class="item_quantity_value_section">
                                <div id="hover_toggle{{$cart->id}}" class="item_quantity_minus_sign" style="{{ $cart->quantity == 1 ? 'visibility: hidden;' : 'visibility: visible' }};">
                                    <i id="min_sign{{$cart->id}}" onclick="myFunction_minus(id, {{ $price[$cart->id-1] }})" class="fa fa-minus" aria-hidden="true"></i>
                                </div>
                                <div id="quality_value{{$cart->id}}" class="item_quantity_value">{{ $cart->quantity }}</div>
                                <div id="plus_sign{{$cart->id}}" class="item_quantity_plus_sign" onclick="myFunction_plus(id, {{ $price[$cart->id-1] }})"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            </div>
                            <div class="item_quantity_edit"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</div>
                        </div>  
                    </div>
                @endforeach
            </div>
            <div class="totalvalue_and_checkout_section">
                <div class="mycart_totalvalue">
                    <p >Subtotal: </p>
                    <p class="subtotal_value">Rp{{number_format(0, 0 , '.' , '.' )}}</p>
                </div>
                <div class="mycart_checkout">CHECK OUT</div>
            </div>
        </div>
    
        <form class="order_summary" style="display: none;">
            <i class="fa fa-arrow-left back_sign"></i>
            <div class="order_summary_header">
                ORDER SUMMARY
            </div>
            <div class="payment_methods_section">
                <div class="payment_methods_header">Payment Methods</div>
                <div class="payment_methods">
                    @foreach ($emoneys as $emoney)
                        <div class="emoney_section">
                            <div class="emoney_logo_name">
                                <img class="emoney_logo" src="{{ $emoney->img }}" alt="">
                                <div class="emoney_name">{{ $emoney->name }}</div>
                            </div>
                            <div class="emoney_value">Rp{{number_format(1, 0 , '.' , '.' )}}</div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="total_payment_section">
                <div class="subtotal">
                    <p>Subtotal:</p>
                    <p>Rp{{number_format(1, 0 , '.' , '.' )}}</p>
                </div>
                <div class="service_charge">
                    <p>Service charge:</p>
                    <p>Rp{{number_format(1, 0 , '.' , '.' )}}</p>
                </div>
                <div class="total_value">
                    <p>Total:</p>
                    <p>Rp{{number_format(1, 0 , '.' , '.' )}}</p>
                </div>
            </div>
            <div class="order_button_section">
                <button class="order_button">ORDER NOW<button>
            </div>
        </form>
    </div>
@endsection

<script>
    var totalPrice = 0;
    
    function updateTotal(checkbox, price, id) {
        var status = checkbox.checked;
        var element = document.getElementById("quality_value"+id);
        var quantity = element.innerHTML;

        if (status) {
            totalPrice += price * quantity
        } else {
            totalPrice -= price * quantity
        }
        updateViewTotal();
    }

    function stop_hover(id) {
        document.getElementById(id).style.visibility = "hidden";
    }

    function start_hover(id) {
        document.getElementById(id).style.visibility = "visible";
    }

    function myFunction_plus(id, price) {
        id = id.slice(9);
        element = document.getElementById("quality_value"+id);
        quality_total = element.innerHTML;  

        if(quality_total>=1) {
            start_hover("hover_toggle"+id);
        }

        quality_total++;
        var element1 = document.getElementById('check'+id)
        var status = element1.checked;  
        if (status) {
            totalPrice += price
        }
        element.innerHTML = quality_total;
        updateViewTotal();
    }

    function myFunction_minus(id, price) {
        id = id.slice(8);
        element = document.getElementById("quality_value"+id);
        quality_total = element.innerHTML;
        
        quality_total--;
        var element1 = document.getElementById('check'+id)
        var status = element1.checked;
        if (status) {
            totalPrice -= price
        }
        if(quality_total==1) {
            stop_hover("hover_toggle"+id);
        }
        else if (quality_total<1) {
            return;
        }
        element.innerHTML = quality_total;
        updateViewTotal();
    }

    function updateViewTotal() {
        var formattedPrice = 'Rp' + totalPrice.toLocaleString('en-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }).replace(',', '.');

        var subtotalElements = document.getElementsByClassName('subtotal_value');
        if (subtotalElements.length > 0) {
            subtotalElements[0].innerHTML = formattedPrice;
        }
    }


</script>