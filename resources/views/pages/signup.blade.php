@extends('layout.master')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/restaurant_overview.png') }}" alt="shape">
        <h5>BE PART OF US</h5>
    </div>
@endsection

@section('content')
    <div class="formWrapper container-fluid">
        <div class="signUpForm col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">

            {!! Form::open(['method'=>'post', 'action'=>'UserController@signUpUser']) !!}

            {{ csrf_field() }}

            <fieldset>
                <legend>Personal Information:</legend>
                <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }} row">
                    {!! Form::label('username', 'Username', ['class'=>'col-form-label col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('username', old('username'), ['class'=>'form-control', 'placeholder'=>'Enter username']) !!}
                        @if ($errors->has('username'))
                            <span class="help-block"><strong>{{ $errors->first('username') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }} row">
                    {!! Form::label('password', 'Password', ['class'=>'col-form-label col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter password']) !!}
                        @if ($errors->has('password'))
                            <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }} row">
                    {!! Form::label('password_confirmation', 'Confirm', ['class'=>'col-form-label col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Confirm password']) !!}
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
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
            </fieldset>
            <br>
            <fieldset>
                <legend>Contact Information:</legend>
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
                <div class="form-group {{ $errors->has('bday') ? 'has-error' : '' }} row">
                    {!! Form::label('bday', 'Birthday', ['class'=>'col-form-label col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::date('bday', \Carbon\Carbon::now(), ['class'=>'form-control', 'placeholder'=>'Birthday']) !!}
                        @if ($errors->has('bday'))
                            <span class="help-block"><strong>{{ $errors->first('bday') }}</strong></span>
                        @endif
                    </div>
                </div>
                {{--<div class="form-group row">--}}
                {{--{!! Form::label('gender', 'Gender', ['class'=>'col-form-label col-sm-3']) !!}--}}
                {{--<div class="col-sm-9">--}}
                {{--{!! Form::label('gender', 'Male', ['class'=>'radio-inline']) !!}--}}
                {{--{!! Form::radio('gender', 'M', true) !!}--}}
                {{--{!! Form::label('gender', 'Female', ['class'=>'radio-inline']) !!}--}}
                {{--{!! Form::radio('gender', 'F') !!}--}}
                {{--</div>--}}
                {{--</div>--}}
                <div class="form-check row">
                    {!! Form::label('gender', 'Gender', ['class'=>'col-form-label col-sm-3']) !!}
                    <div class="col-sm-9">
                        <label class="radio-inline"><input class="form-check-input" type="radio" name="gender"
                                                           value="M">Male</label>
                        <label class="radio-inline"><input class="form-check-input" type="radio" name="gender"
                                                           value="F">Female</label>
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
                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }} row">
                    {!! Form::label('phone', 'Phone', ['class'=>'col-form-label col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('phone', old('phone'), ['class'=>'form-control', 'placeholder'=>'Enter phone number']) !!}
                        @if ($errors->has('phone'))
                            <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
                        @endif
                    </div>
                </div>
            </fieldset>
            <br>
            <div class="form-group row">
                <div class="col-sm-offset-3 col-sm-9">
                    {!! Form::submit('Sign Up', ['class'=>'btnSignUpLogIn btn btn-success pull-right']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection