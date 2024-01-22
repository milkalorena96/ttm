@extends('layouts.config')
@section('content')
@include('admin.admin')

<div id="layoutSidenav">
    @include('admin.sidebar')

    <div id="layoutSidenav_content">
        <main class="container-fluid">
            <div class="row">
                <div class="col-sm-10">
                    <br>
                    <p>Usuarios</p>
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{\Session::get('success')}}</li>
                            </ul>
                        </div>
                    @endif
                    <a href="{{route('user.create')}}" class="btn btn-primary float-right">NUEVO</a>
                    <table class="table table-responsive table-hover">
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @forelse ($users as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <a href="{{ route('user.edit',$item->id)}}" class="btn btn-sm btn-warning">Editar</a>
                                    {!! Form::open(['method'=>'DELETE','route'=>['user.destroy',$item->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Eliminar',['class'=>'btn btn-sm btn-danger','onclick'=>'return confirm("ESTA SEGURO DE ELIMINAR")']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection