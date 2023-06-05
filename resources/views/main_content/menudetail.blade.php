@extends('/main_template')

@section('content')
    <div class="kontener">
        <div class="left">
            <div class="div-name-restoran">
                <p class="text-name-restoran"><i><u>Bakmi Effata</u></i></p>
            </div>
            <div class="logo-binuseat">
                <img src="{{asset('/images/Logo_Binuseats.png')}}">
            </div>
        </div>
        <div class="right">
            <div class="title">
                <p class="text-title">{{$menu->name}}</p>
            </div>
            <div class="detail">
                <div class="price">
                    <p class="text-price">Rp{{number_format($menu->price, 0 , '.' , '.' )}}</p>
                </div>
                <div class="detail2">
                    <div class="stok">
                        <p class="text-stok">{{$menu->stock}} in stock</p>
                    </div>
                    <br>
                    <div class="batch">
                        <p class="text-batch" id="batch-text"><div class="jem"><p class="text-jem" id="jem-text"></p></div></p>
                    </div>
                    <script>
                        var currentTime = new Date();
                        var hours = currentTime.getHours();
                        var minutes = currentTime.getMinutes();

                        var batchNumber;
                        if (hours < 8 || (hours == 8 && minutes < 50)) {
                            batchNumber = 1;
                        } else if (hours < 10 || (hours == 10 && minutes < 50)) {
                            batchNumber = 2;
                        } else if (hours < 12 || (hours == 12 && minutes < 50)) {
                            batchNumber = 3;
                        } else if (hours < 14 || (hours == 14 && minutes < 50)) {
                            batchNumber = 4;
                        } else {
                            batchNumber = "No more batches for today";
                        }

                        var batchTextElement = document.getElementById("batch-text");
                        var jemTextElement = document.getElementById("jem-text");
                        if (batchNumber === "No more batches for today") {
                            batchTextElement.textContent = batchNumber;
                            jemTextElement.textContent = hours + ":";
                            if (minutes < 10) {
                                jemTextElement.textContent += "0";
                            }
                            jemTextElement.textContent += minutes;
                        } else {
                            batchTextElement.textContent = "Batch " + batchNumber + " ends at ";
                            jemTextElement.textContent = hours.toString().padStart(2, '0') + ":" + minutes.toString().padStart(2, '0');
                        }
                    </script>
                </div>
            </div>
            <div class="jumlah">
                @if ($menu->jenis)
                    @php
                        $jenisArr = explode(",", $menu->jenis);
                    @endphp
                    <div class="pilih">
                    @foreach ($jenisArr as $item)
                        <div class="jenis">
                            <div class="kotak">
                                <input type="checkbox" id="checkbox" name="checkbox" required>
                            </div>
                            <p>{{ $item }}</p>
                        </div>
                    @endforeach
                    </div>
                @endif
            </div>
            <div class="request">
                <div>
                    <input type="text" class="requesttxt" placeholder="halo">
                </div>
            </div>
            <div class="item_quantity_section">
                <div class="item_quantity_value_section">
                    <div id="hover_toggle" class="item_quantity_minus_sign" style="visibility: hidden;">
                        <i id="min_sign" onclick="myFunction_minus({{ $menu->price }})" class="fa fa-minus" aria-hidden="true"></i>
                    </div>
                    <div id="quality_value" class="item_quantity_value">1</div>
                    <div id="plus_sign" class="item_quantity_plus_sign" onclick="myFunction_plus({{ $menu->price }})"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </div>
            </div>
            <div class="add-cart">
                <div class="add">
                    <a href="#popup-confirm">
                        <p class="text-add">ADD TO CART</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="popup-confirm" id="popup-confirm">
            <div class="isi">
                <div class="text-sukses">
                    <p class="teks-sukses"><strong>Order successfully added to cart!</strong></p>    
                </div>
                <div class="text-ok">
                    <p class="teks-ok"><strong>OK</strong></p>
                </div>
            </div>
        </div>

        <script>
            window.addEventListener('DOMContentLoaded', sendData({{ $menu->price}}, {{ $menu->stock }}));
        </script>
@endsection

<script>
    var element;
    var quality_total;
    var totalStock = 0;
    var price = 0;

    function updateViewTotal() {
        document.getElementById('orderSubtotal').innerHTML = quality_total * price;
    }

    function stop_hover(id) {
        document.getElementById(id).style.visibility = "hidden";
    }

    function start_hover(id) {
        document.getElementById(id).style.visibility = "visible";
    }

    function myFunction_plus(price) {
        element = document.getElementById("quality_value");
        quality_total = element.innerHTML;
        quality_total++;

       if (quality_total==totalStock) {

            stop_hover("plus_sign");
        }

        else {
            start_hover("hover_toggle");
        }

        element.innerHTML = quality_total;
        updateViewTotal();
    }

    function myFunction_minus(price) {
        element = document.getElementById("quality_value");
        quality_total = element.innerHTML;
        quality_total--;
        if(quality_total==1) {
            stop_hover("hover_toggle");
        }
        else {
            start_hover("plus_sign");
        }

        element.innerHTML = quality_total;
        updateViewTotal();
    }

    function sendData(priceData, stockData) {
        price = priceData;
        totalStock = stockData;
    }
</script>

