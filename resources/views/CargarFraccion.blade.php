<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Obligacion</title>
    @vite('resources/css/app.css')
</head>
<body class="container">
    <header class="mx-auto flex flex-col pt-[100px] gap-9">
        <h1 class="text-5xl font-bold text-green-600 self-center">Portal de obligaciones de transparencia </h1>
        <h2 class="text-3xl font-bold text-gray-400 pl-[240px]">Articulo 75</h2> {{--luego aquí se va a cambiar para que diga el articulo seleccionado--}}
        <div class="self-center -mt-4">
        <p class="text-center">Los sujetos obligados pondrán a disposición del público y mantendrán actualizada, en los respectivos medios electrónicos de acuerdo con sus facultades, atribuciones, funciones u objeto</p>
        <p class="text-center">social, según corresponda la información, por lo menos, de los temas, documentos y politicas que acontinuación se señalan</p>
        </div>
    </header>
    <main class=" flex flex-row justify-center gap-[10rem] mx-auto mt-10">
        <section>
            <h1 class="text-3xl font-bold text-gray-400">Fraccion</h1>
            <div class=" w-18">
            <form id='subir' method="POST" action="{{route('guardararchivo')}}" enctype="multipart/form-data">
            @csrf
                <select name="option" id="option" required class="">
                    @foreach ($fracciones as $key=>$fraccion)
                    <option value='{{$fraccion->id}}'>{{$fraccion->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </section>
        
        <input type="hidden" name="fraccion_id" id="fraccion_id" value="">

        <section class="flex flex-col gap-5">
        <h1 class=" border-2 text-green-700 text-center w-70">{{$departamento->nombre}}</h1>
        

            <div>
            <input type="file" name="documento" id="documento" accept="application/pdf" required>
            </div>
        
            <div class="mt-5">
            <label for="fracc" class="text-2xl font-bold text-gray-400">Título</label><br>
            <input type="text" name="titulo" class=" w-[19rem]" id="titulo" required>
            </div>

            <div class=" mt-1">
            <label for="Desc" class="text-2xl font-bold text-gray-400">Descripción</label><br>
            <input type="text" name="descripcion" class=" w-[19rem]" id="descripcion" required>
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
    const form = document.getElementById('subir');
    const divSubir = document.getElementById('divSubir');
    const selectFraccion = document.getElementById('option');
    const fraccionIdInput = document.getElementById('fraccion_id');
    divSubir.addEventListener('click', function(event) {
        if (event.target.nodeName === 'INPUT') {
            fraccionIdInput.value = selectFraccion.value;
            event.preventDefault();
            form.submit();
        }
    });
    </script>
    {{-- @if(session('error'))
        <div class="alert alert-success alert-block">
            {{ session('error') }}
        </div>
    @endif --}}
</body>
</html>