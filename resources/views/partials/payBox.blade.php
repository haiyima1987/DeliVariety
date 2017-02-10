<div class="payBox col-md-6 col-sm-8 col-xs-10">

    {!! Form::open(['method'=>'post', 'action'=>'OrderController@user_order_items', 'class'=>'orderOverview']) !!}

    @include('ajax.orderOverview')

    {!! Form::close() !!}

    <div class="payBoxClose col-md-2 col-sm-2 col-xs-2">
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>

</div>