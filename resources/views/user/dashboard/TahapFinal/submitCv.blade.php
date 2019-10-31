@extends('user.dashboard')

@section('style')
<style>
    .col-form-label{
        font-size: 1.125rem;
        padding-left: 0;
    }

    .img-upload{
        margin-left: 7px;
        width: 40px;
        height: 40px;
    }

    .description {
        margin-bottom: 0.25rem;
    }

    ul > li{
        margin-bottom: 0.125rem;
    }
</style>
@endsection

@section('dashboardBody')
<div class="content-text">
    <div class="form-group row description col-form-label">
        Upload CV anda dengan ketentuan sebagai berikut:
    </div>
    <h5 class="form-group row">
        <ul>
            <li>Masing - masing peserta harus mencantumkan CV mereka masing - masing</li>
            <li>Kedua file tersebut harus berekstensi pdf dan di compress ke dalam satu zip</li>
            <li>Ketentuan nama file CV: <strong>KodeTim-NamaPeserta.pdf</strong></li>
            <li>Ketentuan nama file zip: <strong>KodeTim-NamaPeserta1-NamaPeserta2.zip</strong></li>
            <li>Kumpulkan sebelum <strong id="time">00:00:00:00</strong> (20 November 2019, 23:59 WIB)</li>
        </ul>
    </h5>
    {{ Form::open(['action' => 'TahapFinalController@upload', 'files' => true]) }}
    <div class="form-group row">
        <div class="col-sm-12 col-xs-12" style="padding-left:0; ">
            {{ Form::label('FileSubmit', 'Choose File', ['class' => 'btn btn-choose', 'style' => 'cursor:pointer;']) }}
            <img class="img-upload" src="{{asset('storage/Assets/upload.png')}}">
            <p id="fileName" style="display:none;"></p>
        </div>
        {{ Form::file('FileSubmit', ['class' => 'form-control-file '.($errors->has('FileSubmit') ? 'is-invalid' : ''), 'style' => 'display:none;']) }}
        @error('FileSubmit')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group row">
        <span class="text-danger">
            *Files tidak boleh melebihi 10MB
        </span>
    </div>
    <div class="form-group row">
        <span class="text-danger">
            *Anda hanya dapat mengunggah file sekali saja
        </span>
    </div>
    <div class="form-group row">
        {{ Form::submit('Submit', ['class' => 'btn btn-choose submit-btn']) }}
    </div>
    {{ Form::close() }}
</div>
@endsection

@section('script')
<script>
    var countdown;
    $(document).ready(function () {
        $.post('/timeline', { id : 11 } ,function (data) {
            console.log(data['datetime']);
            try {
                datetime = new Date(data['datetime']);
            } catch (e) {
                alert('Something goes wrong. Please reload!');
                return;
            }

            countdown = datetime.getTime();
        }, 'json');

        $("#FileSubmit").change(function() {
            filename = this.files[0].name
            $('#fileName').text(filename).show();
        });
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