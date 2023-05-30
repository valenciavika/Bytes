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
                    <div class="item_quantity_value">0</div>
                    <div class="item_quantity_plus_sign">+</div>
                </div>
                <div class="item_quantity_edit">Edit</div>
            </div>
        </div>

        <div class="mycart_checkout">CHECK OUT</div>
    </div>
@endsection