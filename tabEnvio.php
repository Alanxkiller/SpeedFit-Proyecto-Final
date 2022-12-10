<?php
session_start();

$_SESSION['success'] = false;
$servidor='localhost';
$cuenta='id19913372_root';
$password='Asd123asd123.';
$bd='id19913372_speedfit';

$conexion = mysqli_connect($servidor, $cuenta, $password, $bd);


if($conexion->connect_errno){
    die('Hubo un error a la hora de acceder a la base de datos');
}else{
    // Comprobar si el botón fue presionado 
    if(isset($_POST['envio-btn']) && !empty($_POST['nombreC'])){
        
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
                $_SERVER['error'] = "Esta cuenta ya existe, por favor inicie sesión.";
            }else{
                // Insertando los datos
                $sql = "INSERT INTO envio (nombreC, correo, direccion, ciudad, pais, cp, tel) VALUES ('$nombreC','$email','$direccion','$ciudad','$pais','$cp','$tel')";

                $conexion->query($sql);
                if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
                    $_SESSION['success'] = true;
                    $_SESSION['nombreC'] = $nombreC;
                    header('location: index.php');
                }//fin
            }
        
    }
   
}

?>