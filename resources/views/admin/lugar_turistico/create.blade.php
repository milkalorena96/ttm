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
                        <strong>Registro lugares turisticos</strong>
                        <hr>
                        @if (\Session::has('success'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{\Session::get('success')}}</li>
                            </ul>
                        </div>
                        @endif
                        
                        {!! Form::open(['route'=>['lugares.store'],'method'=>'POST','files'=>true])!!}
                        {{ csrf_field() }}
                        <hr>
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Titulo:</label>
                            <div class="col-md-4">
                                {!! Form::text('titulo',null ,['class'=>'form-control','required',]) !!}
                                <br>
                                @error('titulo')
                                <small class="text-danger" autofocus> {{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Nombre:</label>
                            <div class="col-md-4">
                                {!! Form::text('nombre',null ,['class'=>'form-control','required',]) !!}
                                <br>
                                @error('nombre')
                                <small class="text-danger" autofocus> {{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Descripcion:</label>
                            <div class="col-md-8">
                                {!! Form::textarea('description',null ,['class'=>'form-control','required','rows'=>'2']) !!}
                                <br>
                                @error('description')
                                <small class="text-danger" autofocus> {{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Ubicacion:</label>
                            <div class="col-md-8">
                                {!! Form::textarea('ubicacion',null ,['class'=>'form-control','required','rows'=>'2'])
                                !!}
                                @error('ubicacion')
                                <small class="text-danger" autofocus> {{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Departamento:</label>
                            <div class="col-md-8">
                                {!! Form::text('departamento',null,['class'=>'form-control','required']) !!}
                                @error('departamento')
                                <small class="text-danger" autofocus> {{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Provincia:</label>
                            <div class="col-md-8">
                                {!! Form::text('provincia',null,['class'=>'form-control','required',])!!}
                                @error('provincia')
                                <small class="text-danger" autofocus> {{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Distrito:</label>
                            <div class="col-md-8">
                                {!! Form::text('distrito',null ,['class'=>'form-control','required',])!!}
                                @error('distrito')
                                <small class="text-danger" autofocus> {{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-md-3 control-label">Descripcion General:</label>
                            <div class="col-md-10">
                                {!!
                                Form::textarea('descripcion',null,['class'=>'form-control','rows'=>'3','required'])
                                !!}
                                @error('descripcion')
                                <small class="text-danger" autofocus> {{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="imagen" class="col-md-3 control-label">Imagen</label> <br>
                            <div class="col-md-10">
                                <img src="/img/lugar_turistico/foto.jpg">
                                {!! Form::file('imagen',['required','accept'=>'image/jpg,image/jpeg,image/png']) !!}
                                @error('imagen')
                                <small class="text-danger" autofocus> {{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-md-3 control-label">URL GoogleMaps</label>
                            <div class="col-md-10">
                                {!!
                                Form::textarea('mapa',null,['class'=>'form-control','rows'=>'2','required'])
                                !!}
                                @error('mapa')
                                <small class="text-danger" autofocus> {{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <br>
                        {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                        <a href="{{route('lugares.index')}}" class="btn btn-danger ml-auto">Cancelar</a>
                    </div>
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