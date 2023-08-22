<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-screen h-18 overflow-hidden flex flex-row justify-between bg-[#f5faf5] border-b-2 shadow-md border-slate-400 ">
        <div class=" ml-[10%] flex">
            <div class=" h-[70px] w-[70px]"><img src="{{ asset('imagenes/sapaLogo.png') }}" alt=""></div>
             <div class=" flex flex-col justify-center">
            <p>ORGANISMO OPERADOR MUNICIPAL DEL SISTEMA DE AGUA POTABLE,</p>
            <p> ALCANTARILLADO Y SANEAMIENTO DE LA PAZ</p>
        </div>
        </div>
        
        <form class=" mt-5 mr-16" method="POST" action="{{ route('logout') }}">
            @csrf
            <button class=" "  type="submit">Cerrar sesión</button>
        </form>
    </div>
</body>
</html>