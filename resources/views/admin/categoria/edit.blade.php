
@extends('layouts.config')
@section('content')
@include('admin.admin')

<div id="layoutSidenav">
    @include('admin.sidebar')

    <div id="layoutSidenav_content">
        <main class="container-fluid">
            <div class="row">

                <div class="col-sm-10">
                    <div class="jumbotron">
                    <strong>Actualizar Lugar Turistico</strong>
                        <hr>
                        @if (\Session::has('success'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{\Session::get('success')}}</li>
                            </ul>
                        </div>
                        @endif
                        {!! Form::open(['route'=>['categoria.update',$categoria],'method'=>'PUT','files'=>true]) !!}

                            <div class="jumbotron">
                                <p>Actualizar categoria</p>
                                <hr>
                                <div class="form-group">
                                    <label for="title">INGRESE TITLE</label>
                                    {!! Form::text('titulo',$categoria->titulo,['class'=>'form-control','maxlength'=>'67']) !!}
                                </div>
                                <div class="form-group">
                                    <label for="description">INGRESE description</label>
                                    {!! Form::textarea('description',$categoria->description,['class'=>'form-control','maxlength'=>'155','rows'=>'3']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="nombre">INGRESE NOMBRE</label>
                                    {!! Form::text('nombre',$categoria->nombre,['class'=>'form-control','maxlength'=>'100']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                                    {!! Form::textarea('descripcion',$categoria->descripcion,['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="orden">INGRESE ORDEN</label>
                                    {!! Form::text('orden',$categoria->orden,['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="urlfoto">IMAGEN</label> <br>
                                    <img src="/img/categoria/{{$categoria->urlfoto}}" width="300">
                                    {!! Form::file('urlfoto') !!}
                                </div>
                            </div>
                            {!! Form::submit('GUARDAR',['class'=>'btn btn-success']) !!}
                            <a href="{{route('categoria.index')}}" class="btn btn-danger">Cancelar</a>
                            {!! Form::close() !!}
                </div>
            </div>     
        </main>
    </div>
</div>

@endsection