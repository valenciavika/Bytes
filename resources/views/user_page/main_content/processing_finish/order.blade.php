@extends('/user_page.main_template')

@section('content')
    <div class="AllOrder">
        <p class="transactionstatus"><strong>Transaction Status</strong></p>

        <div class="allpart">
            <div id="orderNav1" class="partprocessing" onclick="toggleOrderContent(1)">
                <p id="textorder">Processing</p>
            </div>
            <div id="orderNav2" class="partfinished" onclick="toggleOrderContent(2)">
                <p id="textorder">Finished</p>
            </div>
        </div>

        <div id="orderContent" class="ordercontent">

        </div>

        <div id="orderFinish" style="display: none">
            @include('/user_page.main_content.processing_finish.processing')
        </div>

        <div id="orderProcessing" style="display: none">
            @include('/user_page.main_content.processing_finish.finish')
        </div>

        <script>
            toggleOrderContent(1);
        </script>
    </div>
@endsection

<script>
    var element;
    var temp;

    function toggleOrderContent(value) {
        element = document.getElementById("orderNav"+value);
        element.style.backgroundColor = '#FCEDCA';
        if (value == 1) {
            element = document.getElementById("orderNav"+2);
            element.style.backgroundColor = 'white';

            element = document.getElementById("orderFinish");
        }
        else {
            element = document.getElementById("orderNav"+1);
            element.style.backgroundColor = 'white';

            element = document.getElementById("orderProcessing");
        }

        document.getElementById("orderContent").innerHTML = element.innerHTML;
    }

    function fillContent(statusConfirm, order_id) {
        element = document.getElementById('finishedcontent_' + order_id);
        if (statusConfirm == 'not_confirm') {
            temp = document.getElementById("finishedcontent1_" + order_id);
        }
        else {
            temp = document.getElementById("finishedcontent2_" + order_id);
        }
        console.log('finishedcontent_' + order_id, temp)
        element.innerHTML = temp.innerHTML;
    }

    function confirmPickUp(order_id) {
        var url = "/" + encodeURIComponent({{ $id }}) + '/order/confirm_pickup?orderid=' + encodeURIComponent(order_id);

        console.log(url);
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


        location.reload();
    }
</script>

@push('styles')
    <link href="{{asset('css/order.css')}}" rel="stylesheet" />
@endpush

