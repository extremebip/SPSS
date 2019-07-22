@extends('layouts.userLayout')

@section('header')
<div class="header">
    <img src="{{asset('storage/Assets/Logo Spss.png')}}">
</div>
@endsection

@section('userContent')
<div class="steps">
	<div class="box box-passed">Registrasi</div>
	<div class="box">Round 1</div>
	<div class="box">Round 2</div>
	<div class="box">Grand Final</div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @yield('dashboardBody')
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="content">
    @yield('dashboardBody')
</div>
@endsection
