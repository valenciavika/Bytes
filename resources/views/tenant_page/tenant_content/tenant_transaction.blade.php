@extends('/tenant_page.tenant_template')

@section('content')

<div class="isisi">
    <div class="admin-transaction">
    @php
        $menu = '';
        $cart_not_empty = true;
        if ($transactions->count() == 0) {
            $cart_not_empty = false;
        }
    @endphp
        <p class="transaction-status"><strong>Ongoing Transaction</strong></p>
        <div class="order-content">
            @if ($cart_not_empty)
                @foreach ($transactions as $transaction)
                    @foreach ($menus as $m)
                        @php
                            if ($m->id == $transaction->menu_id) {
                                $menu = $m;
                                break;
                            }
                        @endphp
                    @endforeach
                <div class="processing-content">
                    <div class="namatenant">
                        <p class="text-quantity"><strong>{{ $transaction->quantity }}x</strong></p>
                        <p class="text-namatenant"><strong>{{ $menu->name }}</strong></p>
                    </div>
                    <div class="Partorder">
                        <div class="notes">
                            <p class="item_notes">Notes:</p>
                            <p >{{ $transaction->additional_description }}</p>
                        </div>
                        <div class="statusinfo">
                            <p id="text2{{$transaction->id}}" class="proses-txt2"><strong>Send Notification</strong></p>
                            <i id="iconbell" class="fa-regular fa-bell" onmouseover="showText('text2{{$transaction->id}}')" onmouseout="hideText('text2{{$transaction->id}}')" onclick="sendNotif({{$transaction->id}})"></i>
                        </div>
                    </div>

                </div>
                @endforeach
            @else
                <p class="no_result">No order found.</p>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="{{asset('css/tenanttransaction.css')}}" rel="stylesheet" />
@endpush

<script>
    function showText(tag_id) {
        document.getElementById(tag_id).style.display = 'block';
    }
    
    function hideText(tag_id) {
        document.getElementById(tag_id).style.display = 'none';
    }
    
    function sendNotif(order_id) {
        var url = '/{{$id}}/tenant/finish_order/' + encodeURIComponent(order_id);
        
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
        console.log('tes');

        location.reload();
    }
    
</script>