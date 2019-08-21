@extends('layouts.userLayout')

@section('style')
<link rel="stylesheet" href="{{ asset('css/competition.css') }}">
@endsection

@section('userContent')
<div class="container">
    <div class="row d-flex flex-column">
        <div>
            <img class="img-fluid" src="{{asset('storage/Assets/competition-talkshow.png')}}" alt="">
        </div>
        <div class="col d-flex flex-column justify-content-end align-items-end title">
            <p class="title-text"><strong>SPSS</strong></p> 
            <p class="title-text"><strong>Competition</strong></p>
            <br> <br>
            <h3>Count</h3>
            <h1><strong id="time">00:00:00:00</strong></h1>
            <h3>to close the registration</h3>
        </div>
    </div>
    <div class="row mt-5 py-5">
        <div class="col d-flex flex-column justify-content-center align-items-end">
            <div class="rounded-circle d-flex flex-column align-items-center justify-content-center">
                <h2>Total Prize</h2>
                <h2><strong>IDR 22,000,000</strong></h2>
            </div>
        </div>
        <div class="col d-flex flex-column justify-content-center align-items-end title">
            <h5>Sebuah kompetisi yang menantang peserta</h5>
            <h5>untuk memecahkan suatu permasalahan</h5>
            <h5>yang terbagi menjadi 3 yaitu dimulai dari</h5>
            <h5>teori, coding, hingga presentasi.</h5>
            <h5>Mau mengasah ketiga kemampuanmu di atas?</h5>
            <h5>Ayo daftarkan dirimu</h5>
            <a href="http://bit.ly/panduan-spss" target="_blank" rel="noopener noreferrer" class="btn btn-choose submit-btn"><h5 class="button-text"><strong>Download Terms of Condition</strong></h5></a>
            <a href="/register" class="btn submit-btn register-btn"><h5 class="button-text"><strong>Register</strong></h5></a>
        </div>
    </div>
    <div class="row">
        <h1><strong>Timeline</strong></h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <ul class="timeline">
                <li>
                    <div class="timeline-item">
                        <h4><strong>Pendaftaran</strong></h4>
                        <p>5 Agustus 2019</p>
                    </div>
                </li>
                <li>
                    <div class="timeline-item">
                        <h4><strong>Penutupan Pendaftaran</strong></h4>
                        <p>20 September 2019</p>
                    </div>
                </li>
                <li>
                    <div class="timeline-item">
                        <h4><strong>Pengerjaan Tahap I</strong> (online)</h4>
                        <p>22 September 2019</p>
                    </div>
                </li>
                <li>
                    <div class="timeline-item">
                        <h4><strong>Pengumuman Tahap I</strong></h4>
                        <p>27 September 2019</p>
                    </div>
                </li>
                <li>
                    <div class="timeline-item">
                        <h4><strong>Pengerjaan Tahap II</strong> (online)</h4>
                        <p>7 - 14 Oktober 2019</p>
                    </div>
                </li>
                <li>
                    <div class="timeline-item">
                        <h4><strong>Pengumuman Tahap II</strong></h4>
                        <p>28 Oktober 2019</p>
                    </div>
                </li>
                <li>
                    <div class="timeline-item">
                        <h4><strong>Babak Grand Final</strong> (Onsite)<span class="text-danger">*</span></h4>
                        <p>29 - 30 November 2019</p>
                        <span class="text-danger">*) Waktu dapat dirubah sewaktu-waktu</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        var countdown;
        $(document).ready(function () {
            $.post('/timeline', { id : 1 } ,function (data) {
                console.log(data['datetime']);
                try {
                    datetime = new Date(data['datetime']);
                } catch (e) {
                    alert('Something goes wrong. Please reload!');
                    console.log("a"); 
                    return;
                }

                countdown = datetime.getTime();
            }, 'json');
        });

        var x = setInterval(function() {
            var now = new Date().getTime();

            var distance = countdown - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            days = (parseInt(days/10) == 0) ? "0" + days : days;
            hours = (parseInt(hours/10) == 0) ? "0" + hours : hours;
            minutes = (parseInt(minutes/10) == 0) ? "0" + minutes : minutes;
            seconds = (parseInt(seconds/10) == 0) ? "0" + seconds : seconds;

            document.getElementById("time").innerHTML = days + ":" + hours + ":" + minutes + ":" + seconds;

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("time").innerHTML = "00:00:00:00";
            }
        }, 1000);
    </script>
@endsection