<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de obligaciones</title>
    @vite('resources/css/app.css')
    
</head>
<body>
    <header class="container mx-auto flex flex-col pt-[100px] gap-9">
        <h1 class="text-5xl font-bold text-green-600 self-center">Portal de obligaciones de transparencia </h1>
        <h2 class="text-3xl font-bold text-gray-400 pl-[240px]">Articulo 75</h2>
        <div class="self-center -mt-4">
        <p class="text-center">Los sujetos obligados pondrán a disposición del público y mantendrán actualizada, en los respectivos medios electrónicos de acuerdo con sus facultades, atribuciones, funciones u objeto</p>
        <p class="text-center">social, según corresponda la información, por lo menos, de los temas, documentos y politicas que acontinuación se señalan</p>
        </div>
    </header>

    <main class="mt-6 flex">
        <section>
            <h1 class="text-3xl font-bold text-gray-400 ml-[370px] text-center">Fracciones</h1>
            <div class="grid grid-cols-1 w-[350px] text-center ml-[380px] mt-7 border-2">
                <div class="border-2" id="marcoN">I. El marco normativo aplicable al sujeto obligado, en el que deberá incluirse leyes, códigos, reglamentos, decretos de creación, manuales administrativos, reglas de operación, criterios, políticas, entre otros;</div>
                <div class="border-2">Item 2</div>
                <div class="border-2">Item 3</div>
            </div>
        </section>
        
    <section class="ml-[70px]">
    <p class="text-3xl font-bold text-gray-400 ml-[110px] w-12 text-center">fraccion seleccionada</p>
    <table class="border-2 w-[400px]">
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
        </tbody>
    </table>
    </section>
    <section class="ml-24 mt-20">
        <div>
            <a href="">subir</a>
        </div>
        <div class="mt-12">
            <a href="">Revisar</a>
        </div>
    </section>

    </main>
</body>
<script>
    const contenedorTabla = document.getElementById('marcoN');
    const norm=document.getElementById('normas');
    contenedorTabla.addEventListener('click',expandirTabla);
    function expandirTabla() {
        /*
    if (contenedorTabla.style.display === 'none') {
        contenedorTabla.style.display = 'block';
    } else {
        contenedorTabla.style.display = 'none';
    }
    */
}
</script>
</html>