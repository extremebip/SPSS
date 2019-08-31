@extends('layouts.admin-layout')
@section('page', 'Team List')
@section('style')
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="{{ asset('css/admin/team-list.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header bg-secondary">
                    <h3><b>Team List</b></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <team-table :users="{{ $users }}">

                    </team-table>
                    </div>
                </div>
                <div class="card-footer text-muted">Total Pendaftar : {{ count($users) }} orang</div>
            </div>
        </div>
    </div>
    <modal></modal>
</div>
@endsection
@section('script')
{{-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script> --}}
<script src="{{ asset('js/admin/team-list.js') }}" defer>

</script>
@endsection('script')
