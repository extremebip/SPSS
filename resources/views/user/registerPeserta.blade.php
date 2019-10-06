@extends('layouts.userLayout')

@section('style')
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
@endsection

@section('header')
<div class="header">
    <img src="{{asset('storage/Assets/Logo_Spss.png')}}">
</div>
@endsection

@section('userContent')
<div class="content-wrapper">
    {{ Form::open(['url' => '/register-peserta', 'files' => true]) }}
        <h2>Registrasi Peserta</h2>
        <div class="form-group row regis-form-row border-bottom border-dark input-field">
            {{ Form::label('AsalUniversitas', 'Asal Universitas', ['class' => 'col-form-label ml-2']) }}
                {{ Form::text('AsalUniversitas', '', ['class' => 'form-control border-0 '.($errors->has('AsalUniversitas') ? 'is-invalid' : ''), 'value' => old('AsalUniversitas')]) }}
            @error('AsalUniversitas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="btn-group d-flex justify-content-start">
            <button type="button" class="btn btn-choose submit-btn active" id="btn1">Peserta 1</button>
            <button type="button" class="btn btn-choose submit-btn " id="btn2">Peserta 2</button>
        </div>
        <div id="Peserta1">
            <h4>Peserta 1</h4>
            <div class="form-group row regis-form-row border-bottom border-dark input-field">
                {{ Form::label('NamaPeserta1', 'Nama', ['class' => 'col-form-label ml-2']) }}
                {{ Form::text('NamaPeserta1', '', ['class' => 'form-control border-0 '.($errors->has('NamaPeserta1') ? 'is-invalid' : ''), 'value' => old('NamaPeserta1')]) }}
                @error('NamaPeserta1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row regis-form-row border-bottom border-dark input-field">
                {{ Form::label('NoHPPeserta1', 'No. HP', ['class' => 'col-form-label ml-2']) }}
                {{ Form::text('NoHPPeserta1', '', ['class' => 'form-control border-0 '.($errors->has('NoHPPeserta1') ? 'is-invalid' : ''), 'value' => old('NoHPPeserta1')]) }}
                @error('NoHPPeserta1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row regis-form-row border-bottom border-dark input-field">
                {{ Form::label('IDLinePeserta1', 'ID Line', ['class' => 'col-form-label ml-2']) }}
                {{ Form::text('IDLinePeserta1', '', ['class' => 'form-control border-0 '.($errors->has('IDLinePeserta1') ? 'is-invalid' : ''), 'value' => old('IDLinePeserta1')]) }}
                @error('IDLinePeserta1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row regis-form-row border-bottom border-dark input-field">
                {{ Form::label('JurusanPeserta1', 'Jurusan', ['class' => 'col-form-label ml-2']) }}
                {{ Form::text('JurusanPeserta1', '', ['class' => 'form-control border-0 '.($errors->has('JurusanPeserta1') ? 'is-invalid' : ''), 'value' => old('JurusanPeserta1')]) }}
                @error('JurusanPeserta1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row regis-form-row border-bottom border-dark input-field">
                {{ Form::label('NIMPeserta1', 'NIM', ['class' => 'col-form-label ml-2']) }}
                {{ Form::text('NIMPeserta1', '', ['class' => 'form-control border-0 '.($errors->has('NIMPeserta1') ? 'is-invalid' : ''), 'value' => old('NIMPeserta1')]) }}
                @error('NIMPeserta1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row regis-form-row border-bottom border-dark input-field">
                {{ Form::label('JenisKelaminPeserta1', 'Jenis Kelamin', ['class' => 'col-form-label ml-2']) }}
                {{ Form::select('JenisKelaminPeserta1', ['Laki - Laki' => 'Laki - Laki', 'Perempuan' => 'Perempuan'], null, ['class' => 'form-control border-0 '.($errors->has('JenisKelaminPeserta1') ? 'is-invalid' : ''), 'placeholder' => 'Pilih Jenis Kelamin']) }}
                @error('JenisKelaminPeserta1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row regis-form-row">
                <p class="col-form-label pr-0">Upload Kartu Tanda Mahasiswa (KTM)</p>
                {{ Form::label('KartuTandaMahasiswa1', 'Choose File', ['class' => 'upload-btn ml-2', 'style' => 'cursor:pointer;']) }}
                <img class="img-upload" src="{{asset('storage/Assets/upload.png')}}" alt="">
                <p id="fileName1" style="display:none;" class=""></p>
                {{ Form::file('KartuTandaMahasiswa1', ['class' => 'form-control-file pl-0 '.($errors->has('KartuTandaMahasiswa1') ? 'is-invalid' : ''), 'style' => 'display:none;']) }}
                @error('KartuTandaMahasiswa1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div id="Peserta2" style="display:none;">
            <h4>Peserta 2</h4>
            <div class="form-group row regis-form-row border-bottom border-dark input-field">
                {{ Form::label('NamaPeserta2', 'Nama', ['class' => 'col-form-label ml-2']) }}
                {{ Form::text('NamaPeserta2', '', ['class' => 'form-control border-0 '.($errors->has('NamaPeserta2') ? 'is-invalid' : ''), 'value' => old('NamaPeserta2')]) }}
                @error('NamaPeserta2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row regis-form-row border-bottom border-dark input-field">
                {{ Form::label('NoHPPeserta2', 'No. HP', ['class' => 'col-form-label ml-2']) }}
                {{ Form::text('NoHPPeserta2', '', ['class' => 'form-control border-0 '.($errors->has('NoHPPeserta2') ? 'is-invalid' : ''), 'value' => old('NoHPPeserta2')]) }}
                @error('NoHPPeserta2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row regis-form-row border-bottom border-dark input-field">
                {{ Form::label('IDLinePeserta2', 'ID Line', ['class' => 'col-form-label ml-2']) }}
                {{ Form::text('IDLinePeserta2', '', ['class' => 'form-control border-0 '.($errors->has('IDLinePeserta2') ? 'is-invalid' : ''), 'value' => old('IDLinePeserta2')]) }}
                @error('IDLinePeserta2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row regis-form-row border-bottom border-dark input-field">
                {{ Form::label('JurusanPeserta2', 'Jurusan', ['class' => 'col-form-label ml-2']) }}
                {{ Form::text('JurusanPeserta2', '', ['class' => 'form-control border-0 '.($errors->has('JurusanPeserta2') ? 'is-invalid' : ''), 'value' => old('JurusanPeserta2')]) }}
                @error('JurusanPeserta2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row regis-form-row border-bottom border-dark input-field">
                {{ Form::label('NIMPeserta2', 'NIM', ['class' => 'col-form-label ml-2']) }}
                {{ Form::text('NIMPeserta2', '', ['class' => 'form-control border-0 '.($errors->has('NIMPeserta2') ? 'is-invalid' : ''), 'value' => old('NIMPeserta2')]) }}
                @error('NIMPeserta2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row regis-form-row border-bottom border-dark input-field">
                {{ Form::label('JenisKelaminPeserta2', 'Jenis Kelamin', ['class' => 'col-form-label ml-2']) }}
                {{ Form::select('JenisKelaminPeserta2', ['Laki - Laki' => 'Laki - Laki', 'Perempuan' => 'Perempuan'], null, ['class' => 'form-control border-0 border-0 '.($errors->has('JenisKelaminPeserta2') ? 'is-invalid' : ''), 'placeholder' => 'Pilih Jenis Kelamin']) }}
                @error('JenisKelaminPeserta2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row regis-form-row">
                <p class="col-form-label pr-0">Upload Kartu Tanda Mahasiswa (KTM)</p>
                {{ Form::label('KartuTandaMahasiswa2', 'Choose File', ['class' => 'upload-btn ml-2', 'style' => 'cursor:pointer;']) }}
                <img class="img-upload d-inline" src="{{asset('storage/Assets/upload.png')}}" alt="">
                <p id="fileName2" style="display:none;" class="d-inline"></p>
                {{ Form::file('KartuTandaMahasiswa2', ['class' => 'form-control-file pl-0 '.($errors->has('KartuTandaMahasiswa2') ? 'is-invalid' : ''), 'style' => 'display:none;']) }}
                @error('KartuTandaMahasiswa2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row justify-content-end">
            <div class="col-auto">
                {{ Form::submit('Submit', ['class' => 'btn btn-choose submit-btn']) }}
            </div>
        </div>
    {{ Form::close() }}
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#btn1').click(function () {
                $('#Peserta2').hide();
                $('#Peserta1').show();
                if (!$('#btn1').hasClass('active')){
                    $('#btn2').removeClass('active');
                    $('#btn1').addClass('active');
                }
            });

            $('#btn2').click(function () {
                $('#Peserta1').hide();
                $('#Peserta2').show();
                if (!$('#btn2').hasClass('active')){
                    $('#btn1').removeClass('active');
                    $('#btn2').addClass('active');
                }
            });

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