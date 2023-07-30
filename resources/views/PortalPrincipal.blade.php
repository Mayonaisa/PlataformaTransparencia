<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de obligaciones inicio</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div>
    @include('PortalCabecera')
    </div>
    <header class="w-50 mt-6 text-center">
        <h1 class="text-5xl font-bold text-green-600 self-center">Portal de obligaciones de transparencia </h1>
        <div class=" mt-10 text-sm">
            <p class="">
                En esta sección el Organismo Operador Municipal Del Sistema De Agua Potable, 
                Alcantarillado Y Saneamiento De La Paz difunde y mantiene actualizadas las obligaciones de 
                transparencia en
            </p>
            <p>
                los términos y condiciones de la Ley de Transparencia y Acceso a la Información
                Pública del Estado de Baja California Sur y los Lineamientos Técnicos generales para la Publicación, 
                
            </p>
            <p>
                Homologación y Estandarización de la Información de las Obligaciones establecidas en el Título Quinto y en la fracción IV del artículo 31 
                de la Ley General de Transparencia y Acceso a la 
            </p>
            <p> Información Pública, que deben de difundir los sujetos obligados en los portales 
                de internet y en la Plataforma Nacional de Transparencia. 
            </p>
        </div>
       
    </header>
    <main class="flex flex-row justify-center mt-8 gap-10">

        <a class=" w-[250px] h-[400px] border-2 rounded-[2rem]" href="">
            <h2 class="text-3xl font-bold text-green-600 text-center mt-3">Articulo 75</h2>
            <p class=" mt-4 mx-5 text-left">Los sujetos obligados pondrán a disposición del público y mantendrán actualizada, en los respectivos medios electrónicos, de acuerdo con sus facultades, atribuciones, funciones u objeto social, según corresponda la información, por lo menos, de los temas, documentos y políticas que a continuación se señalan</p>
        </a>
        <a class=" w-[250px] h-[400px] border-2 rounded-[2rem]" href="">
            <h2 class="text-3xl font-bold text-green-600 text-center mt-3">Articulo 76</h2>
            <p class=" mt-4 mx-5 text-left">Además de lo señalado en el artículo anterior de la presente Ley, el Poder Ejecutivo y sus Dependencias, los Ayuntamientos y la Administración Pública Municipal, deberán poner a disposición del público y actualizar la siguiente información.</p>
        </a>
        <div class=" flex flex-col gap-6">
            <a class=" border-2 w-[250px] h-[190px] rounded-[2rem]" href="">
                <h3 class="text-base font-bold text-green-600 text-center mt-5">Solicite información pública</h3>
                <img class=" ml-5" src="{{ asset('imagenes/plataformaTrans.png') }}" alt="">
            </a>
            <a class=" border-2 w-[250px] h-[190px] rounded-[2rem]"  href="">
                <h2 class="text-2xl font-bold text-green-600 text-center mt-3 leading-loose">Portal de obligaciones de transparencia</h2>
            </a>
        </div>
    </main>
</body>
</html>