<!DOCTYPE html>
<html>

<head>
    <title>Message</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <style>
    html,
    body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }
    </style>
</head>

<body>
    <br />
    <div class="container box" style="width: 970px;">
        <h2 style="text-align:left;"><strong>De: </strong> {{ $data['email'] }} </h2>
        <h2 style="text-align:left;"><strong>Asunto: </strong> {{ $data['subject'] }} </h2>
        <h2 style="text-align:left;"><strong>Nombre: </strong> {{ $data['nombre'] }} </h2>
        <h2><strong>Mensaje: </strong> {{ $data['mensaje'] }}</h2>
    </div>
</body>

</html>