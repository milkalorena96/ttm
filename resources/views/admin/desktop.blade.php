@extends('layouts.config')
@section('content')
@include('admin.admin')

<div id="layoutSidenav">
@include('admin.sidebar')

    <div id="layoutSidenav_content">
        <main class="container-fluid">
                <div>
                    <br>
                    <br>
                    <h2>
                        Tingo Maria puerta de la Amazonia Peruana.
                    </h2>
                    <h3 data-aos="fade-up">Turismo para momentos especiales</h3>
                </div>
        </main> 
    </div>
        
</div>

@endsection