<?php
session_start();

$_SESSION['success'] = false;
$servidor='localhost';
$cuenta='root';
$password='';
$bd='tiendatenis';
$contador=0;
$ventasDiciembre=0;

$conexion = mysqli_connect($servidor, $cuenta, $password, $bd);


if($conexion->connect_errno){
    die('Hubo un error a la hora de acceder a la base de datos');
}else{
    // Comprobar si el botón fue presionado 
    if(isset($_POST['envio-btn']) && !empty($_POST['nombreC'])){
        // Codigo para bajar el numero de existencias y subir las ventas
        $producto=isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
        if($producto != null){
            foreach($producto as $clave => $cantidad){
                //$cantidad1=(string) $cantidad;
                //$clave1=(string) $clave;
                $query= "UPDATE productos SET existencia = existencia-$cantidad WHERE idProd = $clave";
                $conexion -> query($query);

                
                $ventasDiciembre+=$cantidad;
            }
          
            // Create connection
            $query2= "UPDATE ventas SET ventas = ventas+$ventasDiciembre WHERE mes='diciembre'";
            $conexion -> query($query2);
            unset($_SESSION['carrito']['productos']); // al realizar la compra vaciamos la sesion de carrito
            $_SESSION['totalProductos']=0; //el contador de cuantos productos tenemos se debe de resetear a 0
        }


        // Codigo de los datos de la venta
            $nombreC = $_POST['nombreC'];
            $email = $_POST['email'];
            $direccion = $_POST['direccion'];
            $ciudad = $_POST['ciudad'];
            $pais = $_POST['pais'];
            $cp = $_POST['cp'];
            $tel = $_POST['tel'];
            $sql = $conexion->query(" SELECT * from envio where nombreC='$nombreC' and email='$email' ");

            
            // Verifica si la cuenta ya existe
            if($datos = $sql->fetch_object()){
                $_SESSION['nombreC'] = $nombreC;
                $_SESSION['emailSend'] = $email;
                header('location: ../notacompra.php');
            }else{
                $sql = "INSERT INTO envio (nombreC, email, direccion, ciudad, pais, cp, tel) VALUES ('$nombreC','$email','$direccion','$ciudad','$pais','$cp','$tel')";

                $conexion->query($sql);
                    if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
                        $_SESSION['success'] = true;
                        $_SESSION['nombreC'] = $nombreC;
                        $_SESSION['emailSend'] = $email;
                        header('location: ../notacompra.php');
                    }//fin
            }
                
            
            // Insertando los datos
            
            
        
    }
   
}

?>