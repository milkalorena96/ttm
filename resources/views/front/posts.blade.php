@extends('layouts.appfront')

@section('content')
@include('front.carrusel')
<section class="ftco-section pt-5">
    <div class="container">
        <div class="row justify-content-center no-gutters">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <h2 class="mb-2">{{__("Blogs")}}</h2>
            </div>
        </div>
        <div class="row d-flex">
            @foreach ($posts as $r)
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <div class="text">
                        <h3 class="heading mb-3"><a href="/blog/{{$r->slug}}">{{$r->nombre}}</a></h3>
                        <a href="/blog/{{$r->slug}}" class="block-20 img" style="background-image: url('/img/post/{{$r->imagen}}');">
                        </a>
                        <div class="meta mb-3">
                            <!--<div><a href="#">June 01, 2020</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>-->
                        </div>
                        <p>{{$r->descripcion}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-5 pb-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="degree-left-footer"></div>
</section>


@endsection
