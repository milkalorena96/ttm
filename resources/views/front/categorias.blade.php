@extends('layouts.appfront')

@section('content')
<section class="ftco-section">
<div class="row">
        <img src="/img/configuracion/{{$config->urlfoto}}" class="img-fluid" >

    </div>
    <div class="row justify-content-center">
        <div class="col-sm-12 mt-5 mb-5 text-center">
            <h1 class="text-danger">Lugares Turisticos</h1>
            <p>Tenemos una variedad de productos que ponemos en vitrina</p>
        </div>
        @foreach ($categorias as $r)
            <div class="col-sm-3 mt-4 mb-4 text-center">
            <div class="card border-0">
                    <a href="/lugaresturisticos/{{$r->slug}}">
                        <img src="/img/categoria/{{$r->urlfoto}}" class="card-img-top">
                    </a>
                <div class="card-footer">
                    <a href="/lugaresturisticos/{{$r->slug}}" class="text-decoration-none">
                        <h5 class="text-danger">{{$r->nombre}}</h5>
                    </a>
                </div>
            </div>
            </div>
        @endforeach

    </div>
</section>
@endsection
