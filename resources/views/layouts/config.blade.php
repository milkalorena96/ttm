<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/img/configuracion/{{$config->urlfavicon}}" type="image/png" />
    <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : ''}}">

    <title>Web Turistico</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link href="/css/style.css" rel="stylesheet">

    <!-- ===== CSS ===== -->
	<link rel="stylesheet" href="/css/demo/style.css">
    <link rel="stylesheet" href="/css/bulma.min.css">
    
    @yield('css')

    <script src="/js/all.min.js"></script>
    <script src="/js/feather.min.js"></script>
</head>

<body class="nav-fixed">
    
            @yield('content')

    
    <!-- Custom scripts for all pages-->
    <script src="/js/script.js"></script>
    
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/sb-customizer.js"></script>
        
    @yield('js')
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

        $(document).ready(function(){
            $('#btnbuscar').click(function(){
                var numdni=$('#ruc').val();
                if (numdni!='') {
                    $.ajax({
                        url:"{{ route('buscarsunat') }}",
                        method:'GET',
                        data:{ruc:numdni},
                        dataType:'json',
                        success:function(data){
                            var resultados=data.entidad['success'];
                            if (resultados==true) {
                            var razon=data.entidad['entity']['nombre_o_razon_social'];
                            var direccion=data.entidad['entity']['direccion'];
                            var distrito=data.entidad['entity']['distrito'];
                            var provincia=data.entidad['entity']['provincia'];
                            var departamento=data.entidad['entity']['departamento'];
                            var estado=data.entidad['entity']['estado_del_contribuyente'];
                            
                                $('#txtdni').val(numdni);
                                $('#txtrazon').val(razon);
                                $('#txtgrupo').val(estado);
                                $('#txtdireccion').val(direccion);
                                $('#txtdistrito').val(distrito);
                                $('#txtprovincia').val(provincia);
                                $('#txtdepartamento').val(departamento);
                            }else{
                                $('#txtdni').val('');
                                $('#txtrazon').val('');
                                $('#txtgrupo').val('');
                                $('#txtdireccion').val('');
                                $('#txtdistrito').val('');
                                $('#txtprovincia').val('');
                                $('#txtdepartamento').val('');                            
                                $('#mensaje').show();
                                $('#mensaje').delay(2000).hide(2500);
                            }
                        }
                    });
                }else{
                    alert('Escriba el RUC.!');
                    $('#ruc').focus();
                }   
            });
        });
    </script>

</html>