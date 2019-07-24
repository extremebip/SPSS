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
                <h4 class="content"><strong>Ubah Password</strong></h4>
                <br>
                {{ Form::open(['url' => '/password/change']) }}
                    <div class="form-group border-bottom border-dark input-field">
                        {{ Form::label('password', 'Password Baru', ['class' => 'col-form-label px-2']) }}
                        {{ Form::password('password', ['class' => 'form-control border-0 '.($errors->has('password') ? 'is-invalid' : ''), 'required' => '', 'autocomplete' => 'current-password']) }}
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
                    <div class="form-group justify-content-end">
                        {{ Form::submit('Submit', ['class' => 'btn btn-choose submit-btn']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection