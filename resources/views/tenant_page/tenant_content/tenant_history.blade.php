@extends('/tenant_page.tenant_template')

@section('content')
<div class="isisi">
    <div class="admin-transaction">
        <p class="transaction-status"><strong>Transaction History</strong></p>
        <div class="order-content">
            @if ($orders->count())
                @foreach ($orders as $order)
                    @foreach ($menus as $m)
                        @php
                            if ($m->id == $order->menu_id) {
                                $menu = $m;
                                break;
                            }
                        @endphp
                    @endforeach
                <div class="processing-content">
                    <div class="Partorder">
                        <div class="namatenant">
                            <p class="text-quantity"><strong>{{ $order->quantity }}x</strong></p>
                            <p class="text-namatenant"><strong>{{ $menu->name }}</strong></p>
                        </div>
                        <div class="notes">
                            <p class="item_notes">Notes:</p>
                            <p >{{ $order->additional_description }}</p>
                        </div>
                    </div>

                    <div id="finishedcontent2" class="finishedcontent2">
                        <div class="statuscomplete">
                            <p class="finishtxt"><strong>Completed</strong></p>
                        </div>
                        <div class="time">
                            <p>3 Mar 9:00</p>
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
    <link href="{{asset('css/tenanthistory.css')}}" rel="stylesheet" />
@endpush