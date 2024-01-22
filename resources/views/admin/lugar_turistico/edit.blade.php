
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
                    {!! Form::open(['route'=>['lugares.update',$lugar],'method'=>'PUT','files'=>true]) !!}
                    {{ csrf_field() }}
                        <hr>
                        <div class="form-group">
                            <label for="razonsocial">titulo</label>
                            {!!
                            Form::text('titulo',$lugar->titulo,['class'=>'form-control','required',])
                            !!}
                            @error('titulo')
                                <small class="text-danger" autofocus> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="razonsocial">Descripcion</label>
                            {!!
                            Form::textarea('description',$lugar->description,['class'=>'form-control','required','rows'=>'2'])
                            !!}
                            @error('description')
                                <small class="text-danger" autofocus> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="razonsocial">Nombre</label>
                            {!!
                            Form::text('nombre',$lugar->nombre,['class'=>'form-control','required',])
                            !!}
                            @error('nombre')
                                <small class="text-danger" autofocus> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ubicacion">Ubicacion</label>
                            {!!
                            Form::textarea('ubicacion',$lugar->ubicacion,['class'=>'form-control','required','rows'=>'2'])
                            !!}
                            @error('ubicacion')
                                <small class="text-danger" autofocus> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="departamento">Departamento</label>
                            {!!
                            Form::text('departamento',$lugar->departamento,['class'=>'form-control','maxlength'=>'50','required',])
                            !!}
                            @error('departamento')
                                <small class="text-danger" autofocus> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="provincia">Provincia</label>
                            {!!
                            Form::text('provincia',$lugar->provincia,['class'=>'form-control','maxlength'=>'50','required',])
                            !!}
                            @error('provincia')
                                <small class="text-danger" autofocus> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="distrito">Distrito</label>
                            {!!
                            Form::text('distrito',$lugar->distrito,['class'=>'form-control','maxlength'=>'50','required',])
                            !!}
                            @error('distrito')
                                <small class="text-danger" autofocus> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="urlfoto">Imagen</label> <br>
                            <img src="/img/lugar_turistico/{{$lugar->imagen}}">
                            {!! Form::file('imagen',['accept'=>'image/jpg,image/jpeg,image/png']) !!}
                            @error('imagen')
                                <small class="text-danger" autofocus> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="imagen">URL GoggleMaps</label> <br>
                            {!!
                            Form::text('mapa',$lugar->mapa,['class'=>'form-control','required'])
                            !!}
                            @error('mapa')
                                <small class="text-danger" autofocus> {{$message}}</small>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            {!!
                            Form::textarea('descripcion',$lugar->descripcion,['class'=>'form-control','rows'=>'3','required'])
                            !!}
                            @error('descripcion')
                                <small class="text-danger" autofocus> {{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                    <a href="{{route('lugares.index')}}" class="btn btn-danger">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>     
        </main>
    </div>
</div>
<script>
    CKEDITOR.replace( 'descripcion' );
</script>

@endsection