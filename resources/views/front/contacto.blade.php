@extends('layouts.appfront')
@section('content')
@include('front.carrusel')

<section class="ftco-section testimony-section pt-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <h2 class="mb-2">{{__("Contact Us")}}</h2>

            </div>
        </div>
        <div class="row" style="background-color:#e6e6e6;">
            <div class="col-sm-7 p-3">
                <h2>{{__("Contact datas")}}</h2>
                <ul>
                    <li><strong>Razón Social:</strong> {{$config->razonsocial}} </li>
                    <li><strong>Dirección:</strong> {{$config->direccion}}</li>
                    <li><strong>Celular:</strong> {{$config->celular}}</li>
                    <li><strong>Correo:</strong> <a style="color:blue" href="mailto:{{$config->email}}">{{ $config->email }}</a></li>

                </ul>

                <h2 class="mt-5">{{__("Form")}}</h2>
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{\Session::get('success')}}</li>
                    </ul>
                </div>
                @endif
                <form action="{{url('contacto')}}" method="post" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nombre">{{__("Name")}}</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="{{__('Name')}}"
                            value="{{old('nombre')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">{{__("Email")}}</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com"
                            value="{{old('email')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="subject">{{__("Subject")}}</label>
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="{{__('Subject')}}"
                            value="{{old('subject')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="mensaje">{{__("Message")}}</label>
                        <textarea class="form-control" name="mensaje" id="mensaje" rows="3"></textarea>
                    </div>
                    <input type="submit" class="btn btn-danger" name="btnenviar" value="{{ __('Send Message')}}">

                </form>
            </div>
            <div class="col-sm-5 p-1">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11913.009962906148!2d-76.00456621983486!3d-9.297661642184442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2spe!4v1623997288457!5m2!1ses-419!2spe"
                    width="100%" height ="100%" class="vh-200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
        </div>
    </div>
    <div class="degree-left-footer"></div>
</section>

@endsection
