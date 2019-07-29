@extends('layouts.userLayout')

@section('style')
    <link rel="stylesheet" href="{{asset('css/Talkshow.css')}}">
@endsection

@section('userContent')
<div class="section">
    <div class="section-information">
        <div>
            <img class="header-img" src="{{asset('storage/Assets/competition-talkshow.png')}}">
        </div>
        <div class="header-text">
            <h1 class="header-title">SPSS <br>TALKSHOW</h1>
            <h4>Countdown the event!</h4>
            <h1 class="header-countdown">00:00:00:00</h1>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-information">
        <div class="ts-content">
            <h1 class="ts-left-content">OUR SPEAKER</h1>
            <img class="ts-img ts-left-content" src="{{asset('storage/Assets/our-speaker.jpg')}}">
            <h5>nama jabatan ditempatnya</h5>
        </div>
        <div class="ts-right-content">
            <h3 class="ts-right-text">mempelajari hal yang sedang <br>hangat diperbincangkan <br>saat ini yaitu data. <br>Talkshow ini bertujuan untuk <br>meningkatkan pengetahuan <br>peserta tentang data science. <br>Menarik sekali bukan? <br>Ayo daftarkan diri kamu!</h3>
            <a class="btn-reg" href="">Register</a>
        </div>
    </div>
</div>

<div class="time-place">
    <h1>TIME AND PLACE</h1>
    <div class="box">
        <h3 class="time-place-font">Date    : Saturday, October 12th 2019 <br>Time    : 11:00 - 13:00 <br>Place   : Auditorium, Binus University Anggrek Campus <br>Speaker : TBA</h3>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            
        });
    </script>
@endsection