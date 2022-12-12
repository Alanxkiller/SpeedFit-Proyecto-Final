<?php
    //query para agregar UPDATE productos SET existencia = existencia+5 WHERE idProd = 1;   
    session_start();
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='tiendatenis';
    $contador=0;
    $ventasDiciembre=0;
    // Create connection
    $conn = new mysqli($servidor,$cuenta,$password,$bd);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        $producto=isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
        if($producto != null){
            foreach($producto as $clave => $cantidad){
                //$cantidad1=(string) $cantidad;
                //$clave1=(string) $clave;
                $query= "UPDATE productos SET existencia = existencia-$cantidad WHERE idProd = $clave";
                $conn -> query($query);

                
                $ventasDiciembre+=$cantidad;
            }
          
            // Create connection
            $conn = new mysqli('localhost','root','','graficatenis');
            $query2= "UPDATE ventas SET ventas = ventas+$ventasDiciembre WHERE mes='diciembre'";
            $conn -> query($query2);
            unset($_SESSION['carrito']['productos']); // al realizar la compra vaciamos la sesion de carrito
            $_SESSION['totalProductos']=0; //el contador de cuantos productos tenemos se debe de resetear a 0
        }
    }
?>
<script>window.location.href="carrito.php"</script>
