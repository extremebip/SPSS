@extends('layouts.userLayout')

@section('style')
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
@endsection

@section('header')
<div class="header">
    <img src="{{asset('storage/Assets/Logo_Spss.png')}}">
</div>
@endsection

@section('userContent')
<div class="container content mx-auto">
    <div class="row">
        <h4 class="col-12"><strong>Sign In</strong></h4>
        {{ Form::open(['url' => 'login', 'class' => 'col-12 mt-3']) }}
            <div class="form-group border-bottom border-dark input-field">
                {{ Form::label('email', 'E-mail', ['class' => 'col-form-label px-2']) }}
                {{ Form::email('email', '', ['class' => 'form-control border-0 '.($errors->has('email') ? 'is-invalid' : ''), 'value' => old('email'), 'required' => '', 'autofocus' => '', 'autocomplete' => 'email']) }}
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group border-bottom border-dark input-field">
                {{ Form::label('password', 'Password', ['class' => 'col-form-label px-2']) }}
                {{ Form::password('password', ['class' => 'form-control border-0 '.($errors->has('password') ? 'is-invalid' : ''), 'required' => '', 'autocomplete' => 'current-password']) }}
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row justify-content-between">
                @if (Route::has('password.request'))
                    <div class="col-auto">
                        <a class="btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif

                <div class="col-auto sign-in">
                    {{ Form::submit('Sign in', ['class' => 'btn btn-choose submit-btn']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
