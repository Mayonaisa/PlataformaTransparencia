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
</head>
<body>
    <form method="POST" action="/guardarpdf" enctype="multipart/form-data">
    @csrf
        <input type="file" name="documento" id="documento" accept="application/pdf">
        <input type="submit" value="guardar">
    </form>
</body>
</html>