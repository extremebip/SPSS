@extends('layouts.admin-layout')
@section('title', 'SPSS Admin - Verify Payment')
@section('page', 'Verify Payment')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.col {
    /*color: #052b78;*/
}
/*.row > .col {
    font-size: 1.5em;
}*/
.row-group {
    background-color: #44669c;
    border: 2px solid #4e5663;
    padding: 10px;
    border-radius: 5em / 5em;
    margin: 2em 0;
}
.row-group div {
    font-size: 1.5em;
    color: #fff;
}
.card-header {
    border-bottom: double #b4caed 0.2em;
    border-top: double #b4caed 0.2em;
}
.info {
    text-decoration: underline;
    color: #161f2e;
}
.frame-border {
    background-color: #5d759c;
    border-radius: 10px;
    padding: 3em 0;
    border: solid #fff;
}
.frame-border .col {
    text-decoration: underline;
}
#text-verified {
    text-shadow: -0.05em 0 black, 0 0.05em black, 0.05em 0 black, 0 -0.05em black;
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card text-center">
                <h1 class="card-header bg-primary">
                    <b>VERIFY PAYMENT</b>
                </h1>
                <div class="card-body bg-info">
                    <div class="row">
                        <a class="col-md-6 col-12 mx-auto frame-border" href="{{route('transferPhoto', $payment->BuktiTransfer)}}">
                            <div class="row">
                                <h2 class="col text-center text-warning">
                                    Foto Bukti Pembayaran
                                </h2>
                            </div>
                            <img class="col-md-8 col-12 mx-auto img-fluid" src="{{route('transferPhoto', $payment->BuktiTransfer)}}" alt="">
                        </a>
                    </div>
                    <div class="col-md-6 col-10 mx-auto row text-center row-group">
                        <div class="col-12 info">
                            NAMA PENGIRIM
                        </div>
                        <div class="col-12 text-warning">
                            {{ $payment->NamaPengirim }}
                        </div>
                    </div>
                    <div class="col-md-6 col-10 mx-auto row text-center row-group">
                        <div class="col-12 info">
                            NAMA BANK
                        </div>
                        <div class="col-12 text-warning">
                            {{ $payment->NamaBank }}
                        </div>
                    </div>
                    <div class="col-md-6 col-10 mx-auto row text-center row-group">
                        <div class="col-12 info">
                            WAKTU TRANSFER
                        </div>
                        <div class="col-12 text-warning">
                            {{ $payment->WaktuSubmitTransfer }}
                        </div>
                    </div>
                    <div class="col-md-6 col-10 mx-auto row text-center">
                        @if($payment->admin_id)
                        <div class="mx-auto text-center text-success">
                            <h5><b id="text-verified">
                                Payment has been verified by {{ App\Admin::find($payment->admin_id)->NamaLengkap }}
                            </b></h5>
                        </div>
                        @else
                        <div class="mx-auto text-center">
                            <form method="POST" style="margin-top: 1em;">
                                {{ csrf_field() }}
                                <button class="btn btn-light">
                                    VERIFY PAYMENT
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection