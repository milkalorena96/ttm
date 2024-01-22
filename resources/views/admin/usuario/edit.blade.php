@extends('layouts.config')
@section('content')
@include('admin.admin')

<div id="layoutSidenav">
    @include('admin.sidebar')

    <div id="layoutSidenav_content">
        <main class="container-fluid">
            <div class="row">
                <div class="col-sm-10">
                    <br />
                    {!! Form::open(['route'=>['user.update',$user],'method'=>'PUT','files'=>true]) !!}

                    <div class="jumbotron">
                        <p>Actualizar datos del usuario</p>
                        @if (\Session::has('success'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{\Session::get('success')}}</li>
                                </ul>
                            </div>
                        @endif
                        <hr>
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            {!! Form::text('name',$user->name,['class'=>'form-control','maxlength'=>'67','required']) !!}
                            @error('name')
                                <small class="text-danger" autofocus> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Correo</label>
                            {!! Form::email('email',$user->email,['class'=>'form-control','maxlength'=>'50']) !!}
                            @error('email')
                                <small class="text-danger" autofocus> {{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            {!! Form::password('password',['class'=>'form-control']) !!}
                            <p>Deje en blanco el campo contraseña si no desea modificarla.</p>
                            @error('password')
                                <small class="text-danger" autofocus> {{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class='btn btn-success'>GUARDAR</button>
                    <a href="{{route('user.index')}}" class="btn btn-danger">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </main>
    </div>
</div>
@endsection