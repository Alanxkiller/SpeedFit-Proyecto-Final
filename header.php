<?php
  date_default_timezone_set('America/Mexico_City'); //para que todo el sistema sepa la zona horaria
  session_start();
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/styleHeader.css">

    <title>Speedfit</title>
  </head>
  <body>
  <!-- carrusel-->

    <!--fs: font size, sirve para cambiar el tamanio de la letra-->
    <!--btn-primary cambiar color boton, hace el color azulito lindo mi corazon-->
    <nav  class="navbar navbar-expand-lg navbar-dark"  id="menu">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <img src="img/SpeedFit.png" height="70px" >
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="info.php">Acerca de</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contacto.php">Contactanos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.facebook.com/people/Speedfit/100085451631969/" target="blank"><i class="fa-brands fa-facebook"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Ayuda</a>
              </li>
              <?php if(isset($_SESSION['username'])) { ?>
              <li class="nav-item">
                <a class="nav-link" href="carrito/categoriaGeneral.php">Productos</a>
              </li>
              <?php }else{ ?>
                <a class="nav-link" href="#">Inicia Sesión para Comprar</a>
              <?php } ?>
              <?php if($_SESSION['admin']) { ?>
              <li class="nav-item">
                <a class="nav-link" href="pagAdmin/formulario.php">Admin</a>
              </li>
              <?php } ?>
             

              
            </ul>
            <form class='d-flex' >
            <?php
              if(isset($_SESSION["username"])){?>
                <a href='LoginSpeedfit/index.php' class="nav-link"><?php echo $_SESSION['username']; ?></a>
                
                <a class="nav-link" href="carrito/carrito.php">Carrito</a>
                
                <a class='nav-link' href='LoginSpeedfit/index.php?logout=1'>Log-out</a>
              <?php  } else { ?>
                <a class='nav-link navbar-dark' href='LoginSpeedfit/index.php'>Log-in</a>              
              <?php } ?>
            </form>
            
          </div>

        </div>
      </nav>


      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
  
</html>
