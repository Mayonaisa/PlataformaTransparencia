<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de utilidades</title>
    <style>
        .Contenedor{
            display: flex;
            flex-direction: column;
        }
        .trimestres{
            
        }
    </style>
</head>
<body>
<div style="text-align: center;">
        <h1>Contador de Trimestres</h1>
    </div>
    
    <div style="text-align: left; margin-left: 20px;">
        <form id="yearForm" method="POST" action="{{ route('change_year') }}">
            @csrf
            <label for="year">Cambiar año:</label>
            <div>
                <button type="button" onclick="decrementYear()">▼</button>
                <input type="number" id="year" name="year" value="2024" readonly>
                <button type="button" onclick="incrementYear()">▲</button>
            </div>
        </form>
    </div>
    
    <div style="text-align: center; margin-top: 50px;">
        <h3>Obligaciones trimestrales (Art 48, que remite al Art. 46)</h3>
        <div class="trimestres">
           <br>
           @php
               $letras=['a','b','c','d'];
           @endphp
            <a href="{{ route('trimestre', ['trimestre' => 1]) }}">1ER TRIMESTRE</a>
            <a href="{{ route('trimestre', ['trimestre' => 2]) }}">2DO TRIMESTRE</a>
            <a href="{{ route('trimestre', ['trimestre' => 3]) }}">3ER TRIMESTRE</a>
            <a href="{{ route('trimestre', ['trimestre' => 4]) }}">4TO TRIMESTRE</a>
        </div>
        <div class="Contenedor">
             <p>I. Información contable</p>
             @foreach ($Obligaciones as $key=>$obligacion)
                 <a href="{{ route('descargarpdf', ['archivo' => $obligacion->nombre.'.pdf']) }}">{{$obligacion->nombre}}</a>

             @endforeach
             
        </div>

    </div>
   
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
</body>
</html>