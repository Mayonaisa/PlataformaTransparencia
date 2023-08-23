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
        <h2 class="text-3xl font-bold text-gray-400 pl-[240px]" id="titulo">Articulo 75</h2> {{--luego aquí se va a cambiar para que diga el articulo seleccionado--}}
        <div class="self-center -mt-4">
        <p class="text-center" id="p1">Los sujetos obligados pondrán a disposición del público y mantendrán actualizada, en los respectivos medios electrónicos de acuerdo con sus facultades, atribuciones, funciones u objeto</p>
        <p class="text-center" id="p2">social, según corresponda la información, por lo menos, de los temas, documentos y politicas que acontinuación se señalan</p>
        </div>
    </header>
    <main class=" flex flex-row justify-center gap-[10rem] mx-auto mt-10">
    @if(Session::has('success'))
        <div class="bg-green-300 text-green-800 p-3 mb-4" style="position: fixed;
  width: 30%;
  height: 10%;
  top: 0;">
            {{ Session::get('success') }}
        </div>
    @endif
        <section>
            <h1 class="text-3xl font-bold text-gray-400">Fraccion</h1>
            <div class=" w-18">
            <form id='subir' method="POST" action="{{route('guardararchivo')}}" enctype="multipart/form-data">
            @csrf
                <select class=" w-[420px]" name="option" id="option" required class="">
                    @foreach ($fracciones as $key=>$fraccion)
                    <option value='{{$fraccion->id}}'>{{$fraccion->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </section>
        
        <input type="hidden" name="fraccion_id" id="fraccion_id" value="">
         <input type="hidden" name="articulo" id="articulo" value="">

        <section class="flex flex-col gap-5">
        <h1 class=" border-2 text-green-700 text-center w-70">{{$departamento->nombre}}</h1>
        

            <div>
            <input type="file" name="documento" id="documento" accept=".pdf,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
            </div>
        
            <div class="mt-5">
            <label for="fracc" class="text-2xl font-bold text-gray-400">Título</label><br>
            <input type="text" name="titulo" class=" w-[19rem]" id="titulo" required>
            </div>

            <div class=" mt-1">
            <label for="Desc" class="text-2xl font-bold text-gray-400">Descripción</label><br>
            <input type="text" name="descripcion" class=" w-[19rem]" id="descripcion" required>
            </div>

            <div class=" mt-1">
                <input type="checkbox" id="check" name="check"> Hipervinculo
            </div>
            @csrf
            <div id="divSubir" class="flex flex-col items-center mt-5">
                <label for="guardado" class="text-xl font-bold text-gray-400">Subir</label>
                <input type="image" src="{{ asset('imagenes/subir.png') }}" class=" w-[4rem] h-[4rem]"  value="" name="guardado">
            </div>
            
        </form>
        </section>
    </main>
    <script>
        const header = document.getElementById('header');
        const ley = sessionStorage.getItem('ley');
        let titulo = document.getElementById('titulo');
        let p1 = document.getElementById('p1');
        let p2 = document.getElementById('p2');
        if(sessionStorage.getItem('ley') == 76)
        {
            titulo.innerHTML = "Articulo "+ ley;
            p1.innerHTML = "Además de lo señalado en el artículo anterior de la presente Ley, el Poder Ejecutivo y sus Dependencias, los Ayuntamientos y la Administración Pública Municipal, deberán poner a disposición";
            p2.innerHTML = "del público y actualizar la siguiente información.";
            header.appendChild(titulo);
            header.appendChild(p1);
            header.appendChild(p2);
        }
        else
        {
            titulo.innerHTML = "Articulo "+ ley;
            p1.innerHTML = "Los sujetos obligados pondrán a disposición del público y mantendrán actualizada, en los respectivos medios electrónicos de acuerdo con sus facultades, atribuciones, funciones u objeto";
            p2.innerHTML = "social, según corresponda la información, por lo menos, de los temas, documentos y politicas que acontinuación se señalan";
            header.appendChild(titulo);
            header.appendChild(p1);
            header.appendChild(p2);
        }

        const form = document.getElementById('subir');
        const divSubir = document.getElementById('divSubir');
        const selectFraccion = document.getElementById('option');
        const fraccionIdInput = document.getElementById('fraccion_id');
        const fraccionArt = document.getElementById('articulo');
        divSubir.addEventListener('click', function(event) {
        if (event.target.nodeName === 'INPUT') {
            fraccionIdInput.value = selectFraccion.value;
            fraccionArt.value = sessionStorage.getItem('ley');
            event.preventDefault();
            form.submit();
        }
    });
    </script>
</body>
</html>