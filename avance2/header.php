<?php
  date_default_timezone_set('America/Mexico_City'); //para que todo el sistema sepa la zona horaria
  session_start();
  ?>
<!doctype html>
<html lang="es">
  <head>
    <link REL="SHORTCUT ICON" HREF="img/SpeedFit.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <!-- Bootstrap CSS para iconos de redes sociales -->
    
    <script src="https://kit.fontawesome.com/1cd1525fc0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


    <title>Speedfit</title>
  </head>
  <body>
  <!-- carrusel-->
  <header>
    <!--fs: font size, sirve para cambiar el tamanio de la letra-->
    <!--btn-primary cambiar color boton, hace el color azulito lindo mi corazon-->
    <nav  class="navbar navbar-expand-lg navbar-light p-3"  id="menu">
        <div class="container">
          <a class="navbar-brand" href="inicio.php">
            <img src="img/SpeedFit.png" height="70px" >
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="inicio.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Acerca de</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Contactanos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.facebook.com/people/Speedfit/100085451631969/"><i class="fa-brands fa-facebook"></i></a>
              </li>
              
            <li class="nav-item">
                <a class="nav-link" href="">Ayuda</a>
              </li>
              
            </ul>
            <form class='d-flex'>
            <?php
              if(isset($_SESSION["usuario"])){
                echo "<a class='nav-link' href='logout.php'>Log-out\</a>";
                echo $_SESSION['usuario'];
              }else{
                echo "<a class='nav-link' href='comprobarLogin.php'>Log-in</a>";              }
            ?>
            </form>
            
          </div>

        </div>
      </nav>
</header>
  </body>
  
</html>
