@extends('layouts.appfront')

@section('content')
@include('front.carrusel')
<section class="ftco-section pt-5">
    <div class="container">
        <div class="row justify-content-center no-gutters">
            <div class="col-md-12 heading-section text-center ftco-animate mb-3">
                <h2 class="mb-2">{{$categoria->nombre}}</h2>
            </div>
        </div>
        <div class="row wrap-about my-5">
            @forelse ($categoria->lugar as $r)
            <div class="col-sm-4">
                <div class="card">
                    <img class="image" src="/img/lugar_turistico/{{$r->imagen}}" alt="" >
                </div>
                <div class="card-footer">
                    <h2 class="mb-2">{{$r->nombre}}</h2>
                    <p>{{$r->description}}</p>
                    <a href="/lugaresturisticos/{{$categoria->slug}}/{{$r->slug}}" class="botones btn-sm">{{__("Explore")}}</a>

                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
    <div class="degree-left-footer"></div>
</section>
@endsection



