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
        <h4 class="col-12"><strong>Ubah Password</strong></h4>
        {{ Form::open(['url' => '/password/change', 'class' => 'col-12 mt-3']) }}
            <div class="form-group border-bottom border-dark input-field">
                {{ Form::label('old_password', 'Password Lama', ['class' => 'col-form-label px-2']) }}
                {{ Form::password('old_password', ['class' => 'form-control border-0 '.($errors->has('old_password') ? 'is-invalid' : ''), 'required' => '']) }}
                @error('old_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group border-bottom border-dark input-field">
                {{ Form::label('password', 'Password Baru', ['class' => 'col-form-label px-2']) }}
                {{ Form::password('password', ['class' => 'form-control border-0 '.($errors->has('password') ? 'is-invalid' : ''), 'required' => '']) }}
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group border-bottom border-dark input-field">
                {{ Form::label('password_confirmation', 'Ulangi Password', ['class' => 'col-form-label px-2']) }}
                {{ Form::password('password_confirmation', ['class' => 'form-control border-0', 'required' => '', 'autocomplete' => 'new-password']) }}
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-auto">
                    {{ Form::submit('Submit', ['class' => 'btn btn-choose submit-btn']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection