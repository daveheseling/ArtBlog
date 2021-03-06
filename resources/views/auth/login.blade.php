@extends('layout')

@section('title', '| Login')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {{ Form::open() }}

                <div class="form-group">

                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}

                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control']) }}

                <br>
                {{ Form::checkbox('remember')}} {{ Form::label('remember', 'Remember Me')}}
                <br>
                {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}
                    <p><a href="{{ url('password/reset') }}">Forgot My Password</a> </p>
                <br>
                    <p><a href="{{ route('register') }}">Register</a> </p>
                 <br>
                    <p><a href="{{ route('adminLogin') }}">Admin panel</a> </p>

            </div>
        </div>
    </div>


@endsection