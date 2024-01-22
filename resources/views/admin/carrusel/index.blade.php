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
                    <p>Carrusel</p>
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{\Session::get('success')}}</li>
                        </ul>
                    </div>
                    
                    @endif
                    <a href="{{route('carrusel.create')}}" class="btn btn-primary float-right">NUEVO</a>
                    <div>
                        <nav class="navbar navbar-light">
                            <form class="form-inline">
                                <input name="busqueda" class="form-control mr-sm-2" type="search" placeholder="Ingrese Descripción" aria-label="Search" autocomplete="off" value="{{old('busqueda')}}">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                
                            </form>
                        </nav>
                    <table class="table table-responsive table-hover">
                        <thead>
                            <th>Orden</th>
                            <th>Imagen</th>
                            <th>Descripcion</th>
                            <th>Acción</th>
                        </thead>
                        <tbody>
                            @forelse ($carrusels as $item)
                            <tr>
                                <td>{{$item->orden}}</td>
                                <td><img src="/img/carrusel/{{$item->imagen}}" width="300"></td>
                                <td>{{$item->descripcion}}</td>
                                <td>
                                    <a href="{{ route('carrusel.edit',$item->id)}}" class="btn btn-sm btn-warning">Editar</a>
                                    {!! Form::open(['method'=>'DELETE','route'=>['carrusel.destroy',$item->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Eliminar',['class'=>'btn btn-sm btn-danger','onclick'=>'return confirm("ESTA SEGURO DE ELIMINAR")']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>

                    </table>
                    {{ $carrusels->links('vendor.pagination.default') }}
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection
