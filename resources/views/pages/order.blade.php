@extends('layout.master')

@section('banner')
    <div class="banner">
        <img src="{{ URL::to('img/restaurant_overview.png') }}" alt="shape">
        <h5>ORDER AS YOU WISH</h5>
    </div>
@endsection

@section('content')
    <div class="formWrapper container-fluid">
        <div class="signUpForm col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">

            {!! Form::open(['method'=>'post', 'action'=>'OrderController@order_items']) !!}

            {{ csrf_field() }}

            <fieldset>
                <legend>Delivering Information:</legend>
                <div class="form-group {{ $errors->has('firstName') ? 'has-error' : '' }} row">
                    {!! Form::label('firstName', 'First Name', ['class'=>'col-form-label col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('firstName', old('firstName'), ['class'=>'form-control', 'placeholder'=>'First Name']) !!}
                        @if ($errors->has('firstName'))
                            <span class="help-block"><strong>{{ $errors->first('firstName') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('lastName') ? 'has-error' : '' }} row">
                    {!! Form::label('lastName', 'Last Name', ['class'=>'col-form-label col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('lastName', old('lastName'), ['class'=>'form-control', 'placeholder'=>'Last Name']) !!}
                        @if ($errors->has('lastName'))
                            <span class="help-block"><strong>{{ $errors->first('lastName') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} row">
                    {!! Form::label('email', 'Email', ['class'=>'col-form-label col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::email('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter email']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }} row">
                    {!! Form::label('address', 'Address', ['class'=>'col-form-label col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('address', old('address'), ['class'=>'form-control', 'placeholder'=>'Enter address']) !!}
                        @if ($errors->has('address'))
                            <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
                        @endif
                    </div>
                </div>
            </fieldset>
            <br>
            <div class="form-group row">
                <div class="col-sm-offset-3 col-sm-9">
                    {!! Form::submit('Order Now', ['class'=>'btnSignUpLogIn btn btn-success pull-right']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection