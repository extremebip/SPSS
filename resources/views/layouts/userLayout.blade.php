<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SPSS BINUS</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/font.css')}}">
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
	<link rel="icon" type="image/png" href="{{asset('storage/Assets/favicon_dan_icon.png')}}">
    @yield('style')
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a href="/home" class="navbar-brand">
        		<img src="{{asset('storage/Assets/favicon_dan_icon.png')}}" height="50" width="50">
        	</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="/competition">Competition</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/talkshow">Talkshow</a>
					</li>
					{{-- <li class="nav-item">
						<a class="nav-link" href="#">Blog</a>
					</li> --}}
					<li class="nav-item">
						<a class="nav-link" href="/about">About</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<!-- Authentication Links -->
					@if (Auth::guard('admin')->check() || Auth::guest())
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
						@if (Route::has('register'))
							<li class="nav-item">
								<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
							</li>
						@endif
					@else
						<li class="nav-item dropdown">
							@if (!is_null(Auth::user()->admin_id))
								@php
								$user = Auth::user();
								$KodePeserta = '';
								foreach ($user->detailPesertas as $member) {
									$KodePeserta .= $member->NamaLengkap[0];
								}
								$KodePeserta .= sprintf("%03d", $user->id);
								@endphp
							@endif
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->NamaLengkap.((!is_null(Auth::user()->admin_id)) ? (' - '.strtoupper($KodePeserta)) : '') }} <span class="caret"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="/dashboard">Dashboard</a>

								<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>

								<a class="dropdown-item" href="/password/change">Reset Password</a>
							</div>
						</li>
					@endguest
				</ul>
			</div>
        </nav>

		@yield('header')
		
        @yield('userContent')
    </div>
    <div class="footer">
		<div class="container">
			<div class="row">
				<div class="footer-content col-md-4 col-sm-12 col-xs-12">
					<h6>SECRETARIAT</h6>
					<p>HIMPUNAN MAHASISWA STATISTIKA BINUS <br> (HIMSTAT-BINUS) <br> Binus University Syahdan Campus <br> <a href="https://www.google.com/maps/place/BINUS+UNIVERSITY,+Kampus+Syahdan/@-6.2002449,106.7832843,17z/data=!3m1!4b1!4m5!3m4!1s0x2e69f6c2f89d2b67:0xe18cf42b220d8e7d!8m2!3d-6.2002502!4d106.785473" target="_blank" rel="noopener noreferrer">Jl. Kyai H. Syahdan No. 9</a></p>
				</div>

				<div class="footer-content col-md-4 col-sm-6 col-xs-6">
					<h6>SOCIAL MEDIA</h6>
					<p><a href="https://www.instagram.com/himstat/" target="_blank" rel="noopener noreferrer">INSTAGRAM</a> <br> <a href="https://www.facebook.com/himstat/" target="_blank" rel="noopener noreferrer">FACEBOOK</a> <br> <a href="https://www.twitter.com/himstat/" target="_blank" rel="noopener noreferrer">TWITTER</a> <br> <a href="https://www.youtube.com/channel/UC4bojv4fnL2wfxPOwICC2ww" target="_blank" rel="noopener noreferrer">YOUTUBE</a> <br> <a href="http://scdc.binus.ac.id/himstat" target="_blank" rel="noopener noreferrer">WEBSITE</a></p>
				</div>

				<div class="footer-content col-md-4 col-sm-6 col-xs-6">
					<h6>CONTACT PERSON</h6>
					<p>Nurjihan (WA: +6282281818026) <br> Renatha (WA: +62895344489706) <br> Line@: <a href="https://line.me/ti/p/@469ddtat" target="_blank" rel="noopener noreferrer">@469ddtat</a> </p>
				</div>
			</div>
		</div>
		<div class="footer-container">
			<img src="{{asset('storage/Assets/footer.png')}}">
			<div class="center-text">&copy; SPSS by HIMSTAT BINUS 2019</div>
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