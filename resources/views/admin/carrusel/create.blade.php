@extends('layouts.config')
@section('content')
@include('admin.admin')

<div id="layoutSidenav">
    @include('admin.sidebar')

    <div id="layoutSidenav_content">
        <main class="container-fluid">
            <div class="row">
                <div class="col-sm-10">

                    {!! Form::open(['route'=>['carrusel.store'],'method'=>'POST','files'=>true]) !!}

                    <div class="jumbotron">
                        <p>Registro de Carrusuel</p>
                        <hr>
                        @if (\Session::has('success'))
                        <div class="alert alert-danger">
                            <ul>
                                <li class="fa fa-remove">{{\Session::get('success')}}</li>
                            </ul>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                            {!! Form::text('descripcion',null ,['class'=>'form-control','maxlength'=>'67','required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="orden">INGRESE ORDEN</label>
                            {!! Form::number('orden',null ,['class'=>'form-control','required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="imagen">IMAGEN</label> <br>
                            <img src="/img/carrusel/foto.jpg">
                            {!! Form::file('imagen',['required','accept'=>'image/jpg,image/jpeg,image/png']) !!}
                            <br>
                                @error('imagen')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                        </div>

                    </div>
                    {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                    <a href="{{route('carrusel.index')}}" class="btn btn-danger">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </main>
    </div>
</div>
@endsection