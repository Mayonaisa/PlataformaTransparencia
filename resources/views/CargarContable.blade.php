<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Obligacion</title>
    @vite('resources/css/app.css')

</head>
<body class="container">
    <header class="mx-auto flex flex-col pt-[100px] gap-9" id="header">
        <h1 class="text-5xl font-bold text-green-600 self-center">Portal de obligaciones de transparencia </h1>
        <h2 class="text-3xl font-bold text-gray-400 pl-[240px]" id="titulo">Articulo 44</h2> {{--luego aquí se va a cambiar para que diga el articulo seleccionado--}}
    </header>
    <main class=" flex flex-row justify-center gap-[10rem] mx-auto mt-10">
        <section>
            <h1 class="text-3xl font-bold text-gray-400">Tipo</h1>
            <div class=" w-18">
            <form id='subir' method="POST" action="{{route('guardararchivo')}}" enctype="multipart/form-data">
            @csrf
                <select class=" w-[420px]" name="option" id="option" required class="">
                    @foreach ($contDoc as $key=>$Doc ){
                        <option value="{{$Doc->id}}">{{$Doc->nombre}}</option>
                    }
                    @endforeach
                </select>
            </div>
        </section>
        
        <input type="hidden" name="contDoc" id="contDoc" value="">

        <section class="flex flex-col gap-5">
        <h1 class=" border-2 text-green-700 text-center w-70"></h1>
        

            <div>
            <input type="file" name="documento" id="documento" accept="application/pdf" required>
            </div>
        
            <div class="mt-5">
            <label for="nombre" class="text-2xl font-bold text-gray-400">Nombre</label><br>
            <input type="text" name="nombre" class=" w-[19rem]" id="nombre" required>
            </div>

            <div class=" mt-1">
            <label for="Desc" class="text-2xl font-bold text-gray-400">Nota (opcional)</label><br>
            <input type="text" name="descripcion" class=" w-[19rem]" id="descripcion">
            </div>
            <div class=" flex gap-4">
                <div>
                    <h1 class="text-xl font-bold text-gray-400">Trimestre</h1>
                    <select class=" w-[70px] mt-1" name="trimestre" id="trimestre" required class="">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-400">Año</h1>
                    <input class=" mt-1 w-[100px]  border rounded-md focus:outline-none focus:ring focus:border-blue-300" type="number" id="año" name="año" value="2023">
                </div>
                <div class="">
                    <h1 class="text-xl font-bold text-gray-400">Hipervinculo</h1>
                    <input class=" ml-[44%] mt-4" type="checkbox" name="hipervinculo" id="hipervinculo">
                </div>
                
            </div>
            
            @csrf
            <div id="divSubir" class="flex flex-col items-center">
                <label for="guardado" class="text-xl font-bold text-gray-400">Subir</label>
                <input type="image" src="{{ asset('imagenes/subir.png') }}" class=" w-[4rem] h-[4rem]"  value="" name="guardado">
            </div>
            
        </form>
        </section>
    </main>
    <script>

        const form = document.getElementById('subir');
        const divSubir = document.getElementById('divSubir');
        const selectFraccion = document.getElementById('option');
        const fraccionIdInput = document.getElementById('contDoc');
        divSubir.addEventListener('click', function(event) {
        if (event.target.nodeName === 'INPUT') {
            fraccionIdInput.value = selectFraccion.value;
            event.preventDefault();
            form.submit();
        }
    });
    </script>
</body>
</html>