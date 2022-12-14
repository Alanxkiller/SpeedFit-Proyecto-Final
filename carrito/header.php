<?php
  include "../LoginSpeedfit/servidor.php";
  
  date_default_timezone_set('America/Mexico_City'); //para que todo el sistema sepa la zona horaria
  if(!isset($_SESSION['admin'])){
    $_SESSION['admin'] = false;
  }

  if(!isset($_SESSION['totalProductos'])){
    $_SESSION['totalProductos'] = 0; 
  }


  ?>
<!doctype html>
<html lang="es">
  <head>
  <link REL="SHORTCUT ICON" HREF="../img/SpeedFit.png">
    <link REL="SHORTCUT ICON" HREF="img/SpeedFit.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <!-- Bootstrap CSS para iconos de redes sociales -->
    
    <script src="https://kit.fontawesome.com/1cd1525fc0.js" crossorigin="anonymous"></script>
    <title>Tiendita</title>
    <link rel="stylesheet" href="css/styleHeader.css">
  </head>
  <body>
  <!-- carrusel-->
    <nav  class="navbar navbar-expand-lg main-header"  id="menu">
        <div class="container-nav">
          <a class="navbar-brand" href="../index.php">
            <img src="SpeedFit.png" height="70px" >
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
                <a class="nav-link" href="https://www.facebook.com/people/Speedfit/100085451631969/" target="blank"><i class="fa-brands fa-facebook"></i></a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../preguntasFrecuentes.php">Ayuda</a>
              </li>
              <?php if(isset($_SESSION['username'])) { ?>
              <li class="nav-item">
                <a class="nav-link" href="../carrito/categoriaGeneral.php">Productos</a>
              </li>
              <?php }else{ ?>
                <a class="nav-link" href="#">Inicia Sesi??n para Comprar</a>
              <?php } ?>
                <li class="nav-item">
                <a class="nav-link" href="categoria1.php">Deportivo</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="categoria2.php">Casual</a>
                </li>

                <li id="carritoMostrar" class="nav-item">
                <a class="nav-link" href="carrito.php"> carrito <span class="badge bg-secondary"><?php echo $_SESSION['totalProductos']; ?></span></a>
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
                <?php echo "<a href='../LoginSpeedfit/index.php' style='color:#eee'>".$_SESSION['username']."</a>"; ?>
                <a class='nav-link' href='../LoginSpeedfit/index.php?logout=1' >Salir</a>
                
              <?php  } else { ?>
                <a class='nav-link' href='index.php' style='color:white'>Log-in</a>";              
              <?php } ?>
            </form>
            
          </div>

        </div>
      </nav>

  </body>
  
</html>
