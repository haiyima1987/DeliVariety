@extends('layout.master')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/restaurant_overview.png') }}" alt="shape">
        <h5>THANKS FOR SUPPORT</h5>
    </div>
@endsection

@section('content')
    <div class="formWrapper container-fluid">

        @if($info)
            <div class="alert alert-success col-md-offset-3 col-md-6 confirm">
                <p>You have registered as a member of DeliVariety</p>
                <p>Your user ID is: <strong>{{ $info['user_id'] }}</strong></p>
                <p>Your username is: <strong>{{ $info['username'] }}</strong></p>
                <p>Your password is: <strong>{{ $info['password'] }}</strong></p>
                <p>Thank you so much for favoring DeliVariety Food & Catering!</p>
                <p>Now you are logged in and you can</p>
                <br>
                <div class="btnGreen">
                    <a href="{{ route('order.menu') }}">Order with 10% discount</a>
                </div>
            </div>
        @endif

    </div>

@endsection