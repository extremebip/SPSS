@extends('layouts.userLayout')

@section('style')
    <link rel="stylesheet" href="{{asset('css/About.css')}}">
@endsection

@section('userContent')
<div>
    <img class="logo-spss" src="{{asset('storage/Assets/Logo Spss.png')}}">
</div>

<div class="section">
    <div class="section-information">
        <div>
            <video class="video" controls>
                <source src="{{asset('storage/Assets/contoh video.mp4')}}" type="video/mp4">
            </video>
        </div>
        <div class="text">
            <p class="font">Statistical Project for Smart Student (SPSS) adalah acara terbesar dan pertama yang diadakan oleh HIMSTAT Binus University berisikan lomba statistika dan talkshow</p>
            <p class="font">SPSS diadakan mulai dari Agustus sampai Oktober dengan tema <span class="bold">"Achieve Better Life with the Insight of Data"</span> harapannya yaitu menambahkan wawasan baik pada era Revolusi Industri 4.0 di man abanyak perusahaan kecil  maupun besar telah mendigitalisasikan data-data yang jumlahnya sangat banyak</p>
        </div>
    </div>
</div>

<div>
    <h1 class="tujuan-title bold">TUJUAN</h1>
    <div class="box">
        <p>1.	Memberikan informasi mengenai peran sata sebagai bekal untuk mencapai kehidupan yang lebih baik pada era Revolusi Industri 4.0,</p>
        <p>2.	Memberikan informasi terkait dengan Data Science dan Data Scientist,</p>
        <p>3.	Melahirkan mahasiswa yang berpotensi menjadi Data Scientist di masa depan.</p>
    </div>
</div>

<div>
    <h1 class="tujuan-title bold">MANFAAT</h1>
    <div class="box">
        <p>1. Masyarakat mengetahui dan lebih memahami menegnai peran data di era Revolusi Industri 4.0 untuk mencapai kehidupan yang lebih baik,</p>
        <p>2. Masyarakat menjadi mengetahui gambaran umum data science dan data scientist,</p>
        <p>3.Peserta lomba mendapatkan pengalaman dan ilmu sebagai bekal untuk menjadi Data Scientist.</p>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            
        });
    </script>
@endsection