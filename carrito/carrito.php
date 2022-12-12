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

    if(isset($_POST['canjear'])){
        if($_POST['cupon'] == "speedfitevrwr79705"){
            $msg = "Descuento del 20%";
            $_SESSION['precio2'] = $_SESSION['precio'] - ($_SESSION['precio'] * 0.20);
            $aceptado = true;
        }
        else if($_POST['cupon'] == "s3rgi0m4ast3r34092"){
            $msg = "Descuento del 20%";
            $_SESSION['precio2'] = $_SESSION['precio'] - ($_SESSION['precio'] * 0.20);
            $aceptado = true;
        }
        else if($_POST['cupon'] == "us4g1n0m1m1spdfit"){
            $msg = "Descuento de $100";
            $_SESSION['precio2'] = $_SESSION['precio'] - 100;
            $aceptado = true;
        }
    }
    

    if(isset($_POST['pago'])){
        $pago=$_POST['pago'];
    }
        
    $numeroRandom2=rand(1000000000,9999999999);
        
    ?>
        <!-- Logica de seleccion del select xd-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estiloCompra.css">
    <link rel="stylesheet" href="css/estiloCarrito.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pago1').hide();
            $('#pago2').hide();
            $('#myOptions').change(function() {
            // var displaycourse=$("#myOptions option:selected").text();
            // var displaycourse2=$("#myOptions").val(); //obtengo el id del producto seleccionado
            if ($("#myOptions").val() == 1) {
                        
                $('#pago2').hide();
                $('#pago').show();
    
            } else if ($("#myOptions").val() == 2) {
                $('#pago').hide();
                    $('#pago2').show();
            }
            });
        });
        //si al dejar al carrito vacio no pongo lo de abajo nos mostrara error por eso si 
        //el carrito esta vacio pondre como null al arrar listacarrito
        </script>
</head>
  <body>
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
                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Realizar Pago</button>
            </div>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalles de Pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php if($listaCarrito == null){ ?>
                    <p>El carrito está vacío</p>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Volver</button>
                <?php } else { ?>
                    
                    <h6>Detalles de el/los Productos:</h6>
                    <?php foreach($listaCarrito as $producto){ 
                        $idProd= $producto['idProd'];
                        $nombre= $producto['nombre'];
                        $precio= $producto['precio'];
                        $cantidad= $producto['cantidad'];
                        $descuento= $producto['descuento'];
                        $subtotalProductoActual=$cantidad * $precio;
                        ?>
                        
                        <div class="products">
                            <p>Nombre: <label for=""><?php echo $nombre ?></label></p>
                            <p>Precio: <label for="">$<?php echo $precio ?></label></p>
                            <p>Cantidad: <label for=""><?php echo $cantidad ?></label></p>
                            <p>Subtotal (P): <label for="">$<?php echo $subtotalProductoActual ?></label></p>
                        </div>
                    <?php } ?>
                    
                    <div class="details">
                        <form action="carrito.php" method="post">
                        <p>Subtotal: $<?php echo $total; ?></p>
                        <?php
                            $iva = $total * 0.16;
                            $conImpuesto = $total + $iva;
                            if($_SESSION['totalProductos'] <= 3){
                                $gastos = 50;
                                $envio = $conImpuesto + $gastos;
                            }else{
                                $gastos = 0;
                                $envio = $conImpuesto;
                            }

                            // variables de sesion
                            $_SESSION['precio'] = $envio;
                            $_SESSION['cantidadN'] = $_SESSION['totalProductos'];
                            $_SESSION['subtotalN'] = $total;
                            $_SESSION['iva'] = $iva;
                            $_SESSION['subImpuesto'] = $conImpuesto;
                            $_SESSION['gastosEnv'] = $gastos;

                        ?>
                        <p>Impuestos (IVA): $<?php echo $iva; ?></p>
                        <p>Total (Con IVA): $<?php echo $conImpuesto; ?></p>
                        <p>Gastos de Envío: $<?php echo $gastos; ?></p>
                        <p>Precio Final: $<?php echo $envio; ?></p>
                        <label for="">Ingresa cupon promocional</label> <input type="text" name="cupon" id="cupon">
                        <input type="submit" class="btn" value="Canjear" name="canjear">
                        </form>

                        <?php if(isset($aceptado)){ 
                            $_SESSION['aceptado'] = $aceptado;
                            ?>
                            <p class="cupon-msg">Cupón Valido. <?php echo $msg ?></p>
                            <p>Precio Nuevo: <?php echo $_SESSION['precio2'] ?></p>
                        <?php } ?>
                    </div>
                    <select id="myOptions" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name='eliminar'>
                        <option value="1">Pago por tarjeta</option>';
                        <option value="2">Pago en el OXXO</option>';
                    </select>

                    <div id="pago" class="card">
                        <form method="post" action="servidor.php" class="login-form" name="form">

                            <img src="../img/Visa-MasterCard.png" alt="" style="max-width:100%;height:auto;">
                            <div class="input-group">
                                <label>Nombre: </label>
                                <input type="text" name="nombre" class="input" required>
                            </div>
                            <div class="input-group">
                                <label>Numero de tarjeta: </label>
                                <input type="text" name="numero" class="input" required>
                            </div>
                            <input type="hidden" name="modopago" value="Pago por tarjeta">
                            <input class="btn btn-primary" name="pagotarjeta" type="submit" value="Realizar Pago">
                        </form>

                    </div>
                    <div id="pago2" class="card">
                        <form method="post" action="servidor.php" class="login-form" name="form2">
                            <img src="../img/OxxoOriginal.png" alt="" style="max-width:60%;height:auto;">
                            <div class="input-group">
                                <label>Nombre: </label>
                                <input type="text" name="nombre" class="input" required>
                            </div>
                            <div class="barras">
                                <img src="../img/codigoB.png" alt="" style="max-width:60%;">
                                <p><?php echo $numeroRandom2?></p>
                            </div>
                            <input type="hidden" name="modopago" value="Pago por OXXO">
                            <input class="btn btn-primary" name="pagotarjeta" type="submit" value="Continuar">
                        </form>


                    </div>
                    
                <?php } ?>   
                </div>
                </div>
            </div>
        </div>    
</body>
</html>