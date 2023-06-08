@extends('/user_page.main_template')

@section('content')
    @php
        $count = $menus->count();
    @endphp
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
                @for ($i = 0; $i < $count/6; $i++)
                    <div id="menuContainer{{$i+1}}" class="container-menu" style="display: none">
                    @for ($j = 6*$i; $j < 6*$i + 6; $j++)
                        @if ($j == $menus->count())
                           @break
                        @endif
                        <div class="nama-menu">
                            <div class="isi-menu">
                                <div class="menu1">
                                    <p class="text-nama-menu">{{$menus[$j]->name}}</p>
                                </div>
                                <div class="tengah">
                                    <div class="harga">
                                        <p class="text-harga">Rp{{number_format($menus[$j]->price, 0 , '.' , '.' )}}</p>
                                    </div>
                                    <a class="order" href="/{{$id}}/menu_detail/{{$tenant_name}}/{{$menus[$j]->id}}">
                                        <p class="text-order">ORDER</p>
                                    </a>
                                </div>
                                <div class="stock"> 
                                    <p style="color:#F26122" class="text-stock"><b>{{$menus[$j]->stock}} in stock</b></p>
                                </div>
                            </div>
                        </div>
                    @endfor
                    </div>
                @endfor
                
            </div>
            <div class="logo_panah_kanan" id="rightLogo">
                <div id="logoRightBlockDiv" class="logo_block_div"></div>
                <i class="fa fa-chevron-right" aria-hidden="true" onclick="changeRightMenuView()""></i>
            </div>
            <div class="logo_panah_kiri" id="leftLogo">
                <div id="logoLeftBlockDiv" class="logo_block_div"></div>
                <i class="fa fa-chevron-left" aria-hidden="true" onclick="changeLeftMenuView()"></i>
            </div>
        </div>
        <script>
            window.addEventListener('DOMContentLoaded', sendData({{$count/6}}));
        </script>
    </div>
@endsection

@push('styles')
    <link href="{{asset('css/menu.css')}}" rel="stylesheet" />
@endpush


<script>
    var prevViewCount = 0;
    var viewCount = 0;
    var totalView = 0;

    function sendData(totalViewData) {
       totalView = totalViewData;
       changeRightMenuView();
    }
    
    function changeRightMenuView() {
        prevViewCount = viewCount;
        viewCount += 1;
        
        if (prevViewCount > 0) {
            document.getElementById('menuContainer' + prevViewCount).style.display = 'none';
        }
        document.getElementById('menuContainer' + viewCount).style.display = 'flex';
        
        updateBlockDiv();
    }

    function changeLeftMenuView() {
        prevViewCount = viewCount;
        viewCount -= 1;
        
        if (prevViewCount > 0) {
            document.getElementById('menuContainer' + prevViewCount).style.display = 'none';
        }
        document.getElementById('menuContainer' + viewCount).style.display = 'flex';
        
        updateBlockDiv();
    }

    function updateBlockDiv() {
        if (viewCount == totalView) {
            document.getElementById('rightLogo').style.opacity = 0.4;
            document.getElementById('logoRightBlockDiv').style.display = 'block';
            document.getElementById('leftLogo').style.opacity = 1;
            document.getElementById('logoLeftBlockDiv').style.display = 'none';
        }
        else if (viewCount == 1) {
            document.getElementById('leftLogo').style.opacity = 0.4;
            document.getElementById('logoLeftBlockDiv').style.display = 'block';
            document.getElementById('rightLogo').style.opacity = 1;
            document.getElementById('logoRightBlockDiv').style.display = 'none';
        }
        else {
            document.getElementById('rightLogo').style.opacity = 1;
            document.getElementById('logoRightBlockDiv').style.display = 'none';
            document.getElementById('leftLogo').style.opacity = 1;
            document.getElementById('logoLeftBlockDiv').style.display = 'none';
        }
    }
    </script>