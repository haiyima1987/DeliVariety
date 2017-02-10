@if($info)
    <div class="alert alert-success col-md-offset-3 col-md-6 confirm">
        <p>Thanks for your support!</p>
        <p>Reservation succeeded!</p>
        <p>Below is your reservation details:</p>
        <p>Date: <strong>{{ $info['date'] }}</strong></p>
        <p>Time: <strong>{{ $info['time_span'] }}</strong></p>
        <p>Table number:
            <strong>
                @foreach($info['spots'] as $spot)
                    @if($loop->last)
                        Table {{ $spot }}
                    @else
                        Table {{ $spot }},
                    @endif
                @endforeach
            </strong>
        </p>
        <p>Thank you so much for favoring DeliVariety Food & Catering!</p>
        <p>Now you can continue viewing our menu</p>
        <br>
        <div class="btnGreen">
            <a href="{{ route('menu') }}">Our Menu</a>
        </div>
    </div>
@endif