<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de contabilidad gubernamental</title>
    @vite('resources/css/app.css')
    <script
			  src="https://code.jquery.com/jquery-3.7.0.js"
			  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
			  crossorigin="anonymous"></script>
</head>
<body>
    <header>
    @include('PortalCabecera')
    <h1 class="text-5xl font-bold text-green-600 text-center">Ley General de Contabilidad Gubernamental</h1>
    </header>
    <main class="flex flex-row mt-10 justify-center gap-10 mr-[120px]">
        <section class="">
            <div>
                <form id="yearForm" method="POST" action="{{ route('change_year') }}">
                    @csrf
                    <label for="year">Cambiar año:</label>
                    <div>
                        <button type="button" onclick="decrementYear()" class=" border-2">▼</button>
                        <input class="  border rounded-md focus:outline-none focus:ring focus:border-blue-300" type="number" id="year" name="year" value="2023" readonly>
                        <button type="button" onclick="incrementYear()" class=" border-2">▲</button>
                    </div>
                </form>
            </div>
        </section>
        <section class=" w-[60%] flex flex-col">
            <div class="border-2 w-[100%] h-10 text-left">
                <p class=" mt-2">Obligaciones trimestrales (Art 48, que remite al Art. 46)</p>
            </div>
            <div class="border-2 w-[100%] h-[5vh] justify-evenly flex text-center text-green-600">
                <a class="w-[25%] border-r-2 border-b-2 hover:text-green-500 active:border-b-green-700 active:text-green-700" href="{{ route('trimestre', ['trimestre' => 1]) }}">1ER TRIMESTRE</a>
                <a id="trimestre" class="w-[25%] border-r-2 border-b-2 hover:text-green-500 active:border-b-green-700 active:text-green-700" href="{{ route('trimestre', ['trimestre' => 2]) }}">2DO TRIMESTRE</a>
                <a class="w-[25%] border-r-2 border-b-2 hover:text-green-500 active:border-b-green-700 active:text-green-700" href="{{ route('trimestre', ['trimestre' => 3]) }}">3ER TRIMESTRE</a>
                <a class="w-[25%] hover:text-green-500 border-b-2 active:border-b-green-700 active:text-green-700" href="{{ route('trimestre', ['trimestre' => 4]) }}">4TO TRIMESTRE</a>
                
            </div>
            <div class="border-x-2">
           
            </div>
            <div class="border-x-2 border-b-2 w-[100%] h-[60vh] pt-7">
             <p>I. Información contable</p>
             @foreach ($Obligaciones as $key=>$obligacion)
                 <a href="{{ route('descargarpdf', ['archivo' => $obligacion->nombre.'.pdf']) }}">{{$obligacion->nombre}}</a>

             @endforeach
             
        </div>

        </section>

        <section class=" mt-20 text-center">
            <div>
                <p class="text-xl font-bold text-gray-400">subir</p>
                <a href=""><img src="{{ asset('imagenes/subir.png') }}" class=" w-[4rem] h-[4rem]" alt=""></a>
            </div>
            <div class="mt-12">
                <p class="text-xl font-bold text-gray-400">revisar</p>
                <a href=""><img src="{{ asset('imagenes/subir.png') }}" class=" w-[4rem] h-[4rem]" alt=""></a>
            </div>
        </section>
    </main>
</body>
<script>
        function incrementYear() {
            var yearInput = document.getElementById('year');
            yearInput.value = parseInt(yearInput.value) + 1;
            submitForm();
        }

        function decrementYear() {
            var yearInput = document.getElementById('year');
            yearInput.value = parseInt(yearInput.value) - 1;
            submitForm();
        }

        function submitForm() {
            document.getElementById('LeyContabilidad').submit();
        }

        
    </script>
    <script>
        $(document).ready(function(){
            /*
            $('#trimestre').click(function(event){
                event.preventDefault();
                let moveButton = $('#trimestre');
                let moveMe = $('#barra');
                let pos=moveButton.offset();
                let distanceX = pos.left - moveMe.offset().left;
                let distanceY = pos.top - moveMe.offset().top;

                console.log(pos);

                moveMe.animate({
                    'left': '100px',
                }, 1000, function() {
                    // Animation complete - reset the div's position
                    
                });       
            });
             <div class=" bg-green-800 w-[23%] h-2" id="barra"></div>
            */
        });
    </script>
</html>