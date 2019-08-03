@extends('layouts.userLayout')

@section('header')
<div class="header">
    <img src="{{asset('storage/Assets/Logo_Spss.png')}}">
</div>
@endsection

@section('userContent')
<div class="body">
	<div class="steps">
		<div class="box box-passed">Registrasi</div>
		<div class="box">Round 1</div>
		<div class="box">Round 2</div>
		<div class="box">Grand Final</div>
	</div>
	<div class="content">
		@yield('dashboardBody')
	</div>
</div>
@endsection