@extends('main_template')

@section('content')
    <div id="block_div" class="block_div"></div>
    <div class="inner_div_relative">
        
        <div id="cartSection" class="mycart_section">
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
                        <input id="check{{$cart->id}}" type="checkbox" onclick="updateTotalandIdArr(this, {{ $price[$cart->id-1] }}, {{ $cart->id }})">
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
                <div class="mycart_checkout" onclick="showOrder()">
                    CHECK OUT
                </div>
            </div>
        </div>
        
        <form id="order_summary" class="order_summary" action="/{{$id}}/cart/order_now" method="post" onsubmit="orderNow(event)" style="display: none">
            @csrf
            <i class="fa fa-arrow-left back_sign" onclick="hideOrder()"></i>
            <div class="order_summary_header">
                ORDER SUMMARY
            </div>
            <div class="payment_methods_section">
                <div class="payment_methods_header">Payment Methods</div>
                <div class="payment_methods">
                    @foreach ($emoneys as $emoney)
                        <div id="emoney_section{{ $emoney->id }}" class="emoney_section" onclick="chooseEmoneytoPay({{ $emoney->id }})">
                            <div class="emoney_logo_name">
                                <img class="emoney_logo" src="{{ $emoney->img }}" alt="">
                                <div class="emoney_name">{{ $emoney->name }}</div>
                            </div>
                            @foreach ($moneys as $money)
                                @if ($money->emoney_id == $emoney->id)
                                    <div class="emoney_value" onload="sendData({{ $money->totalAmount }}, {{ $emoney->id }})">
                                        <span id="emoney_insufficient{{ $emoney->id }}">(insufficient)</span>
                                        Rp{{number_format($money->totalAmount, 0, '.' , '.' )}}
                                    </div>
                                    <script>
                                        window.addEventListener('DOMContentLoaded', sendData({{ $money->totalAmount }}, {{ $emoney->id }}, {{ $id }}));
                                    </script>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="total_payment_section">
                <div class="subtotal">
                    <p>Subtotal:</p>
                    <p id="orderSubtotal"></p>
                </div>
                <div class="service_charge">
                    <p>Service charge:</p>
                    <p id="orderCharge"></p>
                </div>
                <div class="total_value">
                    <p>Total:</p>
                    <p id="orderTotal"></p>
                </div>
            </div>
            <div class="order_button_section">
                <button id="orderButton" class="order_button">ORDER NOW</button>
                <a id="topUpButton" class="order_button" href="/{{$id}}/topup/BiPay/History">Top Up</a>
            </div>
        </form>
    </div>
@endsection

<script>
    var totalPrice = 0;
    var formattedPrice;
    var idArr = [];
    var totalAmount = [];
    var emoneyId = [];
    var chosenEmoneyId = 0;
    var statusInsufficient = [];
    var userId;

    function updateTotalandIdArr(checkbox, price, id) {
        var status = checkbox.checked;
        var element = document.getElementById("quality_value"+id);
        var quantity = element.innerHTML;

        if (status) {
            totalPrice += price * quantity
            idArr.push(id)
        } else {
            totalPrice -= price * quantity
            for (let i = 0; i < idArr.length; i++) {
                if (id == idArr[i]) {
                    idArr.splice(i, 1);
                    break;
                }
            }
        }
        updateViewTotal();
        checkEmoneyStatus();
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
        formattedPrice = 'Rp' + totalPrice.toLocaleString('en-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }).replace(',', '.');

        var subtotalElements = document.getElementsByClassName('subtotal_value');
        if (subtotalElements.length > 0) {
            subtotalElements[0].innerHTML = formattedPrice;
        }
    }

    function hideOrder() {
        document.getElementById('order_summary').style.display = "none";
        document.getElementById('cartSection').style.opacity = 1;
        document.getElementById('block_div').style.display = "none";
    }

    function showOrder() {
        var formattedCharge = 'Rp' + (idArr.length * 1500).toLocaleString('en-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }).replace(',', '.');
        var formattedTotalPrice = 'Rp' + (idArr.length * 1500 + totalPrice).toLocaleString('en-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }).replace(',', '.');
        
        document.getElementById('orderSubtotal').innerHTML = formattedPrice;
        document.getElementById('orderCharge').innerHTML = formattedCharge;
        document.getElementById('orderTotal').innerHTML = formattedTotalPrice;

        document.getElementById('cartSection').style.opacity = 0.4;
        document.getElementById('order_summary').style.display = "block";

        document.getElementById('block_div').style.display = "block";

        checkEmoneyStatus();
    }

    function checkEmoneyStatus() {
        for (let i = 0; i < totalAmount.length; i++) {
            var elementEmoneySection = document.getElementById('emoney_section' + emoneyId[i]);
            var elementEmoneyinsufficient = document.getElementById('emoney_insufficient' + emoneyId[i]);
            
            if (totalAmount[i] < totalPrice) {
                elementEmoneySection.style.opacity = 0.5;
                elementEmoneyinsufficient.style.display = 'block';
                statusInsufficient.push(false);
            }
            else {
                elementEmoneySection.style.opacity = 1;
                elementEmoneyinsufficient.style.display = 'none';
                statusInsufficient.push(true);
                chooseEmoneytoPay(i+1)
                chosenEmoneyId = i+1;
            }
        }

    }

    function sendData(totalAmountData, emoneyIdData, userIdData) {
        totalAmount.push(totalAmountData);
        emoneyId.push(emoneyIdData);
        userId = userIdData;
    }
   
    function chooseEmoneytoPay(emoneyId) {
        var elementChosenEmoneyId;
        if (chosenEmoneyId != 0) {
            elementChosenEmoneyId = document.getElementById('emoney_section' + chosenEmoneyId);
            elementChosenEmoneyId.style.borderStyle = "none";
            elementChosenEmoneyId.style.backgroundColor = "#F9C140";
        }
        
        chosenEmoneyId = emoneyId;
        elementChosenEmoneyId = document.getElementById('emoney_section' + emoneyId);
        elementChosenEmoneyId.style.borderStyle = "solid";
        elementChosenEmoneyId.style.backgroundColor = "rgba(217, 217, 217, 0.1)";

        if (statusInsufficient[emoneyId-1]) {
            document.getElementById('topUpButton').style.display = "none";
            document.getElementById('orderButton').style.display = "block";
            return;
        }
        
        document.getElementById('topUpButton').style.display = "block";
        document.getElementById('orderButton').style.display = "none";
    }

    function orderNow() {
        event.preventDefault();
        var url = '/' + {{$id}} + '/cart/order_now?totalPrice=' + totalPrice + '&emoneyId=' + chosenEmoneyId + '&idArr=' + JSON.stringify(idArr);
        
        fetch(url)
        .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Error: ' + response.status);
        }
        })
        .then(data => {
            console.log('Response:', data);
            })
            .catch(error => {
            console.error('Error:', error);
        });
        
    }
</script>