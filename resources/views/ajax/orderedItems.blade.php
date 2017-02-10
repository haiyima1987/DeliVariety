@if(Session::has('order_list'))
    @foreach(Session::get('order_list')->items as $item)

        <div class="boxItem row">
            <div class="boxText">
                <p>{{ $item['qty'] }}</p>
            </div>
            <div class="boxImg col-xs-9 col-sm-9">
                <img src="{{ $item['item']->img_path }}" alt="{{ $item['item']['id'] }}">
            </div>
            <div class="btnItemChange col-xs-3 col-sm-3">
                <a class="btnPlus" id="{{ $item['item']['id'] }}" action="add">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                <a class="btnMinus" id="{{ $item['item']['id'] }}" action="minus">
                    <i class="fa fa-minus-circle" aria-hidden="true"></i></a>
            </div>
        </div>

    @endforeach
@endif

<script src="{{ url('js/orderList.js') }}"></script>