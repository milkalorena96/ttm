@extends('layouts.config')
@section('content')
@include('admin.admin')

<div id="layoutSidenav">
    @include('admin.sidebar')

    <div id="layoutSidenav_content">
        <main class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                    {!! Form::open(['route'=>['post.update' , $post],'method'=>'PUT','files'=>true]) !!}
                    @csrf
                    <div class="jumbotron">
                        <p>Actualizar Blog</p>
                        @if (\Session::has('success'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{\Session::get('success')}}</li>
                                </ul>
                            </div>
                        @endif
                        <hr>
                        <div class="form-group">
                            <label for="titulo">INGRESE TITULO</label>
                            {!! Form::text('titulo',$post->titulo,['class'=>'form-control','maxlength'=>'67', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="descripcion">INGRESE description</label>
                            {!!
                            Form::textarea('descripcion',$post->descripcion,['class'=>'form-control','maxlength'=>'155','rows'=>'3','required'])
                            !!}
                        </div>

                        <div class="form-group">
                            <label for="nombre">INGRESE NOMBRE</label>
                            {!! Form::text('nombre',$post->nombre,['class'=>'form-control','maxlength'=>'100','required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="orden">INGRESE ORDEN</label>
                            {!! Form::text('orden',$post->orden,['class'=>'form-control','required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="imagen">IMAGEN</label> <br>
                            <img src="/img/post/{{$post->imagen}}">
                            {!! Form::file('imagen',['accept'=>'image/jpg,image/jpeg,image/png']) !!}
                            <br>
                            @error('imagen')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                    <a href="{{route('post.index')}}" class="btn btn-danger">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </main>
    </div>
</div>

@endsection