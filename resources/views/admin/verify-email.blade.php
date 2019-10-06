@extends('layouts.admin-layout')
@section('title', 'SPSS Admin - Verify Email')
@section('page', 'Verify Email')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.row {
	padding: 1em 0;
	font-size: 1.1em;
}
.title-row {
	margin-top: 2em;
	padding: 0.5em 0;
	border: double black 0.2em;
}
.title-header:hover {
    cursor: default;
    background: linear-gradient(90deg, #000, #fff, #000);
    background-repeat: no-repeat;
    background-size: 80%;
    animation: animate 3s linear infinite;
    -webkit-background-clip: text;
    -webkit-text-fill-color: rgba(255, 255, 255, 0);
}
@keyframes animate {
    0% {
        background-position: -500%;
    }
    100% {
        background-position: 500%;
    }
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        	<div class="card">
	            <div class="card-header text-center">
	            	<h1 class="title-header">
	            		VERIFY EMAIL
	            	</h1>
	            </div>
	            <div class="card-body">
	            	<info-row info="Email" val="{{$user->email}}"></info-row>
	            	<info-row info="Email Verified At" val="{{$user->email_verified_at}}"></info-row>
	            	<info-row info="Asal Universitas" val="{{$user->AsalUniversitas}}"></info-row>
	            </div>
	        </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/admin/verify-email.js')}}" defer></script>

@endsection