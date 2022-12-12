<?php
require 'servidor.php';
if(!isset($_SESSION['changed'])){
    $_SESSION['changed'] = false;
}
if(isset($_POST['submit'])){
    
    $mail = $_POST['mail'];
    $username = $_POST['username'];
    // Comprobamos que ponga los datos de manera correcta, para evitar cambiar otra cosa
    $sql = $conexion->query(" SELECT * from usuarios where nomUsuario='$username' and correo='$mail' ");
    if($datos = $sql->fetch_object()){
        // También hay que comprobar que no esté intentando cambiar una cuenta que NO esté bloqueada
        $checkblock = $conexion->query(" SELECT bloqueo from usuarios where nomUsuario='$username' ");
        $row = mysqli_fetch_assoc($checkblock);
        if('si' == $row['bloqueo']){
            function randomText($length){
                $key="";
                $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
                for($i=0;$i<$length;$i++) {
                    $key .= $pattern[rand(0,35)];
                }
                        return $key;
            }
            $passrand = randomText(6);
            echo $passrand;
    
            // Cifras la contraseña temporal y la mandas a la base de datos.
            $hash = md5($passrand);
            $ne = "UPDATE usuarios SET contraseña='$hash' WHERE correo='$mail'";
            $fin = $conexion -> query($ne);
            // Quitas el bloqueo de la cuenta para que el usuario.
            $bloqueo = "UPDATE usuarios SET bloqueo='no' WHERE correo='$mail'";
            $fin = $conexion -> query($bloqueo);
            // Este mensaje es el que se manda al correo.
            $msg = "Para recuperar tu cuenta, usa esta contraseña temporal. Podrás cambiarla más adelante: \n".$passrand;
            $_SESSION['changed'] = true; // Esto nos sirve para posteriormente cambiar la contraseña temporal.
        }else{
            $_SERVER['error'] = "Esta cuenta no está bloqueada";
        }
        
    }else{
        $_SERVER['error'] = "Los datos son erróneos";
    }

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos/styleRecovery.css">
    <link REL="SHORTCUT ICON" HREF="../img/SpeedFit.png">
    <title>Recuperar contraseña</title>
</head>
<body>     
    <h1 class="h1">Recuperación de Contraseña</h1>
        <form name="myForm" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label for="inlineFormInputName">Ingresa tu usuario e email aquí:</label>
            <div class="col-sm-8 my-1">
                <label class="sr-only" for="inlineFormInputName">Username</label>
                <input type="text" class="form-control" id="inlineFormInputName" placeholder="Usuario" name="username" required><br>
                <label class="sr-only" for="inlineFormInputName">Email</label>
                <input type="text" class="form-control" id="inlineFormInputName" placeholder="Tu correo" name="mail" required>
            </div>
            <div class="col-auto my-1">
                <button type="submit" class="btn btn-dark" name="submit" id="myBtn">Enviar</button>
            </div>
        </form>



     <?php if(isset($_SERVER['error'])){ ?>
            <div>
                <div class="alert alert-danger" role="alert">
                  <?php echo $_SERVER['error']; ?>
                </div>
            </div>
       <?php } ?>
     <?php    
            if ($_SESSION['changed'] == true) {
                $mail = $_POST['mail'];
                mail($mail,"Recuperar cuenta",$msg);
     ?>
            <div>
                <div class="alert alert-info" role="alert">
                  Ha sido enviada una contraseña temporal a tu correo electrónico. Si no es el caso, vuelva a introducir sus datos.
                </div>
            </div>
            <a href="index.php">Volver a Login</a>
     <?php  } ?>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

 </body>
</html>
