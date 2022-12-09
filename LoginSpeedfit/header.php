<?php
  include "servidor.php";
  date_default_timezone_set('America/Mexico_City'); //para que todo el sistema sepa la zona horaria
  if(!isset($_SESSION['admin'])){
    $_SESSION['admin'] = false;
  }
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

    <link rel="stylesheet" href="estilos/styleHeader.css">

    <title>Speedfit</title>
  </head>
  <body>
  <!-- carrusel-->
    <nav  class="navbar navbar-expand-lg"  id="menu">
        <div class="container">
          <a class="navbar-brand" href="../index.php">
            <img src="images/SpeedFit.png" height="70px" >
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Acerca de</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Contactanos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.facebook.com/people/Speedfit/100085451631969/" target="blank"><i class="fa-brands fa-facebook"></i></a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Ayuda</a>
              </li>
              <?php if($_SESSION['admin']) { ?>
              <li class="nav-item">
                <a class="nav-link" href="../pagAdmin/formulario.php">Admin</a>
              </li>
              <?php } ?>
              
            </ul>
            <form class='d-flex' style="display:flex; align-items:center;">
            <?php
              if(isset($_SESSION["username"])){?>
                <?php echo "<span style='color:#eee'>".$_SESSION['username']."</span>"; ?>
                <a class='nav-link' href='index.php?logout=1' >Log-out</a>
                
              <?php  } else { ?>
                <a class='nav-link' href='index.php' style='color:white'>Log-in</a>";              
              <?php } ?>
            </form>
            
          </div>

        </div>
      </nav>

  </body>
  
</html>
