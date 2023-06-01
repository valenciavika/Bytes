@extends('main_template')



@section('content')
    <div class="mycart_section">
        <div class="mycart_head">
            MyCart
        </div>

        <div class="mycart_item_lists">
            <input type="checkbox">
            <div class="item_section">
                <img src="" alt="">
                <div class="item_desc">
                    <p class="item_tenant">tenant</p>
                    <p class="item_menu">menu</p>
                    <p class="item_price">Rp price</p>
                </div>
            </div>
            <div class="item_quantity_section">
                <div class="item_quantity_value_section">
                    <div class="item_quantity_minus_sign">-</div>
                    <div class="item_quantity_valu e">0</div>
                    <div class="item_quantity_plus_sign">+</div>
                </div>
                <div class="item_quantity_edit">Edit</div>
            </div>
        </div>

        <div class="mycart_checkout">CHECK OUT</div>
    </div>

    <div class="order_summary">
        <div class="back_sign">

        </div>
        <div class="order_summary_header">
            ORDER SUMMARY
        </div>
        <div class="payment_methods_section">
            <div class="payment_methods_header">Payment Methods</div>
            <div class="emoney_section">
                <img class="emoney_logo" src="" alt="">
                <div class="emoney_name">bipay</div>
                <div class="emoney_value">Rp{{number_format(1, 0 , '.' , '.' )}}</div>
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
        <div class="order_button">ORDER NOW</div>
    </div>
@endsection
