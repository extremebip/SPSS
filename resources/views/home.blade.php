@extends('layouts.userLayout')

@section('style')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection

@section('userContent')
<div class="container">
    <div class="row d-flex flex-column-reverse">
        <div class="">
            <img class="img-fluid float-right" src="{{asset('storage/Assets/home.png')}}" alt="">
        </div>
        <div class="col title">
            <p class="title-text" id="top"><strong>Achieve</strong></p> 
            <p class="title-text"><strong>Better Life</strong></p>
            <p class="title-text"><strong>with the</strong></p>
            <p class="title-text"><strong>Insight of</strong></p>
            <p class="title-text"><strong>Data</strong></p>
        </div>
    </div>
    <div class="row mt-5 py-5 vid-container">
        <div class="col">
            <video class="video" controls style="display:none;">
                <source src="{{asset('storage/Assets/Teaser.mov')}}" type="video/mp4">
            </video>
            <img src="{{asset('storage/Assets/play_video.png')}}" alt="" class="btn-play" >
        </div>
        <div class="w-100" id="break"></div>
        <div class="col d-flex flex-column justify-content-center align-items-end desc-group">
            <p class="desc-title"><strong>Statistical</strong></p>
            <p class="desc-title"><strong>Project for</strong></p>
            <p class="desc-title"><strong>Smart Student</strong></p>
            <p class="desc-title"><strong>2019</strong></p>
            <h5 class="desc-text">Statistical Project for Smart Student atau SPSS adalah acara terbesar dan pertama yang diadakan oleh HIMSTAT Binus University berisikan lomba statistika dan talkshow</h5>
            <a href="/about" class="btn upload-btn submit-btn">Read More</a>
        </div>
    </div>

    <h1 class="mt-5"><strong>Competition</strong></h1>
    <div class="row">
        <div class="competition container rounded">
            <div class="row competition-body">
                <div class="col-sm-4 competition-item">
                    <div class="card text-center">
                        <img src="{{asset('storage/Assets/Round_1.png')}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <div class="card-title"><h3><strong>Round 1</strong></h3></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 competition-item">
                    <div class="card text-center">
                        <img src="{{asset('storage/Assets/Round_2.png')}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <div class="card-title"><h3><strong>Round 2</strong></h3></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 competition-item">
                    <div class="card text-center">
                        <img src="{{asset('storage/Assets/Grand_Final.png')}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <div class="card-title"><h3><strong>Grand Final</strong></h3></div>
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
    <div class="col-lg-4 talkshow-itm-img">
        <img src="{{asset('storage/Assets/preview_pembicara.jpg')}}" class="talkshow-img" alt="">
    </div>
        <div class="col-lg-8 d-flex flex-column justify-content-center ">
            <h3>Date    : {{-- Friday, November 29th, 2019 --}}TBA</h3>
            <h3>Time    : {{-- 11:00 - 13:00 --}}TBA</h3>
            <h3>Place   : Auditorium, Binus University Anggrek Campus</h3>
            <h3>Speaker : {{-- --}}TBA</h3>
            <br>
            <a class="upload-btn submit-btn" id="talkshow-regis">TBA</a>
        </div>
        
    </div>
</div>
@endsection

@section('script')
    <script>
    $(document).ready(function () {
        $('.btn-play').click(function () {
            $('.btn-play').hide();
            $('.video').show();
            $('.video').get(0).play();
        })
    });
    </script>
@endsection