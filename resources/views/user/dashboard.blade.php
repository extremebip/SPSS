@extends('layouts.userLayout')

@section('header')
<div class="header">
    <img src="{{asset('storage/Assets/Logo_Spss.png')}}">
</div>
@endsection

@php
	$tahap1 = (in_array('Tahap1', $steps)) ? true : false;
	$tahap2 = (in_array('Tahap2', $steps)) ? true : false;
	$tahapFinal = (in_array('TahapFinal', $steps)) ? true : false;
@endphp

@section('userContent')
<div class="body">
	<div class="steps">
		<div class="box box-passed">Registrasi</div>
		<div class="box{{ ($tahap1) ? " box-passed" : "" }}">Round 1</div>
		<div class="box{{ ($tahap2) ? " box-passed" : "" }}">Round 2</div>
		<div class="box{{ ($tahapFinal) ? " box-passed" : "" }}">Grand Final</div>
	</div>
	<div class="content">
		@yield('dashboardBody')
	</div>
</div>
@endsection