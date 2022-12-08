<?php

include "header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/contacto.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <style>
        <?php include "styles/styleHeader.css"; ?>
    </style>
    <title>Contacto</title>
</head>
<body>
    <h2 class="form-title">¿Tienes algún problema? Contáctanos</h2>
    <form action="contacto.php" method="post" class="form">
        <div class="input-div email-input">
            <label for="">Correo</label>
            <input type="email" name="email" id="email" placeholder="usuario@mail.com" required>
        </div>
        <div class="input-div msg-input">
            <label for="">Mensaje</label>
            <textarea name="msg" id="msg" cols="30" rows="10" placeholder="¿En qué podemos ayudarte?" required ></textarea>
        </div>
        <p class="input-div">El mensaje será enviado a speedfit24@gmail.com</p>
        <input type="submit" value="Enviar" name="submit" id="submit">
    </form>

    <!-- Código para mandar el correo con la información -->
    <?php if(isset($_POST['submit'])){ 
        $mensaje = $_POST['msg'];
        $desde = "Enviado desde: ".$_POST['email'].". Enviado el: ".date("d/m/Y");    
        $para = "speedfit24@gmail.com";
        mail($para, "Comentario de Usuario", $mensaje, $desde);
    ?>

    <p class="send-msg">Gracias por sus comentarios. Nuestro equipo está atendiendo su situación</p>
    
    <?php } ?>
</body>
</html>