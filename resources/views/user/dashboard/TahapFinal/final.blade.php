@extends('user.dashboard')

@section('style')
<style>
    .attention{
        font-size: 1.2rem;
        font-weight: 600;
    }
</style>
@endsection

@section('dashboardBody')
<div class="content-text">
    <h5>Thank you for your submission!</h5>
    <br>
    <h5 class="d-inline attention" id="time">00:00:00:00</h5>
    <h5 class="d-inline">to Grand Final</h5>
    <h5>Read guide book for Grand Final: click <a href="#" target="_blank" rel="noopener noreferrer" class="button">here</a></h5>
    <br>
    <h5>Kami nantikan kehadiran anda!</h5>
</div>
@endsection

@section('script')
<script>
    var countdown;
    $(document).ready(function () {
        $.post('/timeline', { id : 8 } ,function (data) {
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
        }
    }, 1000);
</script>
@endsection