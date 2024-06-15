<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>
        * {
            font-family: Montserrat, sans-serif;
            font-weight: 500;
        }

        body {
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        h1 {
            text-align: center;
        }

        p {
            font-size: 13px;
            margin: 0 1rem;
        }

        .center {
            text-align: center;
        }

        .Wrapper {
            display: block;
            margin: auto;
            max-width: 700px;
            background-color: #E8E8E8;
        }
    </style>
</head>

<body>
    <div style="background-color: #E8E8E8; margin:0 auto; width: fit-content;">
        <h3>Estimado {{ $datos->nombre }} {{ $datos->apellido }}</h3>

        <p>Su cuenta de acceso a Aeneta ha sido creada. Para ingresar utilice las siguientes credenciales:</p>

        <p>Correo electrónico: {{ $user->email }}</p>
        <p>Contraseña: {{ $user->password }}</p>
        <p class="center"><a href="{{ route('login') }}"></a></p>

    </div>
</body>

</html>
