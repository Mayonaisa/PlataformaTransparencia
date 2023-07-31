<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de utilidades</title>
    <link rel="stylesheet" href="{{ asset('css/SubirArchivos.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
    
</head>
<body style="background-color: #F5F5F5;justify-content: center;height: 100vh;align-items: center;margin: 0; position: relative;">
    <div style="background-color: white;display: flex;justify-content: center;align-items: center;height: 40vh;width: 50vw;">
        <form method="POST" action="/guardarpdf" enctype="multipart/form-data">
        @csrf

            <input type="file" name="documento" id="documento" accept="application/pdf">
            <input type="submit" value="guardar">
        </form>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    </div>
    <div style="background-color: white;display: grid;height: 40vh;width: 50vw;position: absolute;grid-template-columns: 1fr 1fr;">
        <div style="background-color: #9e94a6;height: 40vh;">
        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fracciones as $key=>$fraccion)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$fraccion->nombre}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <div style="background-color: #b1a6ba;height: 40vh;">
        </div>
    </div>
</body>
</html>