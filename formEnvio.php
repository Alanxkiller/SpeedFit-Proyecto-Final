<?php
require 'tabEnvio.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos/styleLogin.css">
    <title>Formulario de envío</title>
</head>
<body>
    <h2>¿A dónde quieres que te llegue tu pedido?</h2>
    <form  method="post" action="formEnvio.php" class="">
    
        <div class="input-group">
            <label>Nombre completo:</label>
            <input type="text" name="nombreC" class="input" value="" required>
        </div>
        <div class="input-group">
            <label>Correo Electrónico:</label>
            <input type="email" name="email" class="input" value="" required>
        </div>
        <div class="input-group">
            <label>Dirección:</label>
            <input type="text" name="direccion" class="input" value="" required>
        </div>
        <div class="input-group">
            <label>Ciudad:</label>
            <input type="text" name="ciudad" class="input" value="" required>
        </div>
        <div class="input-group">
            <label>País:</label>
            <input type="text" name="pais" class="input" value="" required>
        </div>
        <div class="input-group">
            <label>Código postal:</label>
            <input type="number" name="cp" class="input" value="" required>
        </div>
        <div class="input-group">
            <label>Número telefónico:</label>
            <input type="number" name="tel" class="input" value="" required>
        </div>
        <div class="form-input">
            <button id="envio-btn" name="envio-btn">Aceptar</button>
        </div>
        
        
        <p> <a href="">Volver</a></p>
    </form> 
</body>
</html>