@extends('/main_template')

@section('content')
    <div class="container">
        <div class="kiri">
            <div class="div-nama-restoran">
                <p class="text-nama-restoran"><i><u>Bakmi Effata</u></i></p>
            </div>
            <div class="logo-binuseats">
                <img src="{{asset('/images/Logo_Binuseats.png')}}">
            </div>
            <div class="description">
                <p class="text-description">
                <strong>
                Bakmi Effata adalah restoran yang terkenal dengan hidangan bakmi ayam khas Bangka. Restoran ini dikenal dengan cita rasa yang lezat dan autentik dari hidangan bakmi ayamnya yang dibuat dengan bahan-bahan berkualitas tinggi.
                </strong>
                </p>
            </div>
        </div>
        <div class="kanan">
            <div class="menu">
                <div class="container-menu">
                    <div class="nama-menu">
                        <div class="isi-menu">
                            <div class="menu1">
                                <p class="text-nama-menu">Bakmi keriting/lebar ayam biasa polos</p>
                            </div>
                            <div class="tengah">
                                <div class="harga">
                                    <p class="text-harga">Rp20.000</p>
                                </div>
                                <div class="order">
                                    <p class="text-order">ORDER</p>
                                </div>
                            </div>
                            <div class="stock">
                                <p style="color:#F26122" class="text-stock"><b>50 in stock</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="nama-menu">
                    </div>
                    <div class="nama-menu">
                    </div>
                    <div class="nama-menu">
                    </div>
                    <div class="nama-menu">
                    </div>
                    <div class="nama-menu">
                    </div>
                </div>
            </div>
            <div class="logo-panah">
                <img src="{{asset('/images/Right_Arrow.png')}}" >
            </div>
        </div>
    </div>
@endsection