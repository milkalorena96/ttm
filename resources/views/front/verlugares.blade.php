@extends('layouts.appfront')

@section('content')
@include('front.carrusel')
<section class="ftco-section pt-5">
    <div class="container">
        <div class="row justify-content-center no-gutters">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <h2 class="mb-2">{{$lugarturistico->categoria->nombre}}</h2>
            </div>
        </div>
    <div class="contenedor">
            <header>
                <form action="">
                    <input type="text" class="barra-busqueda" id="barra-busqueda" placeholder="Buscar" hidden>
                </form>
		    </header>
        <section class="grid pt-1" id="grid">
            @foreach($lugarturistico->fotos as $lugar)
			<div class="item">
				<div class="item-contenido">
					<img src="/img/lugar_turistico/fotos/{{$lugar->ruta}}" alt="" title="Ampliar">
				</div>
			</div>
            @endforeach
		</section>
		<section class="overlay" id="overlay">
			<div class="contenedor-img">
				<button id="btn-cerrar-popup"><i class="fas fa-times"></i></button>
				<img src="" alt="" width="800" height="480" >
			</div>
		</section>
    </div>
        {!!$lugarturistico->descripcion!!}
    </div>
	<div class="degree-left-footer"></div>
</section>
@endsection

