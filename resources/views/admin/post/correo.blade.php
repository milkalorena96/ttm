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
                    <p>Lista de Correos</p>
                    <div>
                        <nav class="navbar navbar-light">
                            <form class="form-inline">
                                <input name="busqueda" class="form-control mr-sm-2" type="search" placeholder="Ingrese nombre" aria-label="Search" autofocus autocomplete="off">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                
                            </form>
                        </nav>
                        <table class="table table-responsive table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Recibido</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @forelse ($correos as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->created_at->diffForHUmans()}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary " href="{{ route('correo.show',$item->id) }}"><i
                                                class="fa fa-fw fa-eye"></i> &nbsp;Ver</a>
                                        {!!
                                        Form::open(['method'=>'post','route'=>['correo.destroy',$item->id],'style'=>'display:inline'])
                                        !!}
                                        @csrf
                                        @method('DELETE')
                                        {!! Form::submit('Eliminar',['class'=>'btn btn-sm btn-danger','onclick'=>'return confirm("ESTA SEGURO DE ELIMINAR")']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>

                        </table>
                        {{ $correos->links('vendor.pagination.default') }}
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection