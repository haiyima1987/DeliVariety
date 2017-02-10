@extends('layout.master')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/restaurant_overview.png') }}" alt="shape">
        <h5>ORDER AS YOU WISH</h5>
    </div>
@endsection

@section('content')
    <!--menu category and items inside each category-->
    <div class="contentWrapper">
        <div class="content">

            @foreach($categories as $category)
                <div class="menuCategory row {{ $category->id % 2 == 0 ? 'darkMenuBar' : '' }}">
                    <h3>{{ $category->category_name }}</h3>

                    @foreach($items[$category->id]->chunk(4) as $item_chunk)
                        {{--this is used for testing relationships between tables--}}
                        {{--<p>{{ $item->Category->category_name }}</p>--}}
                        <div class="row">
                            @foreach($item_chunk as $item)
                                <div class="menuItem col-md-3 col-sm-3 col-xs-6">
                                    <img src="{{ $item->img_path }}" alt="{{ $item->id }}">
                                    <div class="btnItemPrice">€ {{ number_format($item->price, 2) }}</div>
                                    {{--<a href="{{ route('order.add', ['id' => $item->id]) }}" id="{{ $item->id }}" action="add" class="btnItemOrder">ORDER</a>--}}
                                    <a id="{{ $item->id }}" action="add" class="btnItemOrder">ORDER</a>
                                    <p>{{ $item->item_name }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                </div>
            @endforeach

        </div>
    </div>
@endsection

