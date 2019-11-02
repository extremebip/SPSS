@extends('layouts.admin-layout')
@section('title', 'SPSS Admin - Team Final')
@section('page', 'Team Final')
@section('style')
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('css/admin/team-list.css') }}">
<style>
    .btn-success{
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-danger{
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header bg-secondary">
                    <h3><b>Team Finalis</b></h3>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-auto mr-auto">
                            <button class="button button-primary" onclick="getStatusFinalistList()">
                                <i class="fa fa-refresh"></i>
                                Refresh
                            </button>
                        </div>
                    </div>
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
                                        Kehadiran 
                                    </th>
                                    <th scope="col">
                                        Download CV
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="finalisTable">
                            @foreach ($Finalis as $team)
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
                                    <td>
                                        @if ($team->IsConfirmed == 1)
                                            <i class="fa fa-check"></i> Dapat Hadir
                                        @elseif ($team->IsConfirmed == -1)
                                            <i class="fa fa-times"></i> Tidak dapat Hadir
                                        @else
                                            <button class="button confirm">Konfirmasi Kehadiran</button>
                                            {{ Form::open(['action' => 'AdminController@updateFinalConfirm', 'style' => 'display:none;']) }}
                                                {{ Form::hidden('id', $team->id) }}
                                                {{ Form::hidden('isConfirmed', 1) }}
                                                <button type="submit" style="margin-bottom:5px;">
                                                    <i class="fa fa-check"></i>
                                                    Dapat Hadir
                                                </button>
                                            {{ Form::close() }}
                                            {{ Form::open(['action' => 'AdminController@updateFinalConfirm', 'style' => 'display:none;']) }}
                                                {{ Form::hidden('id', $team->id) }}
                                                {{ Form::hidden('isConfirmed', -1) }}
                                                <button type="submit">
                                                    <i class="fa fa-times"></i>
                                                    Tidak dapat hadir
                                                </button>
                                            {{ Form::close() }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (!is_null($team->FileCV))
                                            <a href="/admin/team-final/download/{{ $team->id }}" style="color:black;">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header bg-secondary">
                    <h3><b>Waiting List</b></h3>
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
                                        Action 
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="waitingListTable">
                            @foreach ($WaitingList as $team)
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
                                    <td>
                                        <button onclick="toFinalis({{ $team->id }})">Jadikan Finalis</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    function toFinalis(id) {
        $.ajax({
            method: "POST",
            url: "{{route('to-finalis')}}",
            data: {id : id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        }).done(function () {
            getStatusFinalistList();
            getStatusWaitingList();
        }).fail(function (jqXHR, textStatus) {
            console.log(jqXHR);
        });
    }

    function getStatusFinalistList() {
        $.ajax({
            method: "POST",
            url: "{{route('get-status')}}",
            data: {"Tahap" : "final", "type" : "finalis"},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        }).done(function (data) {
            // debugger;
            // console.log(data);
            $('#finalisTable').empty();
            if (data['status'].length > 0){
                content = "";
                for (let i = 0; i < data['status'].length; i+=2) {
                    var peserta1 = data['status'][i];
                    var peserta2 = data['status'][i+1];

                    kodePeserta = peserta1['NamaLengkap'][0].toUpperCase() + peserta2['NamaLengkap'][0].toUpperCase() + peserta1['id'].toString().padStart(3, '0');

                    content += `<tr>`;
                    content += `<td>${kodePeserta}</td>`
                    content += `<td>${peserta1['NamaLengkap']}</td>`
                    content += `<td>${peserta2['NamaLengkap']}</td>`

                    if (peserta1['IsConfirmed'] == 1){
                        content += `<td><i class="fa fa-check"></i> Dapat Hadir</td>`;
                    }
                    else if (peserta1['IsConfirmed'] == -1){
                        content += `<td><i class="fa fa-times"></i> Tidak dapat Hadir</td>`;
                    }
                    else {
                        content += 
                        `<td>
                            <button class="button confirm">Konfirmasi Kehadiran</button>
                            {{ Form::open(['action' => 'AdminController@updateFinalConfirm', 'style' => 'display:none;']) }}
                                <input name="id" type="hidden" value="${peserta1['id']}">
                                {{ Form::hidden('isConfirmed', 1) }}
                                <button type="submit" style="margin-bottom:5px;">
                                    <i class="fa fa-check"></i>
                                    Dapat Hadir
                                </button>
                            {{ Form::close() }}
                            {{ Form::open(['action' => 'AdminController@updateFinalConfirm', 'style' => 'display:none;']) }}
                                <input name="id" type="hidden" value="${peserta1['id']}">
                                {{ Form::hidden('isConfirmed', -1) }}
                                <button type="submit">
                                    <i class="fa fa-times"></i>
                                    Tidak dapat hadir
                                </button>
                            {{ Form::close() }}
                        </td>`;
                    }
                    content += "<td>";
                    if (peserta1['FileCV'] != null){
                        content += `
                        <a href="/admin/team-final/download/${peserta1['id']}" style="color:black;">
                            <i class="fa fa-download"></i>
                        </a>`;
                    }
                    content += "</td></tr>"
                }
                $('#finalisTable').html(content);
            }
        }).fail(function (jqXHR, textStatus) {
            console.log(jqXHR);
        });
    }

    function getStatusWaitingList() {
        $.ajax({
            method: "POST",
            url: "{{route('get-status')}}",
            data: { "Tahap" : "final", "type" : "waiting" },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        }).done(function (data) {
            // debugger;
            // console.log(data)
            $('#waitingListTable').empty();
            if (data['status'].length > 0){
                content = "";
                for (let i = 0; i < data['status'].length; i+=2) {
                    var peserta1 = data['status'][i];
                    var peserta2 = data['status'][i + 1];

                    kodePeserta = peserta1['NamaLengkap'][0].toUpperCase() + peserta2['NamaLengkap'][0].toUpperCase() + peserta1['id'].toString().padStart(3, '0');
                    content += `<tr>`;
                    content += `<td>${kodePeserta}</td>`;
                    content += `<td>${peserta1['NamaLengkap']}</td>`;
                    content += `<td>${peserta2['NamaLengkap']}</td>`;
                    content += `<td>
                                    <button onclick="toFinalis(${peserta1['id']})">
                                        Jadikan Finalis
                                    </button>
                                </td>`;
                    content += `</tr>`;
                }
                $('#waitingListTable').html(content);
            }
        }).fail(function (jqXHR, textStatus) {
            console.log(jqXHR);
        });
    }

    $(document).ready(function () {
        $(document).on('click', '.confirm', function () {
            $(this).siblings().show();
            $(this).hide();
        });
    });
</script>
@endsection