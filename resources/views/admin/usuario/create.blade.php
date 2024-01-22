@extends('layouts.config')
@section('content')
@include('admin.admin')

<div id="layoutSidenav">
    @include('admin.sidebar')

    <div id="layoutSidenav_content">
        <main class="container-fluid">
            <div class="row">
                <div class="col-sm-10">
                    {!! Form::open(['route'=>['user.store'],'method'=>'POST','files'=>true]) !!}
                    <div class="jumbotron">
                        <p>Registro de usuario</p>
                        @if (\Session::has('success'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{\Session::get('success')}}</li>
                                </ul>
                            </div>
                        @endif
                        <hr>
                        <div class="form-group">
                            <label for="name">INGRESE Nombre</label>
                            {!! Form::text('name',null ,['class'=>'form-control','maxlength'=>'50', 'required']) !!}
                            @error('name')
                                <small class="text-danger" autofocus> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">INGRESE Correo</label>

                            {!! Form::email('email',null ,['class'=>'form-control','maxlength'=>'50', 'value'=>"{{old('email')}}",'required']) !!}
                                @error('email')
                                    <small class="text-danger" autofocus> {{$message}}</small>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">INGRESE Contreseña</label>
                            {!! Form::password('password', ['class'=>'form-control']) !!}
                            @error('password')
                                    <small class="text-danger" autofocus> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">CONFIRMAR Contreseña</label>
                            {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                            @error('password_confirmation')
                                    <small class="text-danger" autofocus> {{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class='btn btn-success'>GUARDAR</button>
                    <a href="{{route('user.index')}}" class="btn btn-danger">Cancelar</a>
                    {!! Form::close() !!}
                    
                </div>
                <br>
            </div>
        </main>
    </div>
</div>

@endsection