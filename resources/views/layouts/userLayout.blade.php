<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    @yield('style')
</head>
<body>
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
			<img class="navbar-logo" src="{{ asset('storage/Assets/favicon dan icon.png')}}">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="#">Competition</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Talkshow</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Blog</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About</a>
					</li>
				</ul>
				<span class="navbar-text">
					Hello, Namma
				</span>
			</div>
        </nav>
        
        {{-- <div class="header">
			<img src="{{asset('storage/Assets/Logo Spss.png')}}">
        </div> --}}

        @yield('header')
        
        <div class="body">
			{{-- <div class="steps">
				<div class="box box-passed">Registrasi</div>
				<div class="box">Round 1</div>
				<div class="box">Round 2</div>
				<div class="box">Grand Final</div>
			</div>

			<div class="content">
				<div class="content-text">
					<span class="font bold">00:00:00:00</span><span class="font"> to SPSS Round 1</span>
					<p>Material : <br>1. ... <br>2. ... <br>3. ... <br>4. ...</p>
					<span class="font">Read guide book for round 1: Click <a class="button" href="">here</a></span>
				</div>
            </div> --}}
            @yield('userContent')
        </div>
        
        <div class="footer">
			<div class="footer-information">
				<div class="footer-content">
				<h6>SECRETARIAT</h6>
				<p class="footer-content-text">HIMPUNAN MAHASISWA STATISTIKA BINUS <br> (HIMSTAT-BINUS) <br> Jl. Kyai H. Syahdan No. 9</p>
			</div>
			
			<div class="footer-content">
				<h6>SOCIAL MEDIA</h6>
				<p class="footer-content-text">INSTAGRAM <br> FACEBOOK <br> TWITTER <br> YOUTUBE </p>
			</div>

			<div class="footer-content">
				<h6>CONTACT PERSON</h6>
				<P class="footer-content-text">Nama 1 (WA: +62800000000) <br> Nama 2 (WA: +62800000000) <br> Line: @asdfg </P>
			</div>
			</div>

			<div class="footer-container">
				<img src="{{asset('storage/Assets/footer.png')}}">
				<div class="center-text">&copy; SPSS by HIMSTAT BINUS 2019</div>
			</div>
		</div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
    </script>
    @yield('script')
</body>
</html>