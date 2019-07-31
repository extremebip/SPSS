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
	<link rel="icon" type="image/png" href="{{asset('storage/Assets/favicon dan icon.png')}}">
    @yield('style')
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a href="/home" class="navbar-brand">
        		<img src="{{asset('storage/Assets/favicon dan icon.png')}}" height="50" width="50">
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
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->NamaLengkap }} <span class="caret"></span>
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        
        <div class="footer">
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