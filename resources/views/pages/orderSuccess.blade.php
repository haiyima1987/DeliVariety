@extends('layout.master')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/restaurant_overview.png') }}" alt="shape">
        <h5>THANKS FOR SUPPORT</h5>
    </div>
@endsection

@section('content')
    <div class="formWrapper container-fluid">

        @if($order_id)
            <div class="alert alert-success col-md-offset-3 col-md-6 confirm">
                <p><strong>SUCCESSFUL ORDER!</strong></p>
                <p>Your order ID is: <strong>{{ $order_id }}</strong></p>
                <p>Ordered food are:</p>
                @foreach($ordered_items as $item)
                    <p><strong>{{ $item['item']['item_name'] }} x {{ $item['qty'] }}</strong></p>
                @endforeach
                <p>We will be delivering your food to the address below:</p>
                <p><strong>{{ $address }}</strong></p>
                <p>Your food will arrive within <strong>2 hours</strong></p>
                <p>Delivariety also offers dinner reservation</p>
                <br>
                <div class="btnGreen">
                    <a href="{{ route('reservation.reservation') }}">Reservation</a>
                </div>
            </div>
        @endif

    </div>

@endsection