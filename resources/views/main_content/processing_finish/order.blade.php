@extends('/main_template')

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
            @include('/main_content.processing_finish.processing')
        </div>

        <div id="orderProcessing" style="display: none">
            @include('/main_content.processing_finish.finish')
        </div>

        <script>
            toggleOrderContent(1);
        </script>
    </div>
@endsection

<script>
    var element;

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
</script>
