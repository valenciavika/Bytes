@extends('/tenant_page.tenant_template')

@section('content')
<div class="isisi">
    <div class="admin-transaction">
        <p class="transaction-status"><strong>Ongoing Transaction</strong></p>
        <div class="order-content">
            <div class="processing-content">
                <div class="foto-makanan">
                    <img src="" alt="">
                </div>

                <div class="Partorder">
                    <div class="namatenant">
                        <p class="text-namatenant"><strong>Bakmi Effata</strong></p>
                    </div>

                    <div class="orderdetail">
                        <div class="quantity">
                            <p class="text-quantity">3x</p>
                        </div>
                        <div class="pesanan">
                            <p class="text-pesanan">Bakmi Keriting/Lebar Ayam Biasa Polos</p>
                        </div>
                    </div>

                        <div class="notes">
                        <p class="text-notes">Notes: Tidak pakai sayur</p>
                    </div>
                </div>

                <div class="statusinfo">
                    <div class="status-order">
                        <p id="text1" class="proses-txt"><strong>Finish Order</strong></p>
                        <i id="iconchecklist" class="fa-regular fa-circle-check" onmouseover="showText('text1')" onmouseout="hideText('text1')"></i>
                    </div>
                        <i id="iconbell" class="fa-regular fa-bell"></i>
                </div>
            </div>
            <div class="processing-content">
                <div class="foto-makanan">
                    <img src="" alt="">
                </div>

                <div class="Partorder">
                    <div class="namatenant">
                        <p class="text-namatenant"><strong>Bakmi Effata</strong></p>
                    </div>

                    <div class="orderdetail">
                        <div class="quantity">
                            <p class="text-quantity">3x</p>
                        </div>
                        <div class="pesanan">
                            <p class="text-pesanan">Bakmi Keriting/Lebar Ayam Biasa Polos</p>
                        </div>
                    </div>

                        <div class="notes">
                        <p class="text-notes">Notes: Tidak pakai sayur</p>
                    </div>
                </div>

                <div class="statusinfo">
                    <div class="status-order">
                        <p id="text1" class="proses-txt"><strong>Finish Order</strong></p>
                        <i id="iconchecklist" class="fa-regular fa-circle-check"></i>
                    </div>
                        <i id="iconbell" class="fa-regular fa-bell"></i>
                </div>
            </div>
            <div class="processing-content">
                <div class="foto-makanan">
                    <img src="" alt="">
                </div>

                <div class="Partorder">
                    <div class="namatenant">
                        <p class="text-namatenant"><strong>Bakmi Effata</strong></p>
                    </div>

                    <div class="orderdetail">
                        <div class="quantity">
                            <p class="text-quantity">3x</p>
                        </div>
                        <div class="pesanan">
                            <p class="text-pesanan">Bakmi Keriting/Lebar Ayam Biasa Polos</p>
                        </div>
                    </div>

                        <div class="notes">
                        <p class="text-notes">Notes: Tidak pakai sayur</p>
                    </div>
                </div>

                <div class="statusinfo">
                    <div class="status-order">
                        <p class="proses-txt"><strong>Finish Order</strong></p>
                        <i id="iconchecklist" class="fa-regular fa-circle-check"></i>
                    </div>
                        <i id="iconbell" class="fa-regular fa-bell"></i>
                </div>
            </div>
            <div class="processing-content">
                <div class="foto-makanan">
                    <img src="" alt="">
                </div>

                <div class="Partorder">
                    <div class="namatenant">
                        <p class="text-namatenant"><strong>Bakmi Effata</strong></p>
                    </div>

                    <div class="orderdetail">
                        <div class="quantity">
                            <p class="text-quantity">3x</p>
                        </div>
                        <div class="pesanan">
                            <p class="text-pesanan">Bakmi Keriting/Lebar Ayam Biasa Polos</p>
                        </div>
                    </div>

                        <div class="notes">
                        <p class="text-notes">Notes: Tidak pakai sayur</p>
                    </div>
                </div>

                <div class="statusinfo">
                    <div class="status-order">
                        <p class="proses-txt"><strong>Finish Order</strong></p>
                        <i id="iconchecklist" class="fa-regular fa-circle-check"></i>
                    </div>
                        <i id="iconbell" class="fa-regular fa-bell"></i>
                </div>
            </div>
            <div class="processing-content">
                <div class="foto-makanan">
                    <img src="" alt="">
                </div>

                <div class="Partorder">
                    <div class="namatenant">
                        <p class="text-namatenant"><strong>Bakmi Effata</strong></p>
                    </div>

                    <div class="orderdetail">
                        <div class="quantity">
                            <p class="text-quantity">3x</p>
                        </div>
                        <div class="pesanan">
                            <p class="text-pesanan">Bakmi Keriting/Lebar Ayam Biasa Polos</p>
                        </div>
                    </div>

                        <div class="notes">
                        <p class="text-notes">Notes: Tidak pakai sayur</p>
                    </div>
                </div>

                <div class="statusinfo">
                    <div class="status-order">
                        <p class="proses-txt"><strong>Finish Order</strong></p>
                        <i id="iconchecklist" class="fa-regular fa-circle-check"></i>
                    </div>
                        <i id="iconbell" class="fa-regular fa-bell"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="{{asset('css/tenanttransaction.css')}}" rel="stylesheet" />
@endpush

<script>
    function showText(tag_id) {
        document.getElementById(tag_id).style.visibility = 'visible';
    }
    
    function hideText(tag_id) {
        console.log(tag_id)
        
        document.getElementById(tag_id).style.visibility = 'hidden';
    }

</script>