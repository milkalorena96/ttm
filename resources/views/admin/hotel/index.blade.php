@extends('layouts.config')
@section('content')
@include('admin.admin')

<div id="layoutSidenav">
    @include('admin.sidebar')

    <div id="layoutSidenav_content">
        <main class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <br>
                    <br>
                    <p>Hoteles</p>
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{\Session::get('success')}}</li>
                        </ul>
                    </div>
                    @endif
                    <a href="{{route('hotel.create')}}" class="btn btn-primary float-right">NUEVO</a>
                    <div>
                        <nav class="navbar navbar-light">
                            <form class="form-inline">
                                <input name="busqueda" class="form-control mr-sm-2" type="search" placeholder="Ingrese RUC" aria-label="Search" autocomplete="off">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                
                            </form>
                        </nav>
                        <table class="table table-responsive table-hover">
                            <thead>
                                <th>RUC</th>
                                <th>Nombre Hotel</th>
                                <th>Lugar Turistico</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @forelse ($hoteles as $item)
                                <tr>
                                    <td>{{$item->ruc}}</td>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->lugar->nombre}}</td>
                                    <td>
                                        <a href="/admin/hotel/{{$item->slug}}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-eye"></i>&nbsp;Ver</a>
                                        <a href="/admin/hotel/{{$item->slug}}/edit" class="btn btn-sm btn-warning">Editar</a>
                                        {!!Form::open(['method'=>'DELETE','route'=>['restaurante.destroy',$item->id],'class'=>'formEliminar','style'=>'display:inline'])!!}
                                        {!!Form::submit('Eliminar',['class'=>'btn btn-sm btn-danger']) !!}
                                        {!!Form::close() !!}


                                    </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>

                        </table>
                        {{ $hoteles->links('vendor.pagination.default') }}
                    </div>    
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    (function () {
    'use strict'
  //debemos crear la clase formEliminar dentro del form del boton borrar
  //recordar que cada registro a eliminar esta contenido en un form  
  var forms = document.querySelectorAll('.formEliminar')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {        
          event.preventDefault()
          event.stopPropagation()        
          Swal.fire({
                title: '¿Estás seguro de eliminar el registro?',
                text:  '!No podrás revertir esto!',       
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '!Sí, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                    Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
                }
            })                      
      }, false)
    })
})()
</script>
@endsection