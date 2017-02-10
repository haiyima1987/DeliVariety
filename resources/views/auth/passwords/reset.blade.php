@extends('layout.master')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/restaurant_overview.png') }}" alt="shape">
        <h5>DELIVARIETY</h5>
    </div>
@endsection

@section('content')
    <div class="formWrapper container-fluid">
        <div class="signUpForm col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">

            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['method'=>'post', 'action'=>'Auth\ResetPasswordController@reset']) !!}

            {!! Form::hidden('token', $token) !!}

            <fieldset>
                <legend>Reset Password:</legend>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} row">
                    {!! Form::label('email', 'Email', ['class'=>'col-form-label col-sm-12']) !!}
                    <div class="col-sm-12">
                        {!! Form::email('email', old($email), ['class'=>'form-control', 'placeholder'=>'Enter email']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }} row">
                    {!! Form::label('password', 'New Password', ['class'=>'col-form-label col-sm-12']) !!}
                    <div class="col-sm-12">
                        {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter password']) !!}
                        @if ($errors->has('password'))
                            <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }} row">
                    {!! Form::label('password_confirmation', 'Confirm New Password', ['class'=>'col-form-label col-sm-12']) !!}
                    <div class="col-sm-12">
                        {!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Confirm password']) !!}
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                        @endif
                    </div>
                </div>
            </fieldset>
            <br>
            <div class="form-group row">
                <div class="col-sm-offset-3 col-sm-9">
                    {!! Form::submit('Send Reset Link', ['class'=>'btnSignUpLogIn btn btn-success pull-right']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection