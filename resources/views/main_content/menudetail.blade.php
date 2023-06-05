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
                            jemTextElement.textContent = hours + ":" + minutes;
                        } else {
                            batchTextElement.textContent = "Batch " + batchNumber + " ends at ";
                            jemTextElement.textContent = hours.toString().padStart(2, '0') + ":" + minutes.toString().padStart(2, '0');
                        }
                    </script>
                </div>
            </div>
            <div class="jumlah">
                <div class="pilih">
                    <div class="jenis1">
                        <div class="kotak">
                            <input type="checkbox" id="checkbox" name="checkbox" required>
                        </div>
                        <p>Mie keriting</p>
                    </div>
                    <br>
                    <div class="jenis2">
                        <div class="kotak">
                            <input type="checkbox" id="checkbox" name="checkbox" required>
                        </div>
                        <p>Mie lurus</p>
                    </div>
                </div>
                <div class="counter">
                    <div class="mines">
                        <p class=text-mines>-</p>
                    </div>
                    <div class="isi">
                        <p class="text-isi">5</p>
                    </div>
                    <div class="plus">
                        <p class="text-plus">+</p>
                    </div>
                </div>
            </div>
            <div class="request">
                <div>
                    <p>halo</p>
                </div>
            </div>
            <div class="add-cart">
                <div class="add">
                    <p class="text-add">ADD TO CART</p>
                </div>
            </div>
        </div>
    </div>
@endsection



