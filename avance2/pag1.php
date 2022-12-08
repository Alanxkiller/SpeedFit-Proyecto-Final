<?php
    include "header.php";

  ?>
<!doctype html>
<html lang="es">
  <head>
    <script src="https://kit.fontawesome.com/1cd1525fc0.js" crossorigin="anonymous"></script>
    <!-- Colocamos favicon con puro html -->
    <link REL="SHORTCUT ICON" HREF="img/SpeedFit.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <!-- Bootstrap CSS para iconos de redes sociales -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Nuestro CSS -->
    <link rel="stylesheet" href="">
    
    <script src="https://kit.fontawesome.com/1cd1525fc0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


    <title>Speedfit</title>
  </head>
  <body>
  <!-- carrusel-->
  <header>
      <img src="img/portada.jpeg" alt="portada" style="width:100%;">
      
      <?php
        $msg = "*poner cupones*";
        ?>
      
      <div class="container">
                 <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                     <div class="form-row align-items-center" style="width:20%;">
                         <label for="inlineFormInputName">Suscribete:</label>
                         <div class="col-sm-8 my-1">
                             <label class="sr-only" for="inlineFormInputName">Email</label>
                             <input type="text" class="form-control" id="inlineFormInputName" placeholder="Tu correo" name="mail">
                         </div>
                         <div class="col-auto my-1">
                             <button type="submit" class="btn btn-dark" style="width:50%;">Enviar</button>
                         </div>
                     </div>
                 </form>
             </div>
             
             <?php    
   
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $mail = $_POST['mail'];
                mail($mail,"Suscripcion",$msg);
            ?>
            <div class="alert alert-success" role="alert">
              Suscripcion realizada! Revisa tu correo.
            </div>
     <?php            
            }             
     ?>
     
     <div>
         <div id="demo">
            <button class="btnaiuda" type="button" onclick="loadDoc()"> Centro de ayuda  <i class="fa-solid fa-question"></i></button>
            </div>

            <script>
            function loadDoc() {
              const xhttp = new XMLHttpRequest();
              xhttp.onload = function() {
                document.getElementById("demo").innerHTML =
                this.responseText;
              }
              xhttp.open("GET", "centroAyuda.txt");
              xhttp.send();
            }
            </script>
     </div>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</header>
  </body>
  
</html>
