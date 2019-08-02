@extends('layouts.userLayout')

@section('style')
    <link rel="stylesheet" href="{{asset('css/About.css')}}">
@endsection

@section('userContent')
<div>
    <img class="logo-spss" src="{{asset('storage/Assets/Logo_Spss.png')}}">
</div>

<div class="container">
    <div class="row desc d-flex flex-row">
        <div class="col">
            <video class="video" controls style="display:none;">
                <source src="{{asset('storage/Assets/Teaser.mov')}}" type="video/mp4">
            </video>
            <img src="{{asset('storage/Assets/play_video.png')}}" alt="" class="btn-play" >
        </div>
        <div class="w-100" id="break"></div>
        <div class="col text">
            <p class="font">Statistical Project for Smart Student (SPSS) adalah acara terbesar dan pertama yang diadakan oleh HIMSTAT Binus University berisikan lomba statistika dan talkshow</p>
            <p class="font">SPSS diadakan mulai dari Agustus sampai Oktober dengan tema <span class="bold">"Achieve Better Life with the Insight of Data"</span> harapannya yaitu menambahkan wawasan baik pada era Revolusi Industri 4.0 di mana banyak perusahaan kecil  maupun besar telah mendigitalisasikan data-data yang jumlahnya sangat banyak</p>
        </div>
    </div>

    <div class="row">
        <h1 class="col-lg-12 tujuan-title bold">TUJUAN</h1>
        <div class="box text-justify">
            <p>1. Memberikan informasi mengenai peran data sebagai bekal untuk mencapai kehidupan yang lebih baik pada era Revolusi Industri 4.0,</p>
            <p>2. Memberikan informasi terkait dengan Data Science dan Data Scientist,</p>
            <p>3. Melahirkan mahasiswa yang berpotensi menjadi Data Scientist di masa depan.</p>
        </div>
    </div>

    <div class="row">
        <h1 class="tujuan-title bold col-lg-12">MANFAAT</h1>
        <div class="box text-justify">
            <p>1. Masyarakat mengetahui dan lebih memahami mengenai peran data di era Revolusi Industri 4.0 untuk mencapai kehidupan yang lebih baik,</p>
            <p>2. Masyarakat menjadi mengetahui gambaran umum data science dan data scientist,</p>
            <p>3. Peserta lomba mendapatkan pengalaman dan ilmu sebagai bekal untuk menjadi Data Scientist.</p>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.btn-play').click(function () {
                $('.btn-play').hide();
                $('.video').show();
                $('.video').get(0).play()
            })
        });
    </script>
@endsection