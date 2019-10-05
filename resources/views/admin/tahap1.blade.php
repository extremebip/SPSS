@extends('layouts.admin-layout')
@section('title', 'SPSS Admin - Team Tahap 1')
@section('page', 'Team Tahap 1')
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
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">
                                        Kode Tim
                                    </th>
                                    <th scope="col"> 
                                        Peserta 1
                                    </th>
                                    <th scope="col"> 
                                        Peserta 2
                                    </th>
                                    <th scope="col">
                                        Nama File
                                    </th>
                                    <th scope="col">
                                        Waktu Submit 
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($teams as $team)
                            @php
                                $KodePeserta = '';
								foreach ($team->user->detailPesertas as $member) {
									$KodePeserta .= $member->NamaLengkap[0];
								}
								$KodePeserta .= sprintf("%03d", $team->user->id);
                            @endphp
                                <tr>
                                    <td>{{ strtoupper($KodePeserta) }}</td>
                                    <td>{{ $team->user->detailPesertas[0]->NamaLengkap }}</td>
                                    <td>{{ $team->user->detailPesertas[1]->NamaLengkap }}</td>
                                    <td>{{ (is_null($team->FileName)) ? '' : $team->FileName }}</td>
                                    <td>{{ (is_null($team->FileName)) ? 'Belum Submit' : explode(' ', $team->WaktuSubmit)[1] }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
{{-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script> --}}
@endsection('script')