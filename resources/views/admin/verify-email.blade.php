@extends('layouts.admin-layout')
@section('title', 'SPSS Admin - HOME')
@section('page', 'Verify')
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
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        	<div class="card">
	            <div class="card-header text-center">
	            	<h1>
	            		<b>VERIFY EMAIL</b>
	            	</h1>
	            </div>
	            <div class="card-body">
	            	<info-row info="Email" val="{{$user->email}}"></info-row>
	            	<info-row info="Email Verified At" val="{{$user->email_verified_at}}"></info-row>
	            	<info-row info="Asal Universitas" val="{{$user->AsalUniversitas}}"></info-row>
	            	@php $i = 1; @endphp
	            	@foreach($user->detailPesertas as $member)
	            	<div class="row title-row">
	            		<div class="col text-center">
	            			<b><a href="{{ route('ktm', $member->id) }}" class="text-dark" target="_blank">
	            				Peserta {{ $i++ }}
	            			</a></b>
	            		</div>
	            	</div>
	            	<info-row info="Nama Lengkap" val="{{$member->NamaLengkap}}"></info-row>
	            	<info-row info="NIM" val="{{$member->NIM}}"></info-row>
	            	<info-row info="Jurusan" val="{{$member->Jurusan}}"></info-row>
	            	@endforeach
	            	<div class="row" style="margin-top: 3.5em;">
	            		@if($user->admin_id)
	            		<div class="col text-center text-success">
	            			Email has been verified by {{ App\Admin::find($user->admin_id)->NamaLengkap }}
	            		</div>
	            		@else
	            		<div class="col text-center">
	            			<a href="https://forlap.ristekdikti.go.id/mahasiswa" class="text-info" target="_blank">GO TO RISTEKDIKTI</a>
		            		<form method="POST" style="margin-top: 1em;">
		            			{{ csrf_field() }}
		            			<button class="btn btn-primary">VERIFY</button>
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
@section('script')
<script src="{{ asset('js/admin/verify-email.js')}}" defer></script>

@endsection
