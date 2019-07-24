@extends('layouts.userLayout')

@section('style')
    <style>
        p {
            margin-bottom: 0px;
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
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            <h5><strong>Hello!</strong></h5>
            <p>Untuk mendaftar SPSS Competition 2019,</p>
            <p>Jangan lupa untuk memverifikasi e-mail kamu terlebih dahulu.</p>
            <br>
            <p>Dengan mengecek e-mail kamu.</p>
            <p>Jika ada pertanyaan, kamu dapat menghubungi narahubung: 08xxxxx (Anthony)</p>
            <a href="{{ route('verification.resend') }}" class="button">Klik ini untuk mengirim e-mail verifikasi kembali</a>
        </div>
    </div>
</div>
@endsection
