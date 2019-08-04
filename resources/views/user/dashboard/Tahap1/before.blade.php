@extends('user.dashboard')

@section('dashboardBody')
<div class="content-text">
    <h5 class="d-inline"><strong id="time"></strong>
    <div class="d-inline"> to SPSS Round 1</div>
    </h5>
    <h5>Material:</h5>
    <ol>
        <li>Data and Statistics</li>
        <li>Descriptive Statistics</li>
        <li>Probability</li>
        <li>Descriptive Probability Distributions</li>
        <li>Continuous Probability Distributions</li>
        <li>Sampling and Sampling Distributions</li>
        <li>Interval Estimation</li>
        <li>Hypothesis Test</li>
        <li>Anova</li>
        <li>Linear Regression</li>
    </ol>
    <h5>Read guide book for Round 1: Click <a href="" class="button" id="guideBook">here</a></h5>
</div>
@endsection

@section('script')
    <script>
        var countdown;
        $(document).ready(function () {
            $.post('/timeline', { id : 2 } ,function (data) {
                console.log(data['datetime']);
                try {
                    datetime = new Date(data['datetime']);
                } catch (e) {
                    alert('Something goes wrong. Please reload!');
                    return;
                }

                countdown = datetime.getTime();
            }, 'json');

            // $('#guideBook').click(function () {
            //     window.location.replace();
            // })
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
                window.location.replace('/tahap1')
            }
        }, 1000);
    </script>
@endsection