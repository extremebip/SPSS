@extends('layouts.admin-layout')
@section('title', 'SPSS Admin - HOME')
@section('page', 'Hello, '.Auth::user()->NamaLengkap)
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .verify-button {
        position: absolute;
        right: 1em;
        color: green;
    }
    .title-shadow {
        text-shadow: -2px 0 #000, 0 2px #000, 2px 0 #000, 0 -2px #000;
        font-size: 1.3em;
    }
    .color-box {
        width: 1em;
        height: 1em;
        border: solid #000 0.1em;
    }
    .float {
        float: left;
    }
</style>
@endsection
@section('content')
<div class="container">
        <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="text-center py-3 text-warning">
                <b class="title-shadow">NOTIFICATION</b>
            </h1>
            @foreach($notifications as $notif)
            <div class="card bg-light border {{ $notif->admin_id ? 'border-success' : 'border-danger' }}" style="margin: 1em 0;">
                <div class="card-body">
                     <h4 class="card-title text-info">
                        <b>
                            @if($notif->description == 0)
                            Pembayaran Lomba
                            @else($notif->description == 1)
                            Verifikasi Email
                            @endif
                        </b>
                        <a href="{{ route($notif->description == 0 ? 'verify-payment' : 'verify-email', ['user' => $notif->id]) }}" class="verify-button"> <i class="fa fa-toggle-right"></i>  </a>
                    </h4>
                     <hr>
                     <p class="card-text">
                        {{ $notif->NamaLengkap }}
                        @if($notif->description == 0)
                            telah melakukan pembayaran lomba!
                        @elseif($notif->description == 1)
                            telah menyelesaikan verifikasi email!
                        @endif
                    </p>
                </div>
                <div class="card-footer text-muted">
                    {{ $notif->activity_date }}
                </div>
            </div>
            @endforeach
            <div style="margin-top: 3em;">
                <div class="float color-box bg-success"></div>
                <div class="float"><b>&nbsp; = Verified &nbsp;</b></div>
                <div class="float color-box bg-danger"></div>
                <div class="float"><b>&nbsp; = Not Verified &nbsp;</b></div>
            </div>
        </div>
    </div>
</div>
@endsection
