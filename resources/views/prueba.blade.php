<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de utilidades</title>
    <link rel="stylesheet" href="{{ asset('css/SubirArchivos.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
    
</head>
<body>
    <main>
        <header>
            <h1>Ley general de contabilidad gubernamental</h1>
        </header>
        <section>
            <p></p>
            <form method="POST" action="/guardarpdf" enctype="multipart/form-data">
        @csrf
       
            <div class="fecha">
                    <h2>{{$añoActual}}</h2>
                    <h3>1er trimestre</h3>
            </div>

            <div class="select">
                <select name="option" id="option" required>
                    <option value="option1">I. información contable</option>
                    <option value="option2" .className="flex">Option 2</option>
                    <option value="option3">Option 3</option>
                    <option value="option4">Option 4</option>
                </select>
            </div>

            <div>
            <input type="file" name="documento" id="documento" accept="application/pdf" required>
            </div>
        
            <div>
            <label for="nombreDocu">Nombre del documento</label>
            <input type="text" name="nombreDocu" id="">
            </div>

            <div class="Guardar">
            <label for="guardado">Subir</label>
            <input type="submit" value="guardar" name="guardado">
            </div>
            
        </form>
        </section>

        <section>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Cerrar sesión</button>
            </form>
        </section>
    
    </main>
    
</body>
</html>