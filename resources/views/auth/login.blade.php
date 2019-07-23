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
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="body">
    <div class="content">
        <div class="content-text">
            <h4 class="content"><strong>Sign in</strong></h4>
            <br>
            {{ Form::open(['url' => 'login']) }}
                <div class="form-group border-bottom border-dark">
                    {{ Form::label('email', 'E-mail', ['class' => 'col-form-label px-2']) }}
                    {{ Form::email('email', '', ['class' => 'form-control border-0 '.($errors->has('email') ? 'is-invalid' : ''), 'value' => old('email'), 'required' => '', 'autofocus' => '', 'autocomplete' => 'email']) }}
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group border-bottom border-dark">
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
