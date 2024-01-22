@extends('layouts.appfront')

@section('content')
@include('front.carrusel')
<section class="ftco-section">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 ftco-animate">
                <p>
                <img src="/img/post/{{$post->imagen}}" alt="" class="img-fluid">
                </p>
                <h2 class="mb-3">{{$post->nombre}}</h2>
                {!!$post->descripcion!!}
                <hr>
                <p class="small text-right" style="color:gray;">Leido {{$post->visitas}} veces &nbsp;|&nbsp; Publicado {{$post->created_at->diffForHUmans()}}</p>
            </div> <!-- .col-md-8 -->
            <div class="col-md-4 sidebar ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <h3>Ubicación</h3>
                    <div class="block-21 mb-4 d-flex">
                    <iframe src="https://acortar.link/ndL4ul" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-3 sidebar ftco-animate">
                <div >
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon fa fa-search"></span>
                            <input type="text" class="form-control" placeholder="Bucar...">
                        </div>
                    </form>
                </div>
                <div class="sidebar-box ftco-animate">
                    <h3>Blogs recientes </h3>
                    @foreach ($blogs as $r)
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url('/img/post/{{$r->imagen}}');"></a>
                        <div class="text">
                            <h3 class="heading"><a href="/blog/{{$r->slug}}"><strong>{{$r->nombre}}</strong></a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-chat"></span> Publicado {{$post->created_at->diffForHUmans()}}</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="degree-left-footer"></div>
</section>

@endsection
