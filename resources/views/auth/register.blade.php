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
        <h4 class="col-12"><strong>Register</strong></h4>
        {{ Form::open(['url' => 'register', 'class' => 'col-12 mt-3']) }}
            <div class="form-group border-bottom border-dark input-field">
                {{ Form::label('NamaLengkap', 'Nama Lengkap', ['class' => 'col-form-label px-2']) }}
                {{ Form::text('NamaLengkap', '', ['class' => 'form-control border-0 '.($errors->has('NamaLengkap') ? 'is-invalid' : ''), 'value' => old('NamaLengkap'), 'required' => '', 'autofocus' => '', 'autocomplete' => 'NamaLengkap']) }}
                @error('NamaLengkap')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
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
                {{ Form::password('password', ['class' => 'form-control border-0 '.($errors->has('password') ? 'is-invalid' : ''), 'required' => '', 'autocomplete' => 'new-password']) }}
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group border-bottom border-dark input-field">
                {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-form-label px-2']) }}
                {{ Form::password('password_confirmation', ['class' => 'form-control border-0', 'required' => '', 'autocomplete' => 'new-password']) }}
            </div>
            <div class="form-group row justify-content-between">
                <div class="col-auto">
                    <p>Have an Account? <a href="/login" class="btn-link">Sign in</a></p>
                </div>
                <div class="col-auto">
                    {{ Form::submit('Submit', ['class' => 'btn btn-choose submit-btn']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
