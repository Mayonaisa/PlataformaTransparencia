<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comprobante de obligación</title>
    <link href="{{ asset('css/comprobante.css') }}" rel="stylesheet">

</head>
<body>
    <header >
        <table class="Cabecera">
            <tbody>
                <tr class="Titulo">
                    <td class="T2">
                        <img class="Imagen" src="{{ asset('imagenes/sapaLogo.png') }}" alt="">
                    </td>
                    <td class="C2">
                        <div class="Barra"></div>
                    </td>
                    <td class="C3">
                        <p class="Dependencia">OOMSAPAS <br> LA PAZ, BCS</p>
                    </td>
                    <td>
                        <div class="Lugar">
                            <h1>Contraloria municipal</p>
                            <h2>Subdirección de Vinculación para la Transparencia y <br> Acceso a la información Publica</p>
                        </div>
                    </td>
                </tr>
            </tbody>

        </table>
    </header>
    <main class="Contenido">
        <h1>COMPROBANTE DE FORMATO</h1>
        <table class="Info">
            <tr>
                <td class="campos">
                    ID:
                </td>
                <td class="datos">
                       {{$obligacion->id}}
                </td>
            </tr>
            <tr>
                <td class="campos">
                    Movimiento:
                </td>
                <td class="datos">
                    REGISTRO
                </td>
            </tr>
            <tr>
                <td class="campos">
                    Sujeto obligado:
                </td>
                <td class="datos">
                {{$sujeto->nombre}}
                
                </td>
            </tr>
            <tr>
                <td class="campos">
                    Fecha:
                </td>
                <td class="datos">
                {{$obligacion->created_at}}
                </td>
            </tr>
            <tr>
                <td class="campos">
                Normatividad:
                </td>
                <td class="datos">
                LEY GENERAL DE TRANSPARENCIA Y ACCESO A
                LA INFORMACION PUBLICA
                </td>
            </tr>
            <tr>
                <td class="campos">
                Articulo:
                </td>
                <td class="datos">
                {{$obligacion->articulo}}
                </td>
            </tr>
            <tr>
                <td class="campos">
                Fraccion:
                </td>
                <td class="datos">
                {{$result}}
                </td>
            </tr>
            <tr>
                <td class="campos">
                Usuario:
                </td>
                <td class="datos">
                {{$sujeto->nombre}}
                </td>
            </tr>
            <tr>
                <td class="campos">
                Estado:
                </td>
                <td class="datos">
                {{$obligacion->estado}}
                </td>
            </tr>
        </table>
    </main>
</body>
</html>