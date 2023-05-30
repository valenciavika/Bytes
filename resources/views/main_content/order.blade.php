@extends('/main_template')

@section('content')
    <div class="AllOrder">
        <p class="transactionstatus"><strong>Transaction Status</strong></p>

        <div class="allpart">
            <div class="partprocessing">
                <a href="#" class="part">
                    <p id="textorder">Processing</p>
                </a>
            </div>
            <div class="partfinished">
                <a href="#" class="part">
                    <p id="textorder">Finished</p>
                </a>
            </div>
        </div>

        <div class="ordercontent">
            <div class="processingcontent">
                <div class="foto">
                   <img src="" alt="">
                </div>


                <div class="Partorder">
                    <div class="namatenant">
                        <strong>Bakmi Effata</strong>
                    </div>

                    <div class="orderdetail">
                        <div class="quantity">
                            <p>3x</p>
                        </div>
                        <div class="pesanan">
                            <p>Bakmi Keriting/Lebar Ayam Biasa Polos</p>
                        </div>
                    </div>

                     <div class="harga">
                        <p>Rp60.000</p>
                    </div>

                </div>

                <div class="statusinfo">
                    <div class="statusorder">
                        <p><strong>In Progress</strong></p>
                    </div>
                    <div class="estimation">
                        <p>Estimated ready at 11:00</p>
                    </div>
                </div>



            </div>
            <div class="finishedcontent">
                <div class="statusfinish">
                    <p><strong>Finish</strong></p>
                </div>
                <div class="buttonpickup">
                    <button type="submit" id="button" value="topup" class="TopUpButton" onclick="window.location.href='/1/topup/BiPay'">
                        <p id="Topup">
                            <strong>TOP UP</strong>
                        </p>
                    </button>
                </div>
            </div>

        </div>

    </div>
@endsection
