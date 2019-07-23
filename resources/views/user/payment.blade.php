@extends('layouts.userLayout')

@section('header')
<div class="header">
    <img src="{{asset('storage/Assets/Logo Spss.png')}}">
</div>
@endsection

@section('userContent')
    {{-- <div class="container px-5">
        <div class="row">
            <p class="col-lg-12"><strong>Bank Central Asia (BCA)</strong></p>
            <p class="col-lg-12"><strong>an. Tasya Fauzia DAN Andryan Kalmer</strong></p>
            <p class="col-lg-12"><strong>No Rek. 527xxxxxx</strong></p>
            <p class="col-lg-12">Total Payment: Rp. 75,000</p>
        </div>
            {{ Form::open(['action' => 'PembayaranLombaController@store', 'files' => true]) }}
            <div class="form-group row">
                {{ Form::label('NamaPengirim', 'Nama Pengirim', ['class' => 'col-form-label']) }}
                {{ Form::text('NamaPengirim', '', ['class' => 'form-control '.($errors->has('NamaPengirim') ? 'is-invalid' : '')]) }}
                @error('NamaPengirim')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                {{ Form::label('NamaBank', 'Nama Bank', ['class' => 'col-form-label']) }}
                {{ Form::text('NamaBank', '', ['class' => 'form-control '.($errors->has('NamaBank') ? 'is-invalid' : '')]) }}
                @error('NamaBank')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                {{ Form::label('BuktiTransfer', 'Upload Bukti Transfer', ['class' => 'col-form-label']) }}
                {{ Form::file('BuktiTransfer', ['class' => 'form-control-file '.($errors->has('BuktiTransfer') ? 'is-invalid' : '')]) }}
                @error('BuktiTransfer')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row justify-content-end">
                {{ Form::submit('Submit', ['class' => 'btn btn-warning']) }}
            </div>
            {{ Form::close() }}
    </div> --}}
    <div class="content-wrapper">
        <div>
            <h4>Bank Central Asia (BCA)</h4>
			<h5>an. Tasaya Fauziah DAN Andryan Kalmer</h5>
			<h5>No Rek. 527xxxxxxxxx</h5>
			<p class="font">Total Payment : Rp. 75.000,-</p>
        </div>

        <div>
            <h4 class="content"><strong>Payment Confirmation</strong></h4>
            {{ Form::open(['action' => 'PembayaranLombaController@store', 'files' => true]) }}
            <div class="form-group">
                {{ Form::label('NamaPengirim', 'Nama Pengirim', ['class' => 'col-form-label']) }}
                {{ Form::text('NamaPengirim', '', ['class' => 'form-control '.($errors->has('NamaPengirim') ? 'is-invalid' : '')]) }}
                @error('NamaPengirim')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::label('NamaBank', 'Nama Bank', ['class' => 'col-form-label']) }}
                {{ Form::text('NamaBank', '', ['class' => 'form-control '.($errors->has('NamaBank') ? 'is-invalid' : '')]) }}
                @error('NamaBank')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <p class="col-form-label">Upload Bukti Transfer</p>
                {{ Form::label('BuktiTransfer', 'Choose File', ['class' => 'upload-btn',  'style' => 'cursor:pointer;']) }}
                <img class="img-upload" src="{{asset('storage/Assets/upload.png')}}">
                {{ Form::file('BuktiTransfer', ['class' => 'form-control-file '.($errors->has('BuktiTransfer') ? 'is-invalid' : ''), 'style' => 'visibility:hidden;']) }}
                <p id="fileName" style="display:none;"></p>
                @error('BuktiTransfer')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row justify-content-end">
                {{ Form::submit('Submit', ['class' => 'btn btn-warning btn-choose submit-btn']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).load(function () {
            $("#BuktiTransfer").change(function() {
                filename = this.files[0].name
                $('#fileName').text(filename).show();
            });
        });
    </script>
@endsection