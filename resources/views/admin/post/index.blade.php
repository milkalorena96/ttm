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
                    <br>
                    <p>Lista de Blogs</p>
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{\Session::get('success')}}</li>
                        </ul>
                    </div>
                    @endif
                    <a href="{{route('post.create')}}" class="btn btn-primary float-right">NUEVO</a>
                    <div>
                        <nav class="navbar navbar-light">
                            <form class="form-inline">
                                <input name="busqueda" class="form-control mr-sm-2" type="search" placeholder="Ingrese nombre" aria-label="Search" autocomplete="off">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                
                            </form>
                        </nav>
                        <table class="table table-responsive table-hover">
                            <thead>
                                <th>Orden</th>
                                <th>imagen</th>
                                <th>Nombre</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @forelse ($posts as $item)
                                <tr>
                                    <td>{{$item->orden}}</td>
                                    <td><img src="/img/post/{{$item->imagen}}" width="300"></td>
                                    <td>{{$item->nombre}}</td>
                                    <td>
                                
                                        <a href="{{ route('post.edit',$item->id)}}" class="btn btn-sm btn-warning">Editar</a>
                                        {!! Form::open(['method'=>'DELETE','route'=>['post.destroy',$item->id],'style'=>'display:inline'])!!}
                                        {!! Form::submit('Eliminar',['class'=>'btn btn-sm btn-danger','onclick'=>'return confirm("ESTA SEGURO DE ELIMINAR")']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>

                        </table>
                        {{ $posts->links('vendor.pagination.default') }}
                    </div>    
                </div>
            </div>
        </main>
    </div>
</div>
@endsection