@extends('layouts.admin-layout')
@section('title', 'SPSS Admin - Home')
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
        display: inline-block;
        width: 1em;
        height: 1em;
        border: solid #000 0.1em;
    }
    .pagination {
        display: flex;
        justify-content: center;
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
                            @elseif($notif->description == 1)
                            Pelengkapan Detail Peserta
                            @elseif($notif->description == 2)
                            Verifikasi Email
                            @endif
                        </b>
                        <a href="{{ route($notif->description == 0 ? 'verify-payment' : ($notif->description == 1 ? 'verify-detail' : 'verify-email'), ['user' => $notif->id]) }}" class="verify-button"> <i class="fa fa-toggle-right"></i>  </a>
                    </h4>
                     <hr>
                     <p class="card-text">
                        {{ $notif->NamaLengkap }}
                        @if($notif->description == 0)
                            telah melakukan pembayaran lomba !
                        @elseif($notif->description == 1)
                            telah melengkapi detail peserta lomba !
                        @elseif($notif->description == 2)
                            telah menyelesaikan verifikasi email !
                        @endif
                    </p>
                </div>
                <div class="card-footer text-muted">
                    {{ $notif->activity_date }}
                </div>
            </div>
            @endforeach
            <div class="row" style="margin-top: 3em;display: block">
                <span class="color-box bg-success"></span>
                <span><b> = Verified &nbsp;</b></span>
                <span class="color-box bg-danger"></span>
                <span><b> = Not Verified &nbsp;</b></span>
            </div>
            <div class="row text-center" style="margin-top: 3em; display: block;">
                {{ $notifications->links() }}
            </div>
        </div>
    </div>
</div>
@endsection