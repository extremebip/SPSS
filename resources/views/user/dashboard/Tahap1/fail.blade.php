@extends('user.dashboard')

@section('style')
    <style>
        .attention{
            font-size: 1.2rem;
            font-weight: 600;
        }
    </style>
@endsection

@section('dashboardBody')
<div class="content-text">
    <div class="attention">Maaf, kamu belum lolos ke tahap selanjutnya.</div>
    <div class="attention">Terima kasih telah mengikuti SPSS Competition.</div>
    <br>
    <h5>Sertifikat akan dikirim melalui e-mail.</h5>
</div>
@endsection