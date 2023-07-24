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
</head>
<body>
    <main>
        <header>
            <article>
                <h2>2023</h2>
                <h3>primer trimestre</h3>
            </article>
        
        </header>
        <section>
            <form method="POST" action="/guardarpdf" enctype="multipart/form-data">
        @csrf
            <div>
            <input type="file" name="documento" id="documento" accept="application/pdf">
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