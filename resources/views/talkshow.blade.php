@extends('layouts.userLayout')

@section('style')
    <link rel="stylesheet" href="{{asset('css/Talkshow.css')}}">
@endsection

@section('userContent')
<div class="container">
    <div class="row d-flex flex-column">
        <div>
            <img src="{{asset('storage/Assets/competition-talkshow.png')}}" class="img-fluid">
        </div>
        <div class="col title d-flex justify-content-end align-items-end flex-column">
            <p class="title-text">SPSS</p>
            <p class="title-text">TALKSHOW</p>
            <h4>Countdown the event</h4>
            <h1><strong id="time">00:00:00:00</strong></h1>
        </div>
    </div>

    <div class="row pembicara d-flex flex-row">
        <div class="col">
            <h1 class="ts-left-content speaker">OUR SPEAKER</h1>
            <img class="ts-img ts-left-content" src="{{asset('storage/Assets/our-speaker.jpg')}}">
            <h5 class="jabatan">Nama (Jabatan di Tempatnya)</h5>
        </div>
        <div class="w-100" id="break"></div>
        <div class="col text d-flex justify-content-start align-items-end flex-column">
            <h3 class="ts-right-text">Mempelajari hal yang sedang <br>hangat diperbincangkan <br>saat ini yaitu data. <br>Talkshow ini bertujuan untuk <br>meningkatkan pengetahuan <br>peserta tentang data science. <br>Menarik sekali bukan? <br>Ayo daftarkan diri kamu!</h3>
            <a class="btn-reg" href="">Register</a>
        </div>
    </div>

    <div class="row mt-5">
        <h1 class="col-lg-12">TIME AND PLACE</h1>
        <div class="box">
            <h3 class="time-place-font">Date    : Saturday, October 12th 2019 <br>Time    : 11:00 - 13:00 <br>Place   : Auditorium, Binus University Anggrek Campus <br>Speaker : TBA</h3>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            
        });
    </script>
@endsection