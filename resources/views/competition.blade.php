@extends('layouts.userLayout')

@section('style')
    <style>
        .title{
            margin-right: 15%;
        }

        .title-text{
            font-size: 4rem;
        }

        #time{
            font-size: 3rem;
        }

        .rounded-circle{
            background-color: #f2f2f2;
            width: 300px;
            height: 300px;
        }

        .button-text{
            margin-bottom: 0px;
        }
    </style>
    <style>
        /* The actual timeline (the vertical ruler) */
        .timeline {
        position: relative;
        max-width: 1200px;
        }

        /* The actual timeline (the vertical ruler) */
        .timeline::after {
        content: '';
        position: absolute;
        width: 6px;
        background-color: #fda0a0;
        top: 0;
        bottom: 0;
        }

        /* Container around content */
        .timeline-box {
        padding: 10px 40px;
        position: relative;
        background-color: inherit;
        }

        /* The circles on the timeline */
        .timeline-box::after {
        content: '';
        position: absolute;
        width: 25px;
        height: 25px;
        right: -17px;
        background-color: #fda0a0;
        border: 4px solid #fda0a0;
        top: 0px;
        border-radius: 50%;
        z-index: 1;
        }

        /* Place the container to the left */
        .left {
        left: 0;
        }

        /* Place the container to the right */
        .right {
        left: 7%;
        }

        /* Fix the circle for containers on the right side */
        .right::after {
        left: -21.25px;
        }

        /* The actual content */
        .timeline-content {
        padding: 20px 30px;
        background-color: #f2f2f2;
        position: relative;
        border-radius: 6px;
        }

        /* Media queries - Responsive timeline on screens less than 600px wide */
        @media screen and (max-width: 600px) {
            /* Place the timelime to the left */
            .timeline::after {
            left: 31px;
            }
            
            /* Full-width containers */
            .timeline-box {
            width: 100%;
            padding-left: 70px;
            padding-right: 25px;
            }
            
            /* Make sure that all arrows are pointing leftwards */
            .timeline-box::before {
            left: 60px;
            border: medium solid white;
            border-width: 10px 10px 10px 0;
            border-color: transparent white transparent transparent;
            }

            /* Make sure all circles are at the same spot */
            .left::after, .right::after {
            left: 15px;
            }
            
            /* Make all right containers behave like the left ones */
            .right {
            left: 0%;
            }
        }
    </style>
@endsection

@section('userContent')
    <div class="containter">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid" src="{{ asset('storage/Assets/competition-talkshow.png') }}" alt="">
            </div>
            <div class="col d-flex flex-column justify-content-center align-items-end title">
                <h1 class="title-text"><strong>SPSS</strong></h1> 
                <h1 class="title-text"><strong>Competition</strong></h1>
                <br> <br>
                <h3>Count</h3>
                <h1><strong id="time"></strong></h1>
                <h3>to close the registration</h3>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex flex-column justify-content-center align-items-end">
                <div class="rounded-circle d-flex flex-column align-items-center justify-content-center">
                    <h5>Total Prize</h5>
                    <h4><strong>IDR 16,000,000++</strong></h4>
                </div>
            </div>
            <div class="col d-flex flex-column justify-content-center align-items-end title">
                <h5>Sebuah kompetisi yang menantang peserta</h5>
                <h5>untuk memecahkan suatu permasalahan</h5>
                <h5>yang terbagi menjadi 3 yaitu dimulai dari </h5>
                <h5>teori, coding, hingga presentasi.</h5>
                <h5>Mau mengasah ketiga kemampuanmu di atas?</h5>
                <h5>Ayo daftarkan dirimu</h5>
                <a href="" class="btn btn-choose submit-btn"><h5 class="button-text"><strong>Download Terms of Condition</strong></h5></a>
                <a href="/register" class="btn submit-btn register-btn"><h5 class="button-text"><strong>Register</strong></h5></a>
            </div>
        </div>
        <div class="row">
            <h1><strong>Timeline</strong></h1>
        </div>
        <div class="row">
            <div class="timeline">
                <div class="timeline-box right">
                    <div class="timeline-content">
                        hello
                    </div>
                </div>
                <div class="timeline-box right">
                    <div class="timeline-content">
                        hello
                    </div>
                </div>
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