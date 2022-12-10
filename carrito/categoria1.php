<?php
    include 'header.php';

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
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estiloCompra.css">
    <link rel="stylesheet" href="css/estiloConsultas.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/styleHeader.css">

</head>
  <body>
    
    <!-- Topic Cards -->
    <div id="cards_landscape_wrap-2">
        <div class="container">
            <div class="row"> 
                <?php
                $contadorDescuento=0; // nos ayudara a saber que producto random le toco descuento
                while($fila = $resultado -> fetch_assoc()){ 
                    $contadorDescuento++; ?>
                   <?php if($fila["categoria"] == "deporte"){ ?>

                        <div class="">
                                    <a href="">
                                        <div class="card-flyer">
                                            <div class="text-box">
                                                <div class="image-box">
                                                    <img src="<?php echo "../imgProductos/".$fila['nombreImg']?>" alt="" />
                                                </div>
                                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $fila["nombre"]?></h5>
                                    <p class="card-text">id: <?php echo $fila["idProd"] ?></p>
                                    <p class="card-text desc"><?php echo $fila["descripcion"] ?></p>
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