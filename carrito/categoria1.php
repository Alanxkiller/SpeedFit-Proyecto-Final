<?php
    
    session_start();
    //session_destroy();
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='tiendatenis';
    $contador=0;
    // Create connection
    $conn = new mysqli($servidor,$cuenta,$password,$bd);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        $query = "SELECT * FROM productos";// servira para contar cuantos productos tenemos
        $resultado = $conn -> query($query);
        while($fila = $resultado -> fetch_assoc()){
            $contador++;
        }
        
        $query = "SELECT * FROM productos";
        $resultado = $conn -> query($query);
        $numeroRandom=rand(1,$contador);
        //echo "Numero random: " . $numeroRandom=rand(1,$contador);
        

    }
    if(isset($_SESSION['carrito']['productos'])){
        $datos['numero']=count($_SESSION['carrito']['productos']);
       // print_r($_SESSION);
        //echo "   contando=" . count($_SESSION['carrito']['productos']); 
        //echo "contadorDORES" . $_SESSION['totalProductos'];  
    }
    
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estiloCompra.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
  <body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="categoriaGeneral.php">Tenis</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="categoria1.php">Deportivo</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="categoria2.php">Casual</a>
                </li>

                <li id="carritoMostrar" class="nav-item">
                <a class="nav-link" href="carrito.php"> carrito <span class="badge bg-secondary"><?php echo $_SESSION['totalProductos']; ?></span></a>
                </li>
                
            </ul>
            </div>
        </div>
    </nav>
    
    <!-- Topic Cards -->
    <div id="cards_landscape_wrap-2">
        <div class="container">
            <div class="row"> 
                <?php
                $contadorDescuento=0; // nos ayudara a saber que producto random le toco descuento
                while($fila = $resultado -> fetch_assoc()){ 
                    $contadorDescuento++; ?>
                   <?php if($fila["categoria"] == "deporte"){ ?>

                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <a href="">
                                        <div class="card-flyer">
                                            <div class="text-box">
                                                <div class="image-box">
                                                    <img src="<?php echo $fila['nombreImg']?>" alt="" />
                                                </div>
                                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $fila["nombre"]?></h5>
                                    <p class="card-text">id: <?php echo $fila["idProd"] ?></p>
                                    <p class="card-text"><?php echo $fila["descripcion"] ?></p>
                                    <p class="card-text">Existencias: <?php echo $fila["existencia"] ?></p>
                                    <?php if ($contadorDescuento == $numeroRandom){ ?>
                                            <p class="card-text"><small class="text-success" >Aplica descuento del 10%<del> $ <?php echo $fila["precio"] ?></small></del></p>
                                            <p class="card-text"> $ <?php echo $fila["precio"]*.9 ?></p>

                                        <?php } else{ ?>
                                            <p class="card-text">$ <?php echo $fila["precio"] ?></p>

                                        <?php } ?>
                                    <form method="post" action="recibiendoMetodoPost.php">
                                        <input type="hidden" name="idProd" value="<?php echo $fila['idProd'] ?>">
                                        <input type="hidden" name="categoria" value="deporte">
                                        <input  class="btn btn-primary" type="submit">
                                    </form>
                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                    <?php } ?>
                  
                <?php } ?> 
            </div>
        </div>
    </div>
    

</body>
</html>