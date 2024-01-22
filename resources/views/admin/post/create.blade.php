@extends('layouts.config')
@section('content')
@include('admin.admin')

<div id="layoutSidenav">
    @include('admin.sidebar')

    <div id="layoutSidenav_content">
        <main class="container-fluid">
            <div class="row">
                <div class="col-sm-10">

                    {!! Form::open(['route'=>['post.store'],'method'=>'POST','files'=>true]) !!}

                    <div class="jumbotron">
                        <p>Registro de Blog</p>
                        @if (\Session::has('success'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{\Session::get('success')}}</li>
                                </ul>
                            </div>
                        @endif
                        <hr>
                        <div class="form-group">
                            <label for="titulo">INGRESE TITLE</label>
                            {!! Form::text('titulo',null ,['class'=>'form-control','maxlength'=>'67','required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="descripcion">INGRESE DESCRIPTION</label>
                            {!! Form::textarea('descripcion',null
                            ,['class'=>'form-control','maxlength'=>'155','rows'=>'3','required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="nombre">INGRESE NOMBRE</label>
                            {!! Form::text('nombre',null ,['class'=>'form-control','required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="orden">INGRESE ORDEN</label>
                            {!! Form::text('orden',null ,['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="categoria_id">Elija Categoria</label>
                            {!! Form::select('categoria_id',$categorias,null ,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="imagen">IMAGEN</label> <br>
                            <img src="/img/post/foto.jpg">
                            {!! Form::file('imagen',['required','accept'=>'image/jpg,image/jpeg,image/png']) !!}
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