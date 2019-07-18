@extends('layouts.userLayout')

@section('style')
    <style>
        .card-body{
            background-color: #f2f2f2;
        }
    </style>
@endsection

@section('userContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @yield('dashboardBody')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
