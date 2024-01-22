@extends('layouts.config')
@section('content')
@include('admin.admin')

<div id="layoutSidenav">
    @include('admin.sidebar')

    <div id="layoutSidenav_content">
        <main class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <span class="card-title">Correo de: <strong>{{ $correo->nombre }}</strong></span>
                                <br>
                                <p class="small float-left"> Recibido {{$correo->created_at->diffForHUmans()}}, el {{$correo->created_at}} </p>
                                
                            </div>
                            <a href="/admin/correo" class="btn btn-danger ml-auto float-right">Cerrar</a>
                        </div>

                        <div class="card-body">

                            <div class="form-group">
                                <strong>ID:</strong>
                                {{ $correo->id }}
                            </div>
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                {{ $correo->nombre }}
                            </div>
                            <div class="form-group">
                                <strong>Correo:</strong>
                                <a href="mailto:{{$correo->email}}">{{ $correo->email }}</a>
                            </div>
                            <div class="form-group">
                                <strong>Asunto:</strong>
                                {{ $correo->subject }}
                            </div>
                            <div class="form-group">
                                <strong>Mensaje:</strong>
                                <textarea class="form-control" rows="2" readonly>{{ $correo->mensaje }}</textarea>
                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>
        </main>
    </div>
</div>

@endsection