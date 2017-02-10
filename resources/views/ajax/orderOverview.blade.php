@if(Session::has('order_list'))

    {{ csrf_field() }}

    <table class="table table-striped">
        <thead>
        <tr>
            <th class="text-left">#</th>
            <th class="text-right">Item</th>
            <th class="text-right">Quantity</th>
            <th class="text-right">Price</th>
            <th class="text-right">Subtotal</th>
        </tr>
        </thead>
        <tbody>

        @foreach(Session::get('order_list')->items as $item)
            <tr>
                <th>{{ $loop->index + 1 }}</th>
                <td class="imgPayBox"><img class="img-rounded" src="{{ $item['item']->img_path }}" alt=""></td>
                {{--<td><img class="img-responsive" src="{{ $item['item']->img_path }}" alt=""></td>--}}
                <td>{{ $item['qty'] }}</td>
                <td>€ {{ number_format($item['item']['price'], 2) }}</td>
                <td>€ {{ number_format($item['subTotal'], 2) }}</td>
            </tr>
        @endforeach

        <tr>
            <td colspan="5">Total Price:
                € {{ count(Session::get('order_list')->items) > 0 ?
            number_format(Session::get('order_list')->total_price, 2) : 0 }}</td>
        </tr>
        @if(Auth::check())
            <tr>
                <td colspan="5"><strong>Discount Price:
                        € {{ count(Session::get('order_list')->items) > 0 ?
            number_format(Session::get('order_list')->total_price * 0.9, 2) : 0 }}</strong></td>
            </tr>
        @else
            <tr>
                <td colspan="5"><p class="text-right"><strong>Our signed-up users can have a 10% discount !!</strong>
                    </p></td>
            </tr>
        @endif

        </tbody>
    </table>
    @if(count(Session::get('order_list')->items) > 0)
        @if(Auth::check())
            {!! Form::submit('Order Now') !!}
            {{--<input type="submit" name="submit" value="Buy Now">--}}
        @else
            <a href="{{ route('order.shipping') }}" class="btn btn-default pull-right">Order Anyway</a>
            <a href="{{ route('user.signup') }}" class="btnSignUpLogIn btn btn-success pull-right">Sign Up</a>
        @endif
    @endif

@else
    <h4>You have not ordered anything yet</h4>
@endif