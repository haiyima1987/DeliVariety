<!--header, menu, logo, registration buttons, and main text and main menu button-->
<div class="headerMenu row">
    <div class="logoMenu col-md-4 col-sm-5 col-xs-12">
        <a href="{{ route('home') }}"><img src="{{ url('img/logo.png') }}" alt="logo"></a>
        <div class="btnMenu">
            <i class="fa fa-bars" aria-hidden="true"></i>
            <button class="labelMenu" type="button">MENU</button>
        </div>
    </div>
    <div class="btnRegister col-lg-3 col-md-4 col-sm-5 col-xs-5 pull-right">
        @if(Auth::check())
            <p>Welcome back! Now order with 10% discount!</p>
            <a href="{{ route('user.logout') }}">Log Out</a>
        @else
            <a href="{{ route('user.signup') }}">Sign Up</a>
            <a href="{{ route('user.login') }}">Log In</a>
        @endif
    </div>
</div>

<!--overlay for the menu-->
<div class="overlay">
    <div class="btnClose col-md-4 col-sm-4 col-xs-4">
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>
    <div class="navContainer col-md-4 col-sm-4 col-xs-4">
        <ul class="navbar">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('order.menu') }}">Food Menu</a></li>
            <li><a href="{{ route('reservation.reservation') }}">Reservation</a></li>
            {{--<li><a href="contact.php">Contact</a></li>--}}
        </ul>
        <div class="btnRegOverlay">
            @if(Auth::check())
                <a href="{{ route('user.logout') }}">Log Out</a>
            @else
                <a href="{{ route('user.signup') }}">Sign Up</a>
                <a href="{{ route('user.login') }}">Log In</a>
            @endif
        </div>
    </div>
</div>