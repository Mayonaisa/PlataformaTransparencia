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
            <div class="border-x-2 w-[100%] h-[5vh] justify-evenly flex text-center text-green-600 mt-2">
                <a id="tri1" class=" tri w-[25%]   hover:text-green-500  active:text-green-300" href="{{ route('trimestre', ['trimestre' => 1]) }}">1ER TRIMESTRE</a>
                <a id="tri2"  class=" tri w-[25%]  hover:text-green-500  active:text-green-300" href="{{ route('trimestre', ['trimestre' => 2]) }}">2DO TRIMESTRE</a>
                <a id="tri3" class=" tri w-[25%]  hover:text-green-500  active:text-green-300" href="{{ route('trimestre', ['trimestre' => 3]) }}">3ER TRIMESTRE</a>
                <a id="tri4" class=" tri w-[25%] hover:text-green-500   active:text-green-300" href="{{ route('trimestre', ['trimestre' => 4]) }}">4TO TRIMESTRE</a>
                
            </div>
            <div class="border-x-2">
            
            </div>
            <div class="border-x-2 border-b-2 w-[100%] h-[60vh] pt-7">
             <p>I. Información contable</p>
             @foreach ($Obligaciones as $key=>$obligacion)
                 <a href="{{ route('descargarpdf', $obligacion->id) }}" class=" text-green-600">{{$obligacion->nombre}}</a>

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
            let todos=$('.tri')
            $('#tri1').click(function(){
                <div class=" bg-green-800 w-[25%] h-[4px] -mt-1 rounded-lg transition-transform" id="barra"></div>
                let moveButton = $(this);
                let moveMe = $('#barra');

                todos.removeClass('text-green-800');
                this.classList.add('text-green-800');
                
               

                moveMe.animate({
                    'margin-left': '0px'
                    
                }, 100);
                      
            });
            $('#tri2').click(function(){
                
                let moveButton = $(this);
                let moveMe = $('#barra');
                
                todos.removeClass('text-green-800');
                this.classList.add('text-green-800');
                
                

                moveMe.animate({
                    'margin-left': '25%'
                }, 100);       
            });
            $('#tri3').click(function(event){
               
                let moveButton = $(this);
                let moveMe = $('#barra');

                todos.removeClass('text-green-800');
                this.classList.add('text-green-800');

                moveMe.animate({
                    'margin-left': '50%'
                }, 100);       
            });
            $('#tri4').click(function(event){
                
                let moveButton = $(this);
                let moveMe = $('#barra');

                todos.removeClass('text-green-800');
                this.classList.add('text-green-800');
                
                moveMe.animate({
                    'margin-left': '75%'
                }, 100);       
            });
            */
             
            
        });
    </script>
</html>