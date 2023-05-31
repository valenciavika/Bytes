@extends('/main_template')

@section('content')
    <div class="AllOrder">
        <p class="transactionstatus"><strong>Transaction Status</strong></p>

        <div class="allpart">
            <div class="partprocessing" onclick="processing()">
                <p id="textorder">Processing</p>
            </div>
            <div class="partfinished" onclick="finish()">
                <p id="textorder">Finished</p>
            </div>
        </div>

        @if ($temp_variable == 1)
            @dump(1)
            @include('/main_content.processing_finish.processing')
        @elseif ($temp_variable == 2)
            @dump(2)
            @include('/main_content.processing_finish.finish')
        @endif

    </div>
@endsection

<script>

    function finish() {
      {{ $temp_variable = 2 }}
    }

    function processing() {
      {{ $temp_variable = 1 }}
    }
</script>
