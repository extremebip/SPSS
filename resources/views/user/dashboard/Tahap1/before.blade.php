@extends('user.dashboard')

@section('dashboardBody')
<div class="content-text">
    <h5 class="d-inline"><strong id="time"></strong></h5>
    <div class="d-inline"> to SPSS Round 1</div>
    {{-- <p><h5><strong id="time"></strong></h5> to SPSS Round 1</p> --}}
    <p>Material:</p>
    <ol>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ol>
    <p>Read guide book for Round 1: <a href="">Click Here</a></p>
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
                window.location.replace('/tahap1')
            }
        }, 1000);
    </script>
@endsection