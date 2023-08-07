<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de obligaciones</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
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

    <main class="mt-6 flex" style="display: flex; justify-content: center;">
        <section>
            <h1 class="text-3xl font-bold text-gray-400 ml-[370px] text-center">Fracciones</h1>
            {{-- <div class="grid grid-cols-1 w-[350px] text-center ml-[380px] mt-7 border-2">
                <div class="border-2" id="marcoN">I. El marco normativo aplicable al sujeto obligado, en el que deberá incluirse leyes, códigos, reglamentos, decretos de creación, manuales administrativos, reglas de operación, criterios, políticas, entre otros;</div>
                <div class="border-2">Item 2</div>
                <div class="border-2">Item 3</div>
            </div> --}}
            <div class=" w-18">
                <select id="select" required class="" style="max-width: 450px;">
                    @foreach ($fracciones as $key=>$fraccion)
                    <option value='{{$fraccion->id}}'>{{$fraccion->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </section>
        
    <section class="ml-[70px]">
    <p class="text-3xl font-bold text-gray-400 ml-[110px] w-12 text-center">fraccion seleccionada</p>
    {{-- <table class="border-2 w-[400px] table-auto">
        <thead>
            <tr>
                <th class="border-2"><img src="" alt=""><p>Direccion administrativa y financiera</p> <img src="" alt=""></th>
            </tr>
        </thead>
        <tbody class="shadow-lg">
            <tr class="w-30">
                <td id="normas" class="px-10 flex gap-10 text-left w-30">
                    <p class="break-words w-[220px]">holaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                    <div class="flex gap-3 mt-6 ml-6">
                        <div style="background-color: #D6FFDA; border: none; cursor: pointer; height: 35px; border-radius: 5px; width: 35px; text-align: center;">
                            <a href="" style="color: white; font-size: 1em;" class="fa fa-check"></a>
                        </div>
                        <div style="background-color: #F19C99; border: none; cursor: pointer; height: 35px; border-radius: 5px; width: 35px; text-align: center;">
                            <a href="" style="color: white; font-weight: bold; font-size: 1.5em;">&#215;</a>
                        </div>
                    </div>
                    
                </td>
            </tr>
        </tbody>
    </table> --}}
    <div class="grid grid-cols-1 w-[350px] text-center ml-[400px] mt-7 border" id="divFrac">
                <div class="border">Seleccionar una Fraccion.</div>
                {{-- <div class="border">
                    <span class="title">FIIA 2DO TRIM 2023 ABRIL A JUNIO 2023</span>
                    <p style="padding: 0;">Fecha de actualizacion: 30/06/2023<br>   ESTRUCTURA ORGÁNICA    </p>
                    <p style="padding: 0;">Archivo.xlsx</p>
                </div> --}}
            </div>
    </section>

    </main>
</body>
<script>
    $(document).ready(function() {
    //const divs = document.querySelectorAll('.border-2');
    const select = document.getElementById('select');
    const options = select.querySelectorAll('option');
    //let fraccionIdInput;
    const tabla = document.getElementById('divFrac');


    select.addEventListener('change', function(event) {
        const opcionSeleccionada = event.target.value;
      //fraccionIdInput.value = this.getAttribute('id');
      tabla.innerHTML = '';
      $.ajax({
        url: "{{ route('desplegar') }}",
        type: "POST",
        data: {
          _token: "{{ csrf_token() }}",
          fraccion_id: opcionSeleccionada,
          tipo: "subido"
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
                const checkIcon = document.createElement('div');
                    checkIcon.style.backgroundColor = '#D6FFDA';
                    checkIcon.style.border = 'none';
                    checkIcon.style.cursor = 'pointer';
                    checkIcon.style.height = '35px';
                    checkIcon.style.borderRadius = '5px';
                    checkIcon.style.width = '35px';
                    checkIcon.style.textAlign = 'center';
                    checkIcon.innerHTML = "<a href='/aprobar/"+obli.id+"' style='color: white; font-size: 1em;' class='fa fa-check'></a>";
                const crossIcon = document.createElement('div');
                    crossIcon.style.backgroundColor = '#F19C99';
                    crossIcon.style.border = 'none';
                    crossIcon.style.cursor = 'pointer';
                    crossIcon.style.height = '35px';
                    crossIcon.style.borderRadius = '5px';
                    crossIcon.style.width = '35px';
                    crossIcon.style.textAlign = 'center';
                    crossIcon.innerHTML = "<a href='/rechazar/"+obli.id+"' style='color: white; font-weight: bold; font-size: 1.5em;'>&#215;</a>";
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
                  "' href='/descarga/"+obli.id+"'>" +
                  obli.archivo +
                  "</a>";
                fra2.appendChild(checkIcon);
                fra2.appendChild(crossIcon);
                tabla.appendChild(fra2);
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

</script>
</html>