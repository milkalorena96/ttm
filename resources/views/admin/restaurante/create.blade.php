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
                            <strong>Registro Restaurantes</strong>
                            <hr>
                            @if (\Session::has('success'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{\Session::get('success')}}</li>
                                </ul>
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">NUMERO RUC:</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="ruc" type="text" class="form-control" name="ruc" value=""
                                        placeholder="Escribe RUC" required autofocus maxlength="11">&nbsp;
                                        <button type="button" class="btn btn-sm btn-danger" id="btnbuscar">
                                        <i class="fa fa-search"></i> Buscar en SUNAT</button>
                                    </div>
                                </div>
                            </div> 
                        {!! Form::open(['route'=>['restaurante.store'],'method'=>'POST','files'=>true])!!}
                        {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-3"></div>
                                <div class="col-md-5">
                                    <small id="mensaje" style="color: red;display: none;font-size: 12pt;">
                                        <i class="fa fa-remove"></i> El numero de RUC no es valido.
                                    </small>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Nombre:</label>
                                <div class="col-md-10">    
                                    {!! Form::text('nombre',null ,['class'=>'form-control','required']) !!}
                                    <br>
                                    @error('nombre')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Descripcion:</label>
                                <div class="col-md-10">    
                                    {!! Form::textarea('description',null ,['class'=>'form-control','required','rows'=>'2']) !!}
                                    <br>
                                    @error('description')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">RUC:</label>
                                <div class="col-md-4">    
                                    {!! Form::text('ruc',null ,['class'=>'form-control','required', 'id'=>'txtdni','readonly'=>'']) !!}
                                    <br>
                                    @error('ruc')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Razon social:</label>
                                <div class="col-md-8">
                                    {!! Form::textarea('razonsocial',null ,['class'=>'form-control','required', 'id'=>'txtrazon','readonly'=>'','rows'=>'2'])
                                    !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Estado:</label>
                                <div class="col-md-4">
                                    {!! Form::text('estado',null ,['class'=>'form-control','required', 'id'=>'txtgrupo','readonly'=>'']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Ubicación:</label>
                                <div class="col-md-8">
                                    {!! Form::textarea('ubicacion',null ,['class'=>'form-control','required', 'id'=>'txtdireccion','readonly'=>'','rows'=>'2'])
                                    !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Departamento:</label>
                                <div class="col-md-8">
                                    {!! Form::text('departamento',null ,['class'=>'form-control','required','id'=>'txtdepartamento','readonly'=>'']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Provincia:</label>
                                <div class="col-md-8">
                                    {!! Form::text('provincia',null ,['class'=>'form-control','required','id'=>'txtprovincia','readonly'=>''])
                                    !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Distrito:</label>
                                <div class="col-md-8">
                                    {!! Form::text('distrito',null ,['class'=>'form-control','required', 'id'=>'txtdistrito','readonly'=>''])
                                    !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="id_lugar" class="col-md-3 control-label">Elija Lugar Turistico</label>
                                <div class="col-md-6">
                                    {!! Form::select('id_lugar',$lugares,null ,['class'=>'custom-select','required','readonly'=>'']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="imagen" class="col-md-3 control-label">Imagen</label> <br>
                                <div class="col-md-8">
                                    <img src="/img/restaurante/foto.jpg">
                                    {!! Form::file('imagen',['required','accept'=>'image/jpg,image/jpeg,image/png']) !!}
                                    <br>
                                    @error('imagen')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descripcion" class="col-md-3 control-label">Descripcion</label>
                                <div class="col-md-8">
                                    {!! Form::textarea('descripcion',null,['class'=>'form-control','maxlength'=>'200','rows'=>'3','required']) !!}
                                </div>
                            </div>
                            <hr>
                            <br>
                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                            <a href="{{route('restaurante.index')}}" class="btn btn-danger ml-auto">Cancelar</a>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </main>
    </div>
</div>

@endsection