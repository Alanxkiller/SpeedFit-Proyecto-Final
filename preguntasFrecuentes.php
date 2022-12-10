<?php
    include "header.php";
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Colocamos favicon con puro html -->
    <link REL="SHORTCUT ICON" HREF="img/SpeedFit.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <!-- Bootstrap CSS para iconos de redes sociales -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Nuestro CSS -->
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bayon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilosIndex/responsive.css">
    <script src="https://kit.fontawesome.com/1cd1525fc0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/styleMain.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        var a = 0;
        var b = 0;
        var c = 0;
        var d = 0;
        var e = 0;
        var f = 0;
    $(document).ready(function(){
        $("#1b").hide();
        $("#2b").hide();
        $("#3b").hide();
        $("#4b").hide();
        $("#5b").hide();
        $("#6b").hide();
      $("#1a").click(function(){
          if (a == 0){
              $("#1b").show(); 
              a = 1;
          }else{
              $("#1b").hide();
              a =0;
          }
      });
      $("#2a").click(function(){
          if (b == 0){
              $("#2b").show(); 
              b = 1;
          }else{
              $("#2b").hide();
              b =0;
          }
      });
      $("#3a").click(function(){
          if (c == 0){
              $("#3b").show(); 
              c = 1;
          }else{
              $("#3b").hide();
              c =0;
          }
      });
      $("#4a").click(function(){
          if (d == 0){
              $("#4b").show(); 
              d = 1;
          }else{
              $("#4b").hide();
              d =0;
          }
      });
      $("#5a").click(function(){
          if (e == 0){
              $("#5b").show(); 
              e = 1;
          }else{
              $("#5b").hide();
              e =0;
          }
      });
      $("#6a").click(function(){
          if (f == 0){
              $("#6b").show(); 
              f = 1;
          }else{
              $("#6b").hide();
              f =0;
          }
      });
    });
    </script>

    <title>Preguntas Frecuentes</title>
  </head>
<body>
    <div id="container ans">
        <h2 id="1a">Pregunta 1.</h2> <br>
        <h4 id="1b">Respuesta 1.</h4>
    </div><br><br>
    <div id="container ans">
        <h2 id="2a">Pregunta 2.</h2> <br>
        <h4 id="2b">Respuesta 2.</h4>
    </div><br><br>
    <div id="container ans">
        <h2 id="3a">Pregunta 3.</h2> <br>
        <h4 id="3b">Respuesta 3.</h4>
    </div ><br><br>
    <div id="container ans">
        <h2 id="4a">Pregunta 4.</h2><br>
        <h4 id="4b">Respuesta 4.</h4>
    </div><br><br>
    <div id="container ans">
        <h2 id="5a">Pregunta 5.</h2><br>
        <h4 id="5b">Respuesta 5.</h4>
    </div><br><br>
    <div id="container ans">
        <h2 id="6a">Pregunta 6.</h2><br>
        <h4 id="6b">Respuesta 6.</h4>
    </div><br><br>
</body>
</html>