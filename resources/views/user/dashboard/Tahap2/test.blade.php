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
    </style>
@endsection

@section('dashboardBody')
<div class="content-text">
    <h5 class="form-group row">
        <div class="d-inline">Upload the answer before </div>
        <strong id="time">00:00:00</strong>
    </h5>
    {{ Form::open(['action' => 'Tahap2Controller@upload', 'files' => true]) }}
    <div class="form-group row">
        {{ Form::label('DownloadSoal', 'Download Soal', ['class' => 'col-form-label col-sm-3 col-xs-12']) }}
        <div class="col-sm-9 col-xs-12">
            <button type="button" id="DownloadSoal" class="btn btn-choose">Download</button>
        </div>
    </div>
    <div class="form-group row">
        <p class="col-form-label col-sm-3 col-xs-12">Upload Your Answer</p>
        <div class="col-sm-9 col-xs-12">
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
            *Files tidak boleh melebihi 4MB
        </span>
    </div>
    <div class="form-group row">
        <span class="text-danger">
            *Anda hanya dapat mengunggah jawaban sekali saja
        </span>
    </div>
    <div class="form-group row">
        {{ Form::submit('Submit', ['class' => 'btn btn-choose submit-btn']) }}
    </div>
    {{ Form::close() }}
</div>
<iframe src="" id="download" style="visibility:hidden;display:none;"></iframe>
@endsection

@section('script')
<script>
    var countdown;
    $(document).ready(function () {
        $.post('/timeline', { id : 6 } ,function (data) {
            console.log(data['datetime']);
            try {
                datetime = new Date(data['datetime']);
            } catch (e) {
                alert('Something goes wrong. Please reload!');
                return;
            }

            countdown = datetime.getTime();
        }, 'json');

        $('#DownloadSoal').click(function () {
            url = "{{ route('file-download', ['file' => Crypt::encrypt('SoalTahap2')]) }}";
            $('#download').prop('src', url);
        })

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
            location.reload(true);
        }
    }, 1000);
</script>
@endsection