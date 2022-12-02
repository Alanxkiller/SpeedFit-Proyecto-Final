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
    // Comprobar si el botón fue presionado (REGISTRO)
    if(isset($_POST['reg-user']) && !empty($_POST['username'])){
        // Comprobar las contraseñas
        if($_POST['password'] == $_POST['password2']){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hash = md5($password);
            $sql = $conexion->query(" SELECT * from usuarios where nomUsuario='$username' and correo='$email' ");

            // Verifica si la cuenta ya existe
            if($datos = $sql->fetch_object()){
                $_SERVER['error'] = "Esta cuenta ya existe, por favor inicie sesión.";
            }else{
                // Insertando los datos
                $sql = "INSERT INTO usuarios (nomUsuario, correo, contraseña) VALUES ('$username','$email','$hash')";

                $conexion->query($sql);
                if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
                    $_SESSION['success'] = true;
                    $_SESSION['username'] = $username;
                    header('location: index.php');
                }//fin
            }
        }else{
            $_SERVER['error'] = "Las contraseñas no coinciden";
        }
    }
    // Comprobar si el botón fue presionado (LOGIN)
    if(isset($_POST['login-user']) && !empty($_POST['username'])){
        // Comprobación del captcha
        if($_POST['captcha'] == $_POST['respuesta']){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hash = md5($password);
            if(!isset($_SESSION['intentos'])){
                $_SESSION['intentos'] = 0;
            }
            

            $sql = $conexion->query(" SELECT * from usuarios where nomUsuario='$username' and contraseña='$hash' ");
            if($datos = $sql->fetch_object()){
                if(!empty($_POST["remember"])){
                    setcookie("username", $_POST["username"], time()+3600);
                    setcookie("password", $_POST["password"], time()+3600);
                }
                $_SESSION['intentos'] = 0;
                $_SESSION['success'] = true;
                $_SESSION['username'] = $username;
                header('location: index.php');
            }else{
                $_SESSION['intentos'] += 1;
                $_SERVER['error'] = "Datos incorrectos. Intentos: ".$_SESSION['intentos'];
                if($_SESSION['intentos'] == 3){
                    header('location: form_correo.php');
                    
                }
            }
        }else{
            $_SERVER['error'] = "Escribe bien el Captcha";
        }
    }
}


?>