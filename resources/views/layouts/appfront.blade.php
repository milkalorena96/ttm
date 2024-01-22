<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$config->titulo}}</title>
	<meta charset="utf-8">
    <link rel="shortcut icon" href="/img/configuracion/{{$config->urlfavicon}}" type="image/png" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="/css/front/animate.css">

	<link rel="stylesheet" href="/css/front/owl.carousel.min.css">
	<link rel="stylesheet" href="/css/front/owl.theme.default.min.css">
	<link rel="stylesheet" href="/css/front/magnific-popup.css">

	<link rel="stylesheet" href="/css/front/flaticon.css">
	<link rel="stylesheet" href="/css/front/style.css">
	<link rel="stylesheet" href="/css/welcome.css">

	<script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>
	<link rel="stylesheet" href="/css/front/imagenhover/estilos.css">
    <!--<style>
        .navbar-light .navbar-nav .nav-link {color:#1E90FF !important}
        .bg-danger{ background:{{$config->colorPrimario}} !important}
        .text-danger{ color:#1E90FF !important}
        .text-warning{ color:#FFC926 !important}
        .bg-warning{background: {{$config->colorSecundario}} !important}
    </style>-->


</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-white  ftco_navbar bg-dark ftco-navbar-light shadow-sm" id="ftco-navbar">
		<div class="container">
		    <a class="navbar-brand" href="/">Ti<span>ngo&nbsp;Mar</span>ía</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>


			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<strong><li class="nav-item active"><a href="/" class="nav-link" style="color:white;">Home</a></li></strong>
					<strong><li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                              Lugares Turisticos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @forelse ($submenu as $item)
                                <a class="dropdown-item" href="/lugaresturisticos/{{$item->slug}}" title="{{$item->nombre}}" >{{$item->nombre}}</a>
                                @empty
                                @endforelse
                            </div>
                        </li></strong>
					<strong><li class="nav-item"><a href="/blog" class="nav-link" style="color:white;">Blog</a></li></strong>
					<strong><li class="nav-item"><a href="/contacto" class="nav-link" style="color:white;">Contacto</a></li></strong>
                    <strong><li class="nav-item"><a href="/login" class="nav-link" style="color:white;">Login</a></li></strong>

                    {{--  Agregamos el código siguiente:  --}}
                    <strong><li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;" v-pre>

                            <i class="icon-cog"></i>
                            {{ __("Idiom") }}

                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('set_language', ['es'])}}">{{ __("Spanish") }}</a>
                            <a class="dropdown-item" href="{{route('set_language', ['en'])}}">{{ __("English") }}</a>
                        </div>
                    </li></strong>
				</ul>
			</div>
		</div>
	</nav>

	<!-- END nav -->
	@yield('content')



	<footer class="ftco-footer ftco-section">
        <div class="col-md-12 text-center">
            <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://www.facebook.com/jonel.sacramento.96/" target="_blank" style="color:whitesmoke;">Anderson - Tingo María</a>
            </p>
        </div>
	</footer>



		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

        @yield('js')
		<script src="/js/front/jquery.min.js"></script>
		<script src="/js/front/jquery-migrate-3.0.1.min.js"></script>
		<script src="/js/front/popper.min.js"></script>
		<script src="/js/front/bootstrap.min.js"></script>
		<script src="/js/front/jquery.easing.1.3.js"></script>
		<script src="/js/front/jquery.waypoints.min.js"></script>
		<script src="/js/front/jquery.stellar.min.js"></script>
		<script src="/js/front/owl.carousel.min.js"></script>
		<script src="/js/front/jquery.magnific-popup.min.js"></script>
		<script src="/js/front/jquery.animateNumber.min.js"></script>
		<script src="/js/front/scrollax.min.js"></script>
		<script src="/js/front/main.js"></script>

		<script src="https://unpkg.com/muuri@0.8.0/dist/muuri.min.js"></script>
		<script src="/js/front/imagenhover/main.js"></script>

	</body>
	</html>
