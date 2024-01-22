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
                    <strong>Actualizar Restaurante</strong>
                        <hr>
                        @if (\Session::has('success'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{\Session::get('success')}}</li>
                            </ul>
                        </div>
                        @endif
                        <!--<div class="form-group">
                            <label for="email" class="col-md-3 control-label">NUMERO RUC:</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="ruc" type="text" class="form-control" name="ruc" value=""
                                    placeholder="Escribe RUC" required autofocus maxlength="11">&nbsp;
                                    <button type="button" class="btn btn-sm btn-danger" id="btnbuscar">
                                    <i class="fa fa-search"></i> Buscar en SUNAT</button>
                                </div>
                            </div>
                        </div> -->
                    {!! Form::open(['route'=>['hotel.update',$hotel],'method'=>'PUT','files'=>true]) !!}
                    {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="ruc">RUC</label>
                            
                            <div class="input-group col-md-6">
                                    <input id="ruc" type="text" value="{{$hotel->ruc}}" class="form-control" name="ruc" readonly=""
                                    placeholder="Escribe RUC" required autofocus maxlength="11">&nbsp;
                                    <button type="button" class="btn btn-sm btn-danger" id="btnbuscar">
                                    <i class="fa fa-search"></i> consultar en SUNAT</button>
                            </div>
                            @error('ruc')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
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
                            <label for="razonsocial">Razon Social</label>
                            {!!
                            Form::text('razonsocial',$hotel->razonsocial,['class'=>'form-control','maxlength'=>'67','required', 'id'=>'txtrazon','readonly'=>'',])
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            {!!
                            Form::text('estado',$hotel->estado,['class'=>'form-control','maxlength'=>'67','required', 'id'=>'txtgrupo','readonly'=>''])
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="ubicacion">Ubicacion</label>
                            {!!
                            Form::textarea('ubicacion',$hotel->ubicacion,['class'=>'form-control','required', 'id'=>'txtdireccion','readonly'=>'','rows'=>'2'])
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="departamento">Departamento</label>
                            {!!
                            Form::text('departamento',$hotel->departamento,['class'=>'form-control','maxlength'=>'100','required','id'=>'txtdepartamento','readonly'=>''])
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="provincia">Provincia</label>
                            {!!
                            Form::text('provincia',$hotel->provincia,['class'=>'form-control','maxlength'=>'100','required','id'=>'txtprovincia','readonly'=>''])
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="distrito">Distrito</label>
                            {!!
                            Form::text('distrito',$hotel->distrito,['class'=>'form-control','maxlength'=>'100','required','id'=>'txtdistrito','readonly'=>''])
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="ruc">Mombre</label>
                            {!!
                            Form::text('nombre',$hotel->nombre,['class'=>'form-control','required',])
                            !!}
                            <br>
                            @error('nombre')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ruc">Descripcion</label>
                            {!!
                            Form::textarea('description',$hotel->description,['class'=>'form-control','required','rows'=>'2'])
                            !!}
                            <br>
                            @error('description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_lugar">Elija Lugar Turistico</label>
                            {!! Form::select('id_lugar',$lugares,$hotel->nombre,['class'=>'custom-select']) !!}
                        </div>
                        <div class="form-group">
                            <label for="imagen">Imagen</label> <br>
                            <img src="/img/hotel/{{$hotel->imagen}}">
                            {!! Form::file('imagen',['accept'=>'image/jpg,image/jpeg,image/png']) !!}
                            <br>
                            @error('imagen')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            {!!
                            Form::textarea('descripcion',$hotel->descripcion,['class'=>'form-control','maxlength'=>'200','rows'=>'3','required'])
                            !!}
                        </div>
                    </div>
                    {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                    <a href="{{route('hotel.index')}}" class="btn btn-danger">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </main>
    </div>
</div>
@endsection