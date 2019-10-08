@extends('layouts.admin-layout')
@section('title', 'SPSS Admin - Team Tahap 2')
@section('page', 'Team Tahap 2')
@section('style')
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <div class="row mb-2">
                        <div class="col-auto mr-auto">
                            <button class="button button-primary" id="refresh">
                                <i class="fa fa-refresh"></i>
                                Refresh
                            </button>
                        </div>
                        <div class="col-auto">
                            <button class="button button-success" id="download_all">Download All</button>
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
                                        Nama File
                                    </th>
                                    <th scope="col">
                                        Waktu Submit 
                                    </th>
                                    <th scope="col">
                                        Action 
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
                                <tr id="team{{ $team->id }}">
                                    <td>{{ strtoupper($KodePeserta) }}</td>
                                    <td>{{ $team->user->detailPesertas[0]->NamaLengkap }}</td>
                                    <td>{{ $team->user->detailPesertas[1]->NamaLengkap }}</td>
                                    <td>{{ (is_null($team->FileName)) ? 'Belum Submit' : $team->FileName }}</td>
                                    <td>{{ (is_null($team->FileName)) ? 'Belum Submit' : $team->WaktuSubmit }}</td>
                                    <td>
                                    @if (!is_null($team->FileName))
                                        <a href="/admin/team-tahap-2/download/{{ $team->id }}" style="color:black;">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<iframe src="" id="download-iframe" style="visibility:hidden;display:none;"></iframe>
@endsection
@section('script')
{{-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    const NAMA_FILE = 3;
    const WAKTU_SUBMIT = 4;
    const DOWNLOAD = 5;

    let getStatus = function () {
        $.ajax({
            type : "POST",
            url : "{{ route('get-status') }}",
            data : { Tahap : 2 },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        }).done(function (data) {
            data['status'].forEach(team => {
                if (team['FileSubmit'] != null){
                    var id = team['id'];
                    var downloadIcon = `
                    <a href="/admin/team-tahap-2/download/` + id + `" style="color:black;">
                        <i class="fa fa-download"></i>
                    </a>`;

                    var row = document.getElementById("team" + id);
                    row.children[NAMA_FILE].innerHTML = team['FileName'];
                    row.children[WAKTU_SUBMIT].innerHTML = team['WaktuSubmit'];
                    row.children[DOWNLOAD].innerHTML = downloadIcon;
                }
            });
        }).fail(function (jqXHR, textStatus) {
            console.log(jqXHR);
        });
    };

    $(document).ready(function () {
        $('#refresh').click(function () {
            getStatus();
        });

        $('#download_all').click(function () {
            getStatus();
            url = '{{ route('download-all-tahap-2') }}';
            $('#download-iframe').prop('src', url);
        });
    });
</script>
@endsection('script')