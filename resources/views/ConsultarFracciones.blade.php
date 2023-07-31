<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de obligaciones</title>
    @vite('resources/css/app.css')
    
</head>
<body class=" w-screen overflow-x-hidden">
    <header class="container mx-auto flex flex-col pt-[100px] gap-9">
        <h1 class="text-5xl font-bold text-green-600 self-center">Portal de obligaciones de transparencia </h1>
        <h2 class="text-3xl font-bold text-gray-400 pl-[240px]">Articulo 75</h2>{{--luego aquí se va a cambiar para que diga el articulo seleccionado--}}
        <div class="self-center -mt-4">
        <p class="text-center">Los sujetos obligados pondrán a disposición del público y mantendrán actualizada, en los respectivos medios electrónicos de acuerdo con sus facultades, atribuciones, funciones u objeto</p>
        <p class="text-center">social, según corresponda la información, por lo menos, de los temas, documentos y politicas que acontinuación se señalan</p>
        </div>
    </header>
    <main class=" flex-1 container mx-auto">
        <div class="mt-6 flex">
            <section>
                <h1 class="text-3xl font-bold text-gray-400 ml-[370px] text-center">Fracciones</h1>
                <div class="grid grid-cols-1 w-[350px] text-center ml-[380px] mt-7 border-2">
                    @foreach ($fracciones as $key=>$fraccion)
                    <div class="border-2" >{{$fraccion->nombre}}</div>
                    @endforeach
                </div>
            </section>
            
        <section class="ml-[70px]">
        <p class="text-3xl font-bold text-gray-400 ml-[10px] w-18 mb-7 text-center">fraccion seleccionada</p>
        <table class="border-2 w-[400px]" id="TablaFraccion">
            <thead>
                <tr>
                    <th class="border-2"><img src="" alt=""><p>Direccion administrativa y financiera</p> <img src="" alt=""></th>
                </tr>
            </thead>
            <tbody class="shadow-lg">
                <tr>
                    <td id="normas" class="px-10">
                        hola
                    </td>
                </tr>
                <tr>
                    <td>prueba</td>
                </tr>
                <tr>
                    <td>probando</td>
                </tr>
            </tbody>
        </table>
        </section>
        <section class="ml-20 mt-20 text-center">
            <div>
                <p class="text-xl font-bold text-gray-400">subir</p>
                <a href="{{ route('CargarFraccion') }}"><img src="{{ asset('imagenes/subir.png') }}" class=" w-[4rem] h-[4rem]" alt=""></a>
            </div>
            <div class="mt-12">
                <p class="text-xl font-bold text-gray-400">revisar</p>
                <a href=""><img src="{{ asset('imagenes/subir.png') }}" class=" w-[4rem] h-[4rem]" alt=""></a>
            </div>
        </section>

        </div>
    </main>
   
    <footer>
    @include('TransparenciaPiePagina')
    </footer>
</body>
<script>
    const contenedorTabla = document.getElementById('marcoN');
    const norm=document.getElementById('TablaFraccion');
    contenedorTabla.addEventListener('click',expandirTabla);
    function expandirTabla() {
        const rows = myTable.getElementsByTagName('tr');
        alert('nomamen');
    // Toggle visibility of each table row except the first one (header row)
    for (let i = 1; i < rows.length; i++) {
      rows[i].classList.toggle('hidden');
    }
    sleep(1);
    for (let i = 1; i < rows.length; i++) {
      rows[i].classList.toggle('visible');
    }
}
</script>
</html>

