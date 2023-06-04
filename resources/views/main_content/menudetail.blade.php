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
                <p class="text-title">Bakmi keriting/lebar ayam biasa polos</p>
            </div>
            <div class="detail">
                <div class="price">
                    <p class="text-price">Rp20.000</p>
                </div>
                <div class="detail2">
                    <div class="stok">
                        <p class="text-stok">50 in stock</p>
                    </div>
                    <br>
                    <div class="batch">
                        <p class="text-batch">BATCH 1 ENDS AT <div class="jem"><p class="text-jem">08:50</p></div></p>
                    </div>
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
