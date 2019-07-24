@extends('layouts.userLayout')

@section('style')
    <style>
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
        {{ Form::open(['url' => '/register-peserta', 'files' => true]) }}
            <h2>Registrasi Peserta</h2>
            <br>
            <h4>Peserta 1</h4>
            <div class="form-group row">
                {{ Form::label('NamaPeserta1', 'Nama', ['class' => 'col-form-label col-sm-2']) }}
                <div class="col-sm-1">:</div>
                {{ Form::text('NamaPeserta1', '', ['class' => 'form-control col-sm-8 '.($errors->has('NamaPeserta1') ? 'is-invalid' : '')]) }}
                @error('NamaPeserta1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                {{ Form::label('JurusanPeserta1', 'Jurusan', ['class' => 'col-form-label col-sm-2']) }}
                <div class="col-sm-1">:</div>
                {{ Form::text('JurusanPeserta1', '', ['class' => 'form-control col-sm-8 '.($errors->has('JurusanPeserta1') ? 'is-invalid' : '')]) }}
                @error('JurusanPeserta1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                {{ Form::label('NoHPPeserta1', 'No. HP', ['class' => 'col-form-label col-sm-2']) }}
                <div class="col-sm-1">:</div>
                {{ Form::text('NoHPPeserta1', '', ['class' => 'form-control col-sm-8 '.($errors->has('NoHPPeserta1') ? 'is-invalid' : '')]) }}
                @error('NoHPPeserta1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                {{ Form::label('IDLinePeserta1', 'ID Line', ['class' => 'col-form-label col-sm-2']) }}
                <div class="col-sm-1">:</div>
                {{ Form::text('IDLinePeserta1', '', ['class' => 'form-control col-sm-8 '.($errors->has('IDLinePeserta1') ? 'is-invalid' : '')]) }}
                @error('IDLinePeserta1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row justify-content-start">
                <p class="col-form-label col-sm-4 pr-0 d-inline">Upload Kartu Tanda Mahasiswa (KTM)</p>
                {{ Form::label('KartuTandaMahasiswa1', 'Choose File', ['class' => 'upload-btn d-inline', 'style' => 'cursor:pointer;']) }}
                <img class="img-upload d-inline" src="{{asset('storage/Assets/upload.png')}}" alt="">
                <p id="fileName1" style="display:none;" class="d-inline"></p>
                {{ Form::file('KartuTandaMahasiswa1', ['class' => 'form-control-file col-sm-4 pl-0 '.($errors->has('KartuTandaMahasiswa1') ? 'is-invalid' : ''), 'style' => 'visibility:hidden;']) }}
                @error('KartuTandaMahasiswa1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <br>
            <h4>Peserta 2</h4>
            <div class="form-group row">
                {{ Form::label('NamaPeserta2', 'Nama', ['class' => 'col-form-label col-sm-2']) }}
                <div class="col-sm-1">:</div>
                {{ Form::text('NamaPeserta2', '', ['class' => 'form-control col-sm-8 '.($errors->has('NamaPeserta2') ? 'is-invalid' : '')]) }}
                @error('NamaPeserta2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                {{ Form::label('JurusanPeserta2', 'Jurusan', ['class' => 'col-form-label col-sm-2']) }}
                <div class="col-sm-1">:</div>
                {{ Form::text('JurusanPeserta2', '', ['class' => 'form-control col-sm-8 '.($errors->has('JurusanPeserta2') ? 'is-invalid' : '')]) }}
                @error('JurusanPeserta2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                {{ Form::label('NoHPPeserta2', 'No. HP', ['class' => 'col-form-label col-sm-2']) }}
                <div class="col-sm-1">:</div>
                {{ Form::text('NoHPPeserta2', '', ['class' => 'form-control col-sm-8 '.($errors->has('NoHPPeserta2') ? 'is-invalid' : '')]) }}
                @error('NoHPPeserta2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                {{ Form::label('IDLinePeserta2', 'ID Line', ['class' => 'col-form-label col-sm-2']) }}
                <div class="col-sm-1">:</div>
                {{ Form::text('IDLinePeserta2', '', ['class' => 'form-control col-sm-8 '.($errors->has('IDLinePeserta2') ? 'is-invalid' : '')]) }}
                @error('IDLinePeserta2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row justify-content-start">
                <p class="col-form-label col-sm-4 pr-0">Upload Kartu Tanda Mahasiswa (KTM)</p>
                {{ Form::label('KartuTandaMahasiswa2', 'Choose File', ['class' => 'upload-btn', 'style' => 'cursor:pointer;']) }}
                <img class="img-upload d-inline" src="{{asset('storage/Assets/upload.png')}}" alt="">
                <p id="fileName2" style="display:none;" class="d-inline"></p>
                {{ Form::file('KartuTandaMahasiswa2', ['class' => 'form-control-file col-sm-4 pl-0 '.($errors->has('KartuTandaMahasiswa2') ? 'is-invalid' : ''), 'style' => 'visibility:hidden;']) }}
                @error('KartuTandaMahasiswa2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-2">
                    {{ Form::submit('Submit', ['class' => 'btn btn-choose submit-btn']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $("#KartuTandaMahasiswa1").change(function() {
                filename = this.files[0].name
                $('#fileName1').text(filename).show();
            });

            $("#KartuTandaMahasiswa2").change(function() {
                filename = this.files[0].name
                $('#fileName2').text(filename).show();
            });
        });
    </script>
@endsection