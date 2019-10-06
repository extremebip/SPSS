@extends('user.dashboard')

@section('dashboardBody')
<div class="content-text">
    <h5>Terima kasih telah mengikuti SPSS round 2.</h5>
    <br>
    <h5 class="d-inline"><strong id="time">00:00:00:00</strong>
    <div class="d-inline"> to Round 2 Announcement</div>
    </h5>
</div>
@endsection

@section('script')
    <script>
        var countdown;
        $(document).ready(function () {
            $.post('/timeline', { id : 7 } ,function (data) {
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

            if (distance <= 0) {
                document.getElementById("time").innerHTML = "00:00:00:00";
                clearInterval(x);
                location.reload(true);
            }
        }, 1000);
    </script>
@endsection