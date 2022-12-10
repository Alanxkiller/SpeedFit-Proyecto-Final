<?php
session_start();

$_SESSION['success'] = false;
$servidor='localhost';
$cuenta='root';
$password='';
$bd='tiendatenis';

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
            $sql = $conexion->query(" SELECT * from usuarios where nomUsuario='$username' or correo='$email' ");

            // Verifica si la cuenta ya existe
            if($datos = $sql->fetch_object()){
                $_SERVER['error'] = "Esta cuenta ya existe, por favor inicie sesión.";
            }else{
                // Insertando los datos
                $sql = "INSERT INTO usuarios (nomUsuario, correo, contraseña, bloqueo, admin) VALUES ('$username','$email','$hash','no', 'no')";

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
            

            $sql = $conexion->query(" SELECT bloqueo from usuarios where nomUsuario='$username' ");
            $row = mysqli_fetch_assoc($sql);
            // Comprueba si el usuario existe
            if(!isset($row)){
                $_SERVER['error'] = "El usuario no existe";
            }else{
                // Comprueba primero si la cuenta está bloqueada
                if("si" == $row['bloqueo']){
                    header('location: bloqueo.php');
                }else{
                    // Contabiliza los intentos que hemos hecho a la hora de hacer login
                    if(!isset($_SESSION['intentos'])){
                        $_SESSION['intentos'] = 0;
                    }
                    
                    $sql = $conexion->query(" SELECT * from usuarios where nomUsuario='$username' and contraseña='$hash' ");
                    // Esta condición es para comprobar los datos insertados con los de la base de datos
                    if($datos = $sql->fetch_object()){
                        if(!empty($_POST["remember"])){
                            setcookie("username", $_POST["username"], time()+3600);
                            setcookie("password", $_POST["password"], time()+3600);
                        }
                        $_SESSION['intentos'] = 0;
                        $_SESSION['success'] = true;
                        $_SESSION['username'] = $username;

                        $checkAdmin = $conexion->query(" SELECT admin from usuarios where nomUsuario='$username' ");
                        $row = mysqli_fetch_assoc($checkAdmin);

                        if("si" == $row['admin']){
                            $_SESSION['admin'] = true;
                        }
                        header('location: index.php');
                    }else{
                        $_SESSION['intentos'] += 1;
                        $_SERVER['error'] = "Datos incorrectos. Intentos: ".$_SESSION['intentos'];
                        // Cuando se sobrepasan 3 intentos, este bloquea la cuenta
                        if($_SESSION['intentos'] == 3){
                            $_SESSION['intentos']= 0;
                            $cambio = "UPDATE usuarios SET bloqueo='si' WHERE nomUsuario='$username'"; 
                            $fin = $conexion -> query($cambio);
                            header('location: bloqueo.php');
                        }
                    }
                }
            }
        }else{
            $_SERVER['error'] = "Escribe bien el Captcha";
        }
    }
}


?>