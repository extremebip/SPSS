@extends('layouts.userLayout')

@section('style')
    <style>
        .content{
            margin-top: 0px;
        }

        .content-text{
            background-color: white;
        }

        .form-control{
            background-color: #f2f2f2;
        }

        .form-control:focus{
            background-color: #f2f2f2;
        }
    </style>
@endsection

@section('header')
<div class="header">
    <img src="{{asset('storage/Assets/Logo Spss.png')}}">
</div>
@endsection

@section('userContent')
    <div class="content-wrapper">
        <div>
            <h4>Bank Central Asia (BCA)</h4>
			<h5>an. Tasya Fauziah DAN Andryan Kalmer</h5>
			<h5>No Rek. 527xxxxxxxxx</h5>
			<p class="font">Total Payment : Rp. 75.000,-</p>
        </div>

        <div>
            <h4 class="content"><strong>Payment Confirmation</strong></h4>
            <br>
            {{ Form::open(['action' => 'PembayaranLombaController@store', 'files' => true]) }}
            <div class="form-group border-bottom border-dark input-field">
                {{ Form::label('NamaPengirim', 'Nama Pengirim', ['class' => 'col-form-label px-2']) }}
                {{ Form::text('NamaPengirim', '', ['class' => 'form-control border-0 '.($errors->has('NamaPengirim') ? 'is-invalid' : '')]) }}
                @error('NamaPengirim')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group border-bottom border-dark input-field">
                {{ Form::label('NamaBank', 'Nama Bank', ['class' => 'col-form-label px-2']) }}
                {{ Form::text('NamaBank', '', ['class' => 'form-control border-0 '.($errors->has('NamaBank') ? 'is-invalid' : '')]) }}
                @error('NamaBank')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <p class="col-form-label">Upload Bukti Transfer</p>
                {{ Form::label('BuktiTransfer', 'Choose File', ['class' => 'upload-btn', 'style' => 'cursor:pointer;']) }}
                <img class="img-upload" src="{{asset('storage/Assets/upload.png')}}">
                <p id="fileName" style="display:none;"></p>
                {{ Form::file('BuktiTransfer', ['class' => 'form-control-file '.($errors->has('BuktiTransfer') ? 'is-invalid' : ''), 'style' => 'visibility:hidden;']) }}
                @error('BuktiTransfer')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row justify-content-end">
                {{ Form::submit('Submit', ['class' => 'btn btn-choose submit-btn']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $("#BuktiTransfer").change(function() {
                filename = this.files[0].name
                $('#fileName').text(filename).show();
            });
        });
    </script>
@endsection