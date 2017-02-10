<!doctype html>
<html lang="en">

<head>
    <title>DeliVariety</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/5a79a0d633.js"></script>
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ url('js/events.js') }}"></script>
</head>

<body>

@include('partials.header')
@yield('banner')

@yield('content')

@include('partials.footer')

{{--<div class="orderListLogo">--}}
{{--<i class="fa fa-shopping-bag" aria-hidden="true"></i>--}}
{{--</div>--}}
{{--<div class="orderList col-xs-2 col-md-1">--}}
{{--@include('partials.orderList')--}}
{{--</div>--}}

@include('partials.orderList')

{{--<div class="payBox col-md-6 col-sm-8 col-xs-10">--}}
@include('partials.payBox')
{{--</div>--}}

<script type="text/javascript" src="{{ url('js/main.js') }}"></script>
<script type="text/javascript" src="{{ url('js/payBox.js') }}"></script>
@yield('script')

</body>
</html>