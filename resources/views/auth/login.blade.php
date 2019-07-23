@extends('layouts.userLayout')

@section('style')
    <style>
        .content{
            margin-top: 0px;
        }

        .content-text{
            background-color: white;
        }

        .form-control{
            background-color: #f2f2f2;
        }

        .form-control:focus{
            background-color: #f2f2f2;
        }
    </style>
@endsection

@section('header')
<div class="header">
    <img src="{{asset('storage/Assets/Logo Spss.png')}}">
</div>
@endsection

@section('userContent')
<div class="body">
    <div class="content">
        <div class="content-text">
            <h4 class="content"><strong>Sign in</strong></h4>
            <br>
            {{ Form::open(['url' => 'login']) }}
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
                <div class="form-group justify-content-end">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                    {{ Form::submit('Sign in', ['class' => 'btn btn-choose submit-btn']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
