@extends('layout')

@section('title', '| Admin Register')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="margin-top: 3vh">
            {{ Form::open() }}

            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}

            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email', null, ['class' => 'form-control']) }}

            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', ['class' => 'form-control']) }}

            {{ Form::label('password_confirmation', 'Confirm Password') }}
            {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

            <br>
            {{ Form::submit('Register', ['class' => 'btn btn-primary btn-block', 'style'=> 'margin-bottom: 3vh; margin-top: 1vh']) }}


            {{ Form::close() }}
        </div>
    </div>


@endsection