{{--<div class="orderList col-xs-2 col-md-1">--}}
{{--@if(Session::has('order_list'))--}}
{{--@foreach(Session::get('order_list')->items as $item)--}}
{{--<div class="boxItem row">--}}
{{--<div class="boxText">--}}
{{--<p>{{ $item['qty'] }}</p>--}}
{{--</div>--}}
{{--<div class="boxImg col-xs-9 col-sm-9">--}}
{{--<img src="img/{{ $item['item']['img_path'] }}" alt="{{ $item['item']['id'] }}">--}}
{{--</div>--}}
{{--<div class="btnItemChange col-xs-3 col-sm-3">--}}
{{--<a class="btnPlus" id="{{ $item['item']['id'] }}" action="add">--}}
{{--<i class="fa fa-plus-circle" aria-hidden="true"></i></a>--}}
{{--<a class="btnMinus" id="{{ $item['item']['id'] }}" action="minus">--}}
{{--<i class="fa fa-minus-circle" aria-hidden="true"></i></a>--}}
{{--</div>--}}
{{--</div>--}}

{{--@endforeach--}}

{{--@if(Session::has('order_list') && count(Session::get('order_list')->items) > 0)--}}
{{--<div id="btnList" class="btnGreen">--}}
{{--<a class="btnGreen">OK</a>--}}
{{--</div>--}}
{{--@endif--}}
{{--@endif--}}
{{--</div>--}}

{{--<script src="js/orderList.js"></script>--}}

<div class="orderListLogo">
    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
</div>

<div class="orderList col-xs-2 col-md-1">
    <div class="orderedItems">
        @include('ajax.orderedItems')
    </div>

    <div id="btnList" class="btnGreen">
        <a class="btnGreen">Checkout</a>
    </div>
</div>

{{--<script src="js/orderList.js"></script>--}}