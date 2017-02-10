@extends('layout.master')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/restaurant_overview.png') }}" alt="shape">
        <h5>WELCOME BACK</h5>
    </div>
@endsection

@section('content')
    <div class="formWrapper container-fluid">
        <div class="signUpForm col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">

            {!! Form::open(['method'=>'post', 'action'=>'UserController@logInUser']) !!}

            {{ csrf_field() }}

            <fieldset>
                <legend>Welcome Back!!</legend>
                <div class="form-group {{ $errors->has('login') ? 'has-error' : '' }} row">
                    {!! Form::label('login', 'Login', ['class'=>'col-form-label col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('login', old('login'), ['class'=>'form-control', 'placeholder'=>'User ID/Email address']) !!}
                        @if ($errors->has('login') && $errors->first('login'))
                            <span class="help-block"><strong>{{ $errors->first('login') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }} row">
                    {!! Form::label('password', 'Password', ['class'=>'col-form-label col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
                        @if ($errors->has('password') && $errors->first('password'))
                            <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember" value="1"> Remember Me</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <div class="col-sm-offset-3 col-sm-9">
                        {!! Form::submit('Log In', ['class'=>'btnSignUpLogIn btn btn-success pull-left']) !!}
                        <p class="text-left"><a class="btn btn-link" href="{{ route('password.requestForm') }}">Forgot
                                Your Password?</a></p>
                    </div>
                </div>
            </fieldset>

            {!! Form::close() !!}

        </div>
    </div>

@endsection