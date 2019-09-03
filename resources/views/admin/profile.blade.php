@extends('layouts.admin-layout')
@section('title', 'SPSS Admin - Profile')
@section('page', "Profile")
@section('style')
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="{{ asset('css/admin/profile.css') }}">
@endsection
@section('content')
<div class="container" id="root">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card text-center">
                <div class="card-header bg-primary">
                    <h3><b>CHANGE YOUR PROFILE HERE</b></h3>
                    <button id="edit-button" @click="enableEdit" :style="editable ? uneditButton : editButton" :title="editable ? 'Click to disable editing' : 'Click to Edit'">
                        <i class="fas fa-edit" :style="editable ? uneditIcon : editIcon"></i>
                    </button>
                </div>
                <div class="card-body">
                    <form method="POST">
                        {{ csrf_field() }}
                        <div class="col-md-10 offset-md-1">
                            <div class="form-group form-row">
                                <label for="fullname" class="col-md-2 col-form-label text-left">
                                    Full Name
                                </label>
                                <div class="col-md-8 offset-md-1">
                                    <input type="text" :class="editable ? editableClass : uneditableClass" id="fullname" name="fullname" :readonly="editable != 1" value="{{ $admin->NamaLengkap }}">
                                    @error('fullname')
                                    <small class="form-text text-muted">
                                        <b>{{$errors->first('fullname')}}</b>
                                    </small>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group form-row">
                                <label for="email" class="col-md-2 col-form-label  text-left">
                                    Email
                                </label>
                                <div class="col-md-8 offset-md-1">
                                    <input type="email" class="form-control-plaintext" id="email" name="email" value="{{ $admin->email }}" readonly>
                                    @error('email')
                                    <small class="form-text text-muted">
                                         <b>{{$errors->first('email')}} </b>
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group form-row">
                                <label for="phone" class="col-md-2 col-form-label  text-left">
                                    Phone Number
                                </label>
                                <div class="col-md-8 offset-md-1">
                                    <input type="number" :class="editable ? editableClass : uneditableClass" id="phone" name="phone" required :readonly="editable != 1" value="{{ $admin->NomorHP }}">
                                    @error('phone')
                                    <small class="form-text text-muted">
                                         <b>{{$errors->first('phone')}} </b>
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group form-row">
                                <label for="lineID" class="col-md-2 col-form-label  text-left">
                                    Line ID
                                </label>
                                <div class="col-md-8 offset-md-1">
                                    <input type="text" :class="editable ? editableClass : uneditableClass" id="lineID" name="lineID" :readonly="editable != 1" value="{{ $admin->IDLine }}">
                                    @error('lineID')
                                    <small class="form-text text-muted">
                                        <b> {{$errors->first('lineID')}} </b>
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group form-row">
                                <label for="role" class="col-md-2 col-form-label  text-left">
                                    Role
                                </label>
                                <div class="col-md-8 offset-md-1">
                                    <input type="text" :class="editable ? editableClass : uneditableClass" id="role" name="role" required :readonly="editable != 1" value="{{ $admin->Roles }}">
                                    @error('role')
                                    <small class="form-text text-muted">
                                         <b>{{$errors->first('role')}} </b>
                                    </small>
                                    @enderror
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit" :disabled="editable != 1">
                                SAVE CHANGES
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{ asset('js/admin/profile.js') }}" defer></script>
@endsection
