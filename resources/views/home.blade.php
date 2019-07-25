@extends('layouts.userLayout')

@section('style')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection

@section('userContent')
<div class="container">
    <div class="row">
        <div class="col order-2">
            <img class="img" src="{{ asset('storage/Assets/home.png') }}" alt="">
        </div>
        <div class="col d-flex flex-column justify-content-start align-items-start title order-1">
            <h1 class="title-text"><strong>Achieve</strong></h1> 
            <h1 class="title-text"><strong>Better Life</strong></h1>
            <h1 class="title-text"><strong>with the</strong></h1>
            <h1 class="title-text"><strong>Insight of</strong></h1>
            <h1 class="title-text"><strong>Data</strong></h1>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <img class="img-vid" src="{{asset('storage/Assets/favicon dan icon.png')}}">
        </div>
        <div class="col d-flex flex-column justify-content-center align-items-end">
            <h1 class="desc-title"><strong>Statistical</strong></h1>
            <h1 class="desc-title"><strong>Project for</strong></h1>
            <h1 class="desc-title"><strong>Smart Student</strong></h1>
            <h1 class="desc-title"><strong>2019</strong></h1>
            <h5 class="desc-text">Statistical Project for Smart Student atau SPSS adalah acara terbesar dan pertama yang diadakan oleh HIMSTAT Binus University berisikan lomba statistika dan talkshow</h5>
            <a href="#" class="btn upload-btn submit-btn">Read More</a>
        </div>
    </div>

    <h1 class="mt-5"><strong>Competition</strong></h1>
    <div class="row">
        <div class="competition container rounded">
            <div class="row competition-body">
                <div class="col-sm-4 competition-item">
                    <div class="card text-center">
                        <img src="{{asset('storage/Assets/favicon dan icon.png')}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <div class="card-title"><h3><strong>Round 1</strong></h3></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 competition-item">
                    <div class="card text-center">
                        <img src="{{asset('storage/Assets/favicon dan icon.png')}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <div class="card-title"><h3><strong>Round 1</strong></h3></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 competition-item">
                    <div class="card text-center">
                        <img src="{{asset('storage/Assets/favicon dan icon.png')}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <div class="card-title"><h3><strong>Round 1</strong></h3></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="/register" class="upload-btn submit-btn" id="comp-regis">Register</a>
    </div>
    
    <br>
    <br>

    <h1 class="mt5"><strong>Talkshow</strong></h1>
    <div class="row talkshow rounded">
        <div class="col-lg-8 d-flex flex-column justify-content-center">
            <h3>Date    : Saturday, October 12th, 2019</h3>
            <h3>Time    : 11:00 - 13:00</h3>
            <h3>Place   : Auditorium, Binus University Anggrek Campus</h3>
            <h3>Speaker : TBA</h3>
            <br>
            <a href="#" class="upload-btn submit-btn" id="talkshow-regis">Register</a>
        </div>
        <div class="col-lg-4 talkshow-itm-img">
            <img src="{{asset('storage/Assets/favicon dan icon.png')}}" class="talkshow-img" alt="">
        </div>
    </div>
</div>
@endsection