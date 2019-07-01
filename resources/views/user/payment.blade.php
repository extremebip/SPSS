@extends('layouts.userLayout')

@section('userContent')
    <div class="container">
        <div class="row">
            <p class="col-lg-12"><strong>Bank Central Asia (BCA)</strong></p>
            <p class="col-lg-12"><strong>an. Tasya Fauzia DAN Andryan Kalmer</strong></p>
            <p class="col-lg-12"><strong>No Rek. 527xxxxxx</strong></p>
            <p class="col-lg-12">Total Payment: Rp. 75,000</p>
        </div>
        <div class="row">
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
                {{ Form::file('BuktiTransfer', ['class' => 'form-control-file']) }}
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
        </div>
    </div>
@endsection