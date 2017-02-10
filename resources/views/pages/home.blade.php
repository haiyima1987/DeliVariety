@extends('layout.master')

@section('content')

    <div class="carouselContainer">
        <ul class="carousel">
            <li class="slide"><img class="shape" src="{{ url('img/background_full1.png') }}" alt="shape"></li>
            <li class="slide"><img class="shape" src="{{ url('img/background_full2.png') }}" alt="shape"></li>
            <li class="slide"><img class="shape" src="{{ url('img/background_full3.png') }}" alt="shape"></li>
            <li class="slide"><img class="shape" src="{{ url('img/background_full1.png') }}" alt="shape"></li>
        </ul>
        <div class="pageDotContainer">
            <ol class="pageDotGroup">
                <li id="dot1" class="pageDot active"></li>
                <li id="dot2" class="pageDot"></li>
                <li id="dot3" class="pageDot"></li>
            </ol>
        </div>
        <div class="carouselBtns">
            <div id="prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
            <div id="next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
            <div id="start"><i class="fa fa-play" aria-hidden="true"></i></div>
            <div id="pause"><i class="fa fa-pause" aria-hidden="true"></i></div>
        </div>
        <!--jumbotron-->
        <div class="mainText">
            <div class="row">
                <div class="introText col-md-7 col-sm-6 col-xs-6">
                    <h1>Welcome to DeliVariety</h1>
                    <h3>Delivery & Variety</h3>
                </div>
                <div id="btnOrder" class="btnGreen col-md-5 col-sm-6 col-xs-6">
                    <a href="{{ route('order.menu') }}">MENU & ONLINE ORDER</a>
                </div>
            </div>
        </div>
    </div>

    <!--view location button and text-->
    <div class="secondary">
        <h3>MORE CHOICES, MORE EFFICIENCY, AND LESS PRICE</h3><br>
        <p>We have a nice variety in our restaurant to meet your different needs</p>
        <p>Busy? No problem. We will deliver your order to you</p>
        <p>The food tastes great? Awesome! You are always welcomed to visit us</p>
        <p>Our registered customers always get a discount</p>
        <div id="btnLocation" class="btnGreen">
            <a href="{{ route('reservation.reservation') }}">VIEW OUR LOCATION</a>
        </div>
    </div>

    <!--3 pictures with buttons in the middle-->
    <div class="bigMenu">
        <div class="menuWrap row">
            <div class="bigMenuItem col-md-4 col-sm-4 col-xs-4">
                <a href="{{ route('order.menu') }}">
                    <img src="{{ url('img/3_block_one.png') }}" alt="one">
                    <div class="bigMenuText">
                        <h2>ORDER ONLINE</h2>
                    </div>
                </a>
            </div>
            <div class="bigMenuItem col-md-4 col-sm-4 col-xs-4">
                <a href="{{ route('order.menu') }}">
                    <img src="{{ url('img/3_block_two.png') }}" alt="two">
                    <div class="bigMenuText">
                        <h2>VIEW MENU</h2>
                    </div>
                </a>
            </div>
            <div class="bigMenuItem col-md-4 col-sm-4 col-xs-4">
                <a href="{{ route('reservation.reservation') }}">
                    <img src="{{ url('img/3_block_three.png') }}" alt="three">
                    <div class="bigMenuText">
                        <h2>RESERVATION</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script type="text/javascript" src="{{ url('js/carousel.js') }}"></script>

@endsection