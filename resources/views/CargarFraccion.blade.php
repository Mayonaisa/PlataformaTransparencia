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
        <h2 class="text-3xl font-bold text-gray-400 pl-[240px]">Articulo 75</h2>
        <div class="self-center -mt-4">
        <p class="text-center">Los sujetos obligados pondrán a disposición del público y mantendrán actualizada, en los respectivos medios electrónicos de acuerdo con sus facultades, atribuciones, funciones u objeto</p>
        <p class="text-center">social, según corresponda la información, por lo menos, de los temas, documentos y politicas que acontinuación se señalan</p>
        </div>
    </header>
    <main class=" flex flex-row justify-center gap-[10rem] mx-auto mt-10">
        <section>
            <h1 class="text-3xl font-bold text-gray-400">Fraccion</h1>
            <div class=" w-18">
                <select name="option" id="option" required class="">
                    <option value="option1" title="El marco normativo aplicable al sujeto obligado, en el que deberá incluirse leyes, códigos, reglamentos, decretos de creación, manuales administrativos, reglas de operación, criterios, políticas, entre otros;">I. El marco normativo aplicable</option>
                    <option value="option2" title="Su estructura orgánica completa, en un formato que permita vincular cada parte de la estructura, las atribuciones y responsabilidades que le corresponden a cada servidor público, prestador de servicios profesionales o miembro de los sujetos obligados, de conformidad con las disposiciones aplicables;">II. Su estructura orgánica completa</option>
                    <option value="option3">III. Las facultades de cada área;</option>
                    <option value="option4">Option 4</option>
                </select>
            </div>
        </section>
        
        <section class="flex flex-col gap-5">
        <h1 class=" border-2 text-green-700 text-center w-70">aqui va el departamento</h1>
        <form method="POST" action="" enctype="multipart/form-data">
        @csrf

            <div>
            <input type="file" name="documento" id="documento" accept="application/pdf" required>
            </div>
        
            <div class="mt-5">
            <label for="fracc" class="text-2xl font-bold text-gray-400">Nombre de la fracción</label><br>
            <input type="text" name="fracc" class=" w-[19rem]" id="">
            </div>

            <div class=" mt-1">
            <label for="Desc" class="text-2xl font-bold text-gray-400">Descripción</label><br>
            <input type="text" name="Desc" class=" w-[19rem]" id="">
            </div>

            <div class="flex flex-col items-center mt-5">
                <label for="guardado" class="text-xl font-bold text-gray-400">Subir</label>
                <input type="image" src="{{ asset('imagenes/subir.png') }}" class=" w-[4rem] h-[4rem]"  value="" name="guardado">
            </div>
            
        </form>
        </section>
    </main>
</body>
</html>