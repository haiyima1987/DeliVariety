@extends('layout.master')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/restaurant_overview.png') }}" alt="shape">
        <h5>RESERVE YOUR SPOT</h5>
    </div>
@endsection

@section('content')
    <div class="contentWrapper">
        <div id="reserveSuccess" class="content container-fluid">

            <div class="col-sm-8 col-xs-12">
                <div class="tableOverview">
                    <h3>Reserve Your Dinner Spot</h3>

                    <div class="tableInfo">
                        @include('ajax.availableTables')
                    </div>

                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="tableOverview">
                    <h3>Reservation Information</h3>
                    <div class="reserveInfo clearfix">

                        {!! Form::open(['id'=>'formReservation', 'method'=>'post', 'action'=>'ReservationController@reserve_spots']) !!}
                        {{ csrf_field() }}

                        <div class="form-group">
                            {!! Form::label('date', 'Reservation Date', ['class'=>'col-form-label']) !!}
                            {!! Form::date('date', null,
                            ['id' => 'datePicker', 'class'=>'form-control', 'placeholder'=>'Choose your date']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('timeSpan', 'Reservation Time', ['class'=>'col-form-label']) !!}
                            {!! Form::select('timeSpan', $time_spans, null,
                            ['id'=>'timePicker', 'class'=>'form-control', 'placeholder'=>'Reserve your dinner time']) !!}
                        </div>
                        <br>
                        @if(!Session::has('email'))
                            <div id="fNameError" class="form-group">
                                {!! Form::label('firstName', 'First Name', ['class'=>'col-form-label']) !!}
                                {!! Form::text('firstName', old('firstName'), ['id'=>'resFName',
                                'class'=>'form-control', 'placeholder'=>'First Name']) !!}
                                <span id="fNameErrorMsg" class="help-block"><strong></strong></span>
                            </div>
                            <div id="lNameError" class="form-group">
                                {!! Form::label('lastName', 'Last Name', ['class'=>'col-form-label']) !!}
                                {!! Form::text('lastName', old('lastName'), ['id'=>'resLName',
                                'class'=>'form-control', 'placeholder'=>'Last Name']) !!}
                                <span id="lNameErrorMsg" class="help-block"><strong></strong></span>
                            </div>
                            <div id="phoneError" class="form-group">
                                {!! Form::label('phone', 'Phone', ['class'=>'col-form-label']) !!}
                                {!! Form::text('phone', old('phone'), ['id'=>'resPhone',
                                'class'=>'form-control', 'placeholder'=>'Enter phone number']) !!}
                                <span id="phoneErrorMsg" class="help-block"><strong></strong></span>
                            </div>
                            <div id="emailError" class="form-group">
                                {!! Form::label('email', 'Email', ['class'=>'col-form-label']) !!}
                                {!! Form::email('email', old('email'), ['id'=>'resEmail',
                                'class'=>'form-control', 'placeholder'=>'Enter email']) !!}
                                <span id="emailErrorMsg" class="help-block"><strong></strong></span>
                            </div>
                        @endif

                        <p id="priceReservation" class="text-right">Total Price: € 0.00</p>
                        <div id="discountRate" hidden>{{ Session::has('email') ? 0.9 : 1 }}</div>
                        @if(Session::has('email'))
                            <p id="discountReservation" class="text-right"><strong>Discount Price: € 0.00</strong></p>
                        @endif

                        {{--<button type="button" class="btnSignUpLogIn btn btn-success">Reserve Now--}}
                        {{--</button>--}}
                        {!! Form::submit('Reserve Now', ['class'=>'btnSignUpLogIn btn btn-success pull-right']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('partials.errorBox')

@endsection

@section('script')

    <script type="text/javascript" src="{{ url('js/reservation.js') }}"></script>

@endsection