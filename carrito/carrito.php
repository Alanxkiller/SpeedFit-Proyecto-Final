<?php
    
    session_start();
    //session_destroy();
    $servidor='localhost';
    $cuenta='roots';
    $puerto='33065';
    $password='admin';
    $bd='tiendatenis';
    $contador=0;
    // Create connection
    $conn = new mysqli($servidor,$cuenta,$password,$bd,$puerto);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{

        $query = "SELECT * FROM productos";// servira para contar cuantos productos tenemos
        $resultado = $conn -> query($query);
       

    }
    //print_r($_SESSION);
   
    $producto=isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
    if($producto != null){
        foreach($producto as $clave => $cantidad){
            //$cantidad1=(string) $cantidad;
            //$clave1=(string) $clave;
            $query= "SELECT idProd,nombre,precio,descuento, $cantidad AS cantidad FROM productos WHERE idProd=$clave";
            $resultado = $conn -> query($query);
            $listaCarrito[] = $resultado -> fetch_array();
            // $query= $conn->prepare("SELECT idProd,nombre,precio,descuento, $cantidad AS cantidad FROM productos WHERE idProd=$clave");
            // $query->execute([$clave]);
            // $listaCarrito[] = $query->fetch(PDO::fetch_assoc);
            //$query -> fetch_assoc();
        }
        
    }else{
        $listaCarrito=null;
    }
    
    //si al dejar al carrito vacio no pongo lo de abajo nos mostrara error por eso si 
    //el carrito esta vacio pondre como null al arrar listacarrito
    
    
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
    

    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($listaCarrito == null){
                        echo '<tr><td colspan="5" class="text-center">Por el momento el carrito esta vacio</td></tr>';
                    }else{
                        $total=0;
                        foreach($listaCarrito as $producto){ 
                            $idProd= $producto['idProd'];
                            $nombre= $producto['nombre'];
                            $precio= $producto['precio'];
                            $cantidad= $producto['cantidad'];
                            $descuento= $producto['descuento'];

                            $subtotalProductoActual=$cantidad * $precio;
                            $total += $cantidad * $precio;
                            ?>
                            <tr>
                                <td><?php echo $nombre; ?></td>
                                <td>$<?php echo $precio; ?></td>
                                <td><?php echo $cantidad; ?></td>
                                <td>$<?php echo $subtotalProductoActual; ?></td>
                                <td>
                                    <form method="post" action="recibiendoMetodoPost.php">
                                            <input type="hidden" name="idProdEliminar" value="<?php echo $idProd; ?>"> 
                                            <input type="hidden" name="cantidadRestar" value="<?php echo $cantidad; ?>">
                                            <input  class="btn btn-primary" type="submit" value="Eliminar del carrito">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="1"><p class="h3" id="total">TOTAL = </p></td>
                            <td colspan="1"><p class="h3" id="total">$<?php echo $total; ?></p></td>
                        </tr>
                   <?php } ?>
                    
                        
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-md-5 offset-md-7 d-grid gap-2">
                    <button class="btn btn-primary btn-lg">Realizar Pago</button>
            </div>
    </div>

    <script>

    </script>

</body>
</html>