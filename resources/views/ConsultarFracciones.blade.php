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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                {{-- <form id='fracciones' method="POST" action="{{route('desplegar')}}" enctype="multipart/form-data">
                @csrf --}}
                    <div class="grid grid-cols-1 w-[350px] text-center ml-[380px] mt-7 border-2">
                        @foreach ($fracciones as $key=>$fraccion)
                        <div class="border-2" id="{{$fraccion->id}}">{{$fraccion->nombre}}</div>
                        @endforeach
                    </div>
                    <input type="hidden" name="fraccion_id" id="fraccion_id" value="">
                {{-- </form> --}}
            </section>
            
        <section class="ml-[70px]">
        <p class="text-3xl font-bold text-gray-400 ml-[10px] w-18 mb-7 text-center">fraccion seleccionada</p>
            <div class="grid grid-cols-1 w-[350px] text-center ml-[380px] mt-7 border" id="divFrac">
                <div class="border">Seleccionar una Fraccion.</div>
                {{-- <div class="border">
                    <span class="title">FIIA 2DO TRIM 2023 ABRIL A JUNIO 2023</span>
                    <p style="padding: 0;">Fecha de actualizacion: 30/06/2023<br>   ESTRUCTURA ORGÁNICA    </p>
                    <p style="padding: 0;">Archivo.xlsx</p>
                </div> --}}
            </div>
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
    //function getDownloadUrl(obliId) {
    //    return "{{ route('descargarpdf', ['archivo' => "+ obliId +"]) }}"   ;
    //}

    $(document).ready(function() {
  const divs = document.querySelectorAll('.border-2');
  const fraccionIdInput = document.getElementById('fraccion_id');
  const tabla = document.getElementById('divFrac');

  divs.forEach((div) => {
    div.addEventListener('click', function(event) {
      fraccionIdInput.value = this.getAttribute('id');
      tabla.innerHTML = '';
      $.ajax({
        url: "{{ route('desplegar') }}",
        type: "POST",
        data: {
          _token: "{{ csrf_token() }}",
          fraccion_id: fraccionIdInput.value
        },
        success: function(response) {
          var obligacion = response.obligacion;
          var fragmento = response.fragmento;

          fragmento.forEach(function(fragm) {
            const fra = document.createElement('div');
            fra.setAttribute('class', 'border');
            let frag = fragm.id;
            fra.innerHTML = fragm.nombre;
            tabla.appendChild(fra);

            obligacion.forEach(function(obli) {
              if (obli.fragmento == frag) {
                const fra2 = document.createElement('div');
                fra2.setAttribute('class', 'border');
                fra2.innerHTML =
                  "<b>" +
                  obli.nombre +
                  "</b><p style='padding: 0;'>Fecha de actualizacion: " +
                  obli.updated_at +
                  "<br>   " +
                  obli.descripcion +
                  "    </p><a style='padding: 0; color:#16a340;' data-id='" +
                  obli.id +
                  "'>" +
                  obli.archivo +
                  "</a>";
                tabla.appendChild(fra2);

                // Agregar evento click al elemento <a> creado
                const link = fra2.querySelector('a');
                link.addEventListener('click', function(event) {
                  event.preventDefault();
                  const obliId = this.getAttribute('data-id');
                  // Realizar la segunda petición AJAX para descargar el archivo
                  $.ajax({
                    url: "/descarga/" + obliId,
                    type: "GET",
                    success: function(response) {
                      // Descargar el archivo o procesar la respuesta de descarga
                      console.log("Archivo descargado");
                      // Por ejemplo, si quieres redirigir al archivo para que se descargue directamente:
                      window.location.href = response.downloadUrl;
                    },
                    error: function(xhr, status, error) {
                      console.log("Error en la petición de descarga:", error);
                    }
                  });
                });
              }
            });
          });
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    });
  });
});
</script>
</html>
