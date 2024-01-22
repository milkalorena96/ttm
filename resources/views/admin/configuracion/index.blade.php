
@extends('layouts.config')
@section('content')
@include('admin.admin')

<div id="layoutSidenav">
    @include('admin.sidebar')

    <div id="layoutSidenav_content">
        <main class="container-fluid">
            <div class="row">
                <div class="col-sm-10">
                    {!!
                    Form::open(['route'=>['configuracion.update',$registro],'method'=>'PUT','files'=>true])!!}
                    @csrf

                    <div class="jumbotron">
                        <p>Actualizar datos de la Página</p>
                        <hr>
                        @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{\Session::get('success')}}</li>
                            </ul>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="tittle">TITULO</label>
                            {!! Form::text('titulo',$registro->titulo, ['class'=>'form-control','maxlength'=>'67','required'])
                            !!}
                        </div>

                        <div class="form-group">
                            <label for="description">DESCRIPCION</label>
                            {!!
                            Form::textarea('description',$registro->description,['class'=>'form-control','maxlength'=>'155','rows'=>'3','required'])
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="urlfoto">IMAGEN DESTACADA</label> <br>
                            <img src="/img/configuracion/{{$registro->urlfoto}}" width="500">
                            {!! Form::file('urlfoto',['accept'=>'image/jpg,image/jpeg,image/png']) !!}
                            <br>
                            @error('urlfoto')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row" aling="center">
                        <div class="col-sm-3">
                            <label for="colorPrimario">COLOR PRIMARIO</label>
                            {!!
                            Form::text('colorPrimario',$registro->colorPrimario,['class'=>'form-control','maxlength'=>'7','required'])
                            !!}
                        </div>

                        <div class="col-sm-9">
                            <label for="urlfavicon">FAVICON</label> <br>
                            <img src="/img/configuracion/{{$registro->urlfavicon}}">
                            {!! Form::file('urlfavicon',['accept'=>'image/jpg,image/jpeg,image/png']) !!}
                            <br>
                            @error('urlfavicon')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <label for="colorSecundario">COLOR SECUNDARIO</label>
                            {!!
                            Form::text('colorSecundario',$registro->colorSecundario,['class'=>'form-control','maxlength'=>'7','required'])
                            !!}
                        </div>
                        <div class="col-sm-9">
                            <label for="urllogo">LOGO</label> <br>
                            <img src="/img/configuracion/{{$registro->urllogo}}">
                            {!! Form::file('urllogo',['accept'=>'image/jpg,image/jpeg,image/png']) !!}
                            <br>
                            @error('urllogo')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">

                        <div class="col-sm-4">
                            <label for="razonsocial">RAZÓN SOCIAL</label>
                            {!!
                            Form::text('razonsocial',$registro->razonsocial,['class'=>'form-control','maxlength'=>'50','required'])
                            !!}
                        </div>
                        <div class="col-sm-4">
                            <label for="direccion">DIRECCIÓN</label>
                            {!!
                            Form::text('direccion',$registro->direccion,['class'=>'form-control','maxlength'=>'50','required'])
                            !!}
                        </div>

                        <div class="col-sm-4">
                            <label for="celular">CELULAR</label>
                            {!! Form::text('celular',$registro->celular,['class'=>'form-control','maxlength'=>'11','required'])
                            !!}
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="email">EMAIL</label>
                            {!! Form::text('email',$registro->email,['class'=>'form-control','maxlength'=>'50','required']) !!}
                        </div>
                        <div class="col-sm-4">
                            <label for="facebook">FACEBOOK</label>
                            {!!
                            Form::text('facebook',$registro->facebook,['class'=>'form-control','maxlength'=>'50','required'])
                            !!}
                        </div>
                    </div>


                    {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                    <a href="/admin/main" class="btn btn-danger">Cancelar</a>
                    {!! Form::close() !!}
                    <br>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection