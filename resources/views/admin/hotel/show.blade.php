
@extends('layouts.config')
@section('css')
<style>
    img {
	    border: none;
    }



    #wrapper {
        width: 100%;
    }

    .preload {
        padding-top: 20px;
        text-align: center;
        display: none;
    }

    .activate-preload {
        display: block;
    }

    #container-input {
        width: 640px;
        margin: 0 auto;
        border: solid 1px #CCC;
        position: relative;
        overflow: hidden;
    }

    #container-input .wrap-file #preview-images .thumbnail {
        width: 120px;
        height: 120px;
        display: inline-block;
        vertical-align: middle;
        border: solid 2px #CCC;
        background-size: cover;
        position: relative;
    }

    #container-input .wrap-file #preview-images .thumbnail:not(:last-child) {
        margin-right: 5px;
    }

    #container-input .wrap-file #preview-images .thumbnail .close-button {
        width: 20px;
        height: 20px;
        background-color: black;
        color: white;
        text-align: center;
        position: absolute;
        top: 5px;
        right: 5px;
        border-radius: 100px;
        cursor: pointer;
    }


</style>
@endsection
@section('content')

@include('admin.admin')

<div id="layoutSidenav">
    @include('admin.sidebar')

    <div id="layoutSidenav_content">
        <main class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <span class="card-title">Nombre: <strong>{{ $hotel->nombre }}</strong></span>
                            </div>
                            <a href="{{route('hotel.index')}}" class="btn btn-danger ml-auto float-right">Cerrar</a>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <strong>Nombre: </strong>{{$hotel->nombre}}&nbsp;|
                                <strong>Ubicación: </strong>{{$hotel->ubicacion}}
                            </div>
                            <div class="form-group">
                                <strong>Departamento: </strong>{{$hotel->departamento}}&nbsp;|
                                <strong>Provincia: </strong>{{$hotel->provincia}}&nbsp;|
                                <strong>Distrito: </strong>{{$hotel->distrito}}
                            </div>
                            <div class="form-group">
                                <strong>Descripcion:</strong>
                                <textarea class="form-control" rows="2" readonly>{{ $hotel->descripcion }}</textarea>
                            </div>
                        </div>
                        <div class="card text-center">
                            <p>Subir fotos para el Hotel <strong>{{ $hotel->nombre }}</strong> </p>
                            <div class="container-fluid">
                                <form enctype="multipart/form-data" method="post" action="{{route('AgregarFotosHotel')}}">
                                
                                    <div class="file is-info has-name is-boxed">
                                        <div id="container-input">
                                            <label class="file-label">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$hotel->id}}">
                                                <input accept="image/jpg,image/jpeg,image/png" ref="fotos" multiple class="file-input hidden" id="imagen" type="file" name="fotos[]">
                                                <span class="file-cta">
                                                    <span class="file-icon">
                                                        <i class="fas fa-images"></i>
                                                    </span>
                                                    <span class="file-label">
                                                        Seleccionar fotos
                                                    </span>
                                                </span>
                                            </label>
                                            
                                            <div class="wrap-file">
                                                <div  id="preview-images">
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field"><br>
                                        <button :disabled="fotos.length <= 0" class="button is-success" type="submit">Subir fotos</button>
                                    </div>
                                
                                </form>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card text-center">
                    <p>Fotos de: <strong>{{ $hotel->nombre }}</strong> </p>
                        <div class="card-body">
                            <section id="exemple" class="container">
                                <div class="wrap">
                                    <ul id="box-container">
                                    @foreach($hotel->fotos as $foto)
                                        <li class="box">
                                            <img src="/img/hotel/fotos/{{$foto->ruta}}" alt="Placeholder image">

                                            <div class="input-group">
                                                {!!Form::open(['method'=>'DELETE','route'=>['eliminarFotoHotel',$foto->id],'class'=>'formEliminar' ])!!}
                                                {!! Form::submit('Eliminar',['class'=>'btn btn-sm btn-danger']) !!}
                                                <a href="/img/hotel/fotos/{{$foto->ruta}}" target="_blank" class="btn btn-sm btn-primary">Ver</a>
                                                {!! Form::close() !!}
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </main>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    (function () {

        'use strict'

        var file = document.getElementById('imagen');
        var formData = new FormData();

        file.addEventListener('change', function (e) {

            for ( var i = 0; i < file.name.length; i++ ) {
                var thumbnail_id = Math.floor( Math.random() * 30000 ) + '_' + Date.now();
                createThumbnail(file, i, thumbnail_id);
                formData.append(thumbnail_id, file.files[i]);
            }

            e.target.value = '';

        });
        var createThumbnail = function (file, iterator, thumbnail_id) {
            var thumbnail = document.createElement('div');
            thumbnail.classList.add('thumbnail', thumbnail_id);
            thumbnail.dataset.id = thumbnail_id;

            thumbnail.setAttribute('style', `background-image: url(${ URL.createObjectURL( file.files[iterator] ) })`);
            document.getElementById('preview-images').appendChild(thumbnail);
            createCloseButton(thumbnail_id);
        }

        var createCloseButton = function (thumbnail_id) {
            var closeButton = document.createElement('div');
            closeButton.classList.add('close-button');
            closeButton.innerText = 'x';
            document.getElementsByClassName(thumbnail_id)[0].appendChild(closeButton);
        }

        var clearFormDataAndThumbnails = function () {
            for ( var key of formData.keys() ) {
                formData.delete(key);
            }

            document.querySelectorAll('.thumbnail').forEach(function (thumbnail) {
                thumbnail.remove();
            });
        }

        document.body.addEventListener('click', function (e) {
            if ( e.target.classList.contains('close-button') ) {
                e.target.parentNode.remove();
                formData.delete(e.target.parentNode.dataset.id);
            }
        });

        })();
</script>

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
                    title: '¿Estás seguro de eliminar la foto?',
                    text:  '!No podrás revertir esto!',      
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire('¡Eliminado!', 'Su archivo ha sido eliminado.', 'success');
                        this.submit();
                    }
                })                      
        }, false)
        })
    })()
</script>
@endsection

