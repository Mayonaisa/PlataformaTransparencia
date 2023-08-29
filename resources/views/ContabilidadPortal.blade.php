
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
    <h1 class="text-5xl font-bold text-green-600 text-center mt-4">Ley General de Contabilidad Gubernamental</h1>
    </header>
    <main class="flex flex-row mt-10 justify-center gap-10 mr-[120px]">
        <section class="">
            <div>
                <form id="yearForm" method="POST" action="{{ route('cambiarAño') }}">
                    @csrf
                    <label for="year">Cambiar año:</label>
                    <div class=" flex gap-3 mt-3 -ml-2">
                        
                        <input class=" hidden  border rounded-md focus:outline-none focus:ring focus:border-blue-300" type="number" id="year" name="year" value="{{$año}}" max="{{$año}}" readonly>
                        <p class=" text-3xl mt-5" id="yearValue">{{$año}}</p>
                        <div class=" flex flex-col w-9">
                            <button type="button" onclick="incrementYear()" class=" border-2 h-10 text-center text-xl">▲</button>
                            <button type="button" onclick="decrementYear()" class=" border-2 h-10 text-center text-xl">▼</button>
                            
                        </div>
                        
                    </div>
                
            </div>
        </section>
        <section class=" w-[60%] flex flex-col">
            <div class="border-2 w-[100%] h-10 text-left">
                <p class=" mt-2">Obligaciones trimestrales (Art 48, que remite al Art. 46)</p>
            </div>
            <div class="border-x-2 w-[100%] h-[5vh] justify-evenly flex text-center text-green-600 mt-2">
                <input type="hidden" name="trimestre" id="trimestreInput">
                <a id="tri1" class=" tri w-[25%]   hover:text-green-500  active:text-green-300" href="">1ER TRIMESTRE</a>
                <a id="tri2"  class=" tri w-[25%]  hover:text-green-500  active:text-green-300" href="">2DO TRIMESTRE</a>
                <a id="tri3" class=" tri w-[25%]  hover:text-green-500  active:text-green-300" href="">3ER TRIMESTRE</a>
                <a id="tri4" class=" tri w-[25%] hover:text-green-500   active:text-green-300" href="">4TO TRIMESTRE</a>
                
            </div>
            </form>
            <div class="border-x-2">
                <div class="cv">
                    <p class=" ml-6">I. Información contable:</p>
                    @foreach ($documentoCont as  $key=>$docuCont )
                        @if ($docuCont->tipo=="Información contable")
                            <p class=" ml-6">{{$contLetras[$key]}}) {{$docuCont->nombre}}</p>
                            @foreach ($obligacionCont as  $key2=>$obliCont )
                            
                                @if ($docuCont->id==$obliCont->cont_documento)
                                    <p class=" ml-[80px]">{{$obliCont->notas}}</p>
                                    <a href="{{ route('descargarContpdf', ['id' => $obliCont->id]) }}" class="ml-6 text-green-700">{{$obliCont->nombre}}</a>
                                    
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    <p class=" ml-6">II. Información presupuestaria:</p>
                    @php
                        $cont2=0;
                    @endphp
                    @foreach ($documentoCont as  $key3=>$docuCont )
                        @if ($docuCont->tipo=="Información presupuestaria")
                        <p class=" ml-6">{{$contLetras[$cont2]}}) {{$docuCont->nombre}}</p>
                        @php
                        $cont2++;
                        @endphp
                                    @foreach ($obligacionCont as  $key2=>$obliCont )
                                
                                        @if ($docuCont->id==$obliCont->cont_documento)
                                                 <p class=" ml-6">{{$obliCont->notas}}</p>
                                                <a href="{{ route('descargarContpdf', ['id' => $obliCont->id]) }}" class="ml-6 text-green-700">{{$obliCont->nombre}}</a>
                                                
                                        @endif
                                    @endforeach
                        @endif
                    @endforeach

                    <p class=" ml-6">III. Información programática:</p>
                    @php
                        $cont2=0;
                    @endphp
                    @foreach ($documentoCont as  $key3=>$docuCont )
                        @if ($docuCont->tipo=="Información programática")
                        <p class=" ml-6">{{$contLetras[$cont2]}}) {{$docuCont->nombre}}</p>
                        @php
                        $cont2++;
                        @endphp
                                    @foreach ($obligacionCont as  $key2=>$obliCont )
                                
                                        @if ($docuCont->id==$obliCont->cont_documento)
                                                 <p class=" ml-6">{{$obliCont->notas}}</p>
                                                <a href="{{ route('descargarContpdf', ['id' => $obliCont->id]) }}" class="ml-6 text-green-700">{{$obliCont->nombre}}</a>
                                                
                                        @endif
                                    @endforeach
                        @endif
                    @endforeach

                    <p class=" ml-6">IV. Otra Información de la Ley General de Contabilidad Gubernamental:</p>
                    @php
                        $cont2=0;
                    @endphp
                    @foreach ($documentoCont as  $key3=>$docuCont )
                        @if ($docuCont->tipo=="Otra Información de la Ley General de Contabilidad Gubernamental")
                        <p class=" ml-6">{{$contLetras[$cont2]}}) {{$docuCont->nombre}}</p>
                        @php
                        $cont2++;
                        @endphp
                                    @foreach ($obligacionCont as  $key2=>$obliCont )
                                
                                        @if ($docuCont->id==$obliCont->cont_documento)
                                                 <p class=" ml-6">{{$obliCont->notas}}</p>
                                                <a href="{{ route('descargarContpdf', ['id' => $obliCont->id]) }}" class="ml-6 text-green-700">{{$obliCont->nombre}}</a>
                                                
                                        @endif
                                    @endforeach
                        @endif
                    @endforeach
                </div>
            
            </div>
            <div class="border-x-2 border-b-2 w-[100%] h-[60vh] pt-7">
             
          
             
        </div>

        </section>

        <section class=" mt-20 text-center">
            
            @if(Session::has('rol') && (Session::get('rol') == 4 || Session::get('rol') == 5))
                <div>
                    <p class="text-xl font-bold text-gray-400">subir</p>
                    <a href="{{ route('mostrarCargar') }}"><img src="{{ asset('imagenes/subir.png') }}" class=" w-[4rem] h-[4rem]" alt=""></a>
                </div>
            @endif
            @if(Session::has('rol') && Session::get('rol') == 4)
                <div class="mt-12">
                    <p class="text-xl font-bold text-gray-400">revisar</p>
                    <a href="{{ route('mostrarAprobar') }}"><img src="{{ asset('imagenes/subir.png') }}" class=" w-[4rem] h-[4rem]" alt=""></a>
                </div>
            @endif
            
        </section>
    </main>
</body>
<script>
        function incrementYear() {
            const currentDate = new Date();
            const currentYear = currentDate.getFullYear();
            let yearInput = document.getElementById('year');
            if (yearInput.value<currentYear){
                yearInput.value = parseInt(yearInput.value) + 1;
                const yearValueElement = document.getElementById('yearValue');
                yearValueElement.textContent = yearInput.value;
                console.log(yearValueElement.textContent);
                submitForm();
            }
            else{
                yearInput.value = parseInt(currentYear);
                const yearValueElement = document.getElementById('yearValue');
                yearValueElement.textContent = yearInput.value;
                console.log(yearValueElement.textContent);
                submitForm();
            }
     
            
        }

        function decrementYear() {
            const currentDate = new Date();
            const currentYear = currentDate.getFullYear();
            let yearInput = document.getElementById('year');
            if (yearInput.value<=currentYear){
                yearInput.value = parseInt(yearInput.value) - 1;
                const yearValueElement = document.getElementById('yearValue');
                yearValueElement.textContent = yearInput.value;
                console.log(yearValueElement.textContent);
                submitForm();
            }
            else{
                yearInput.value = parseInt(currentYear);
                const yearValueElement = document.getElementById('yearValue');
                yearValueElement.textContent = yearInput.value;
                console.log(yearValueElement.textContent);
                submitForm();
            }
            
        }

        function submitForm() {
            let tri = document.getElementById('trimestreInput');
            document.getElementById('yearForm').submit();
        }

    </script>
    <script>
        $(document).ready(function(){
            let tri = document.getElementById('trimestreInput');
            tri.value=1;

            let todos=$('.tri')
            $('#tri1').click(function(){
                event.preventDefault();
                let yearInput = document.getElementById('year');
                let tri = document.getElementById('trimestreInput');
                tri.value=1;
                document.getElementById('yearForm').submit();


                /*
                let moveButton = $(this);
                let moveMe = $('#barra');

                todos.removeClass('text-green-800');
                this.classList.add('text-green-800');
                
               

                moveMe.animate({
                    'margin-left': '0px'
                    
                }, 100);
                */
                      
            });
            
            $('#tri2').click(function(){
                
                event.preventDefault();
                let yearInput = document.getElementById('year');
                let tri = document.getElementById('trimestreInput');
                tri.value=2;
                document.getElementById('yearForm').submit();

                /*
                let moveButton = $(this);
                let moveMe = $('#barra');
                <div class=" bg-green-800 w-[25%] h-[4px] -mt-1 rounded-lg transition-transform" id="barra"></div>
                todos.removeClass('text-green-800');
                this.classList.add('text-green-800');
                
                

                moveMe.animate({
                    'margin-left': '25%'
                }, 100);
                */       
            });
            $('#tri3').click(function(event){
                event.preventDefault();
                let yearInput = document.getElementById('year');
                let tri = document.getElementById('trimestreInput');
                tri.value=3;
                document.getElementById('yearForm').submit();

                /*
                let moveButton = $(this);
                let moveMe = $('#barra');

                todos.removeClass('text-green-800');
                this.classList.add('text-green-800');

                moveMe.animate({
                    'margin-left': '50%'
                }, 100);     
                */  
            });
            $('#tri4').click(function(event){
                event.preventDefault();
                let yearInput = document.getElementById('year');
                let tri = document.getElementById('trimestreInput');
                tri.value=4;
                document.getElementById('yearForm').submit();

                /*
                let moveButton = $(this);
                let moveMe = $('#barra');

                todos.removeClass('text-green-800');
                this.classList.add('text-green-800');
                
                moveMe.animate({
                    'margin-left': '75%'
                }, 100);       
                */
            });
            
             
            
        });
    </script>
</html>