@extends('layouts.appfront')

@section('content')
@include('front.carrusel')
<section class="ftco-section pt-5" id="visitados">
    <div class="container">
        <div class="row justify-content-center no-gutters">
            <div class="col-md-12 heading-section text-center ftco-animate mb-3">
                <h2 class="mb-2" >{{ __("Most visited tourists attractives")}}</h2>
            </div>
        </div>
        <div class="row wrap-about my-5">
            @foreach ($visitados as $item)
            <div class="col-sm-4">
                <div class="card item">
                    <div class="item-contenido">
                        <img src="/img/lugar_turistico/{{$item->imagen}}" class="card-img-top image" alt="{{$item->nombre}}">
                    </div> 
                </div>
                <div class="card-footer">
                    <a href="/lugaresturisticos/{{$item->categoria->slug}}/{{$item->slug}}"
                        class="botones">{{$item->nombre}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-section ftco-portfolio bg-light about pt-6">
    <div class="row justify-content-center no-gutters">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <h2 class="mb-2">{{ __("Most recent posts")}}</h2>
        </div>
    </div>
    <div class="container">
        @foreach($lugares as $lugar)
        <div class="aboutus-wrapper d-flex post">
            <div class="aboutus-img post-contenido">
                <img src="/img/lugar_turistico/{{$lugar->imagen}}" alt="about" class="img-fluid image">
            </div>
            <div class="aboutus-content">
                <h2>{{$lugar->nombre}}</h2>
                <p style="color:blue;">{{$lugar->description}}.</p>
                <hr>
                <p class="float-right">{{__("Published")}} {{$lugar->created_at->diffForHUmans()}}</p>
                <a href="#" class="botones">{{__("See More")}}</a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="degree-left"></div>
</section>

<section class="ftco-section testimony-section pt-5">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-3">{{ __("Recent Blogs")}}</h2>
			</div>
		</div>
		<div class="row d-flex">
			@foreach ($posts as $r)
			<div class="col-md-3 d-flex ftco-animate">
				<div class="blog-entry justify-content-end">
					<div class="text">
						<h3 class="heading mb-3"><a href="#">{{$r->nombre}}</a></h3>
						<a href="#" class="block-20 img image" style="background-image: url('/img/post/{{$r->imagen}}');">
						</a>
						<div class="meta mb-3">

						</div>
						<p>{{$r->descripcion}}.</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
        <hr>
		<div class="pt-2 mt-2 col-md-8 ">
              <h3 class="mb-5">{{$comentarios->count()}} {{__("Comments")}}</h3>
              <ul class="comment-list">
				  @foreach($comentarios as $item)
                <li class="comment">
                  <div class="vcard bio">
                    <img src="img/033.png" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>{{$item->nombre}}</h3>
                    <div class=""> {{$item->created_at->diffForHUmans()}} &nbsp; &nbsp;{{$item->created_at->format('d/m/Y | H:m:s')}} </div>
                    <p>{{$item->comentario}}</p>
                    <p><a href="" class="reply">{{__("Reply")}}</a></p>

                  </div>
                </li>
				@endforeach

              </ul>
              <!-- END comment-list -->

			<div class="comment-form-wrap pt-5">
				<h3>{{__("Leave a comment")}}</h3>
				<form action="{{url('coment')}}" method="post"  class="p-5">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="name">{{__("Name")}} *</label>
						<input type="text" class="form-control" name="nombre" id="name" required>
					</div>
					<div class="form-group">
						<label for="email">{{__("Email")}} *</label>
						<input type="email" class="form-control" name="correo" id="email" required>
					</div>
					<div class="form-group">
						<label for="message">{{__("Message")}}</label>
						<textarea name="comentario" id="message" cols="30" rows="10" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<input type="submit" value="{{__('Post Comment')}}" class="botones py-3 px-4">
					</div>

				</form>
			</div>
		</div>
	</div>
	<div class="degree-left-footer"></div>
</section>

@endsection

