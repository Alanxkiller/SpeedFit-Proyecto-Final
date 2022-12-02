<?php
require 'servidor.php';
if(isset($_POST['submit'])){
    if(!isset($_SESSION['changed'])){
        $_SESSION['changed'] = false;
    }
    $mail = $_POST['mail'];   
    function randomText($length){
            $key="";
            $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
            for($i=0;$i<$length;$i++) {
                $key .= $pattern[rand(0,35)];
            }
                return $key;
            }
        $passrand = randomText(6);
        $hash = md5($passrand);
        $ne = "UPDATE usuarios
        SET contraseña='$hash' WHERE correo='$mail'";
        $fin = $conexion -> query($ne);
        $msg = "Para recuperar tu contraseña: \n ".$passrand;
        $_SESSION['changed'] = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     
     
</head>
<body>     
    <h1 class="h1">Recuperación de Contraseña</h1>
    <div class="container">
        <form name="myForm" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="form-row align-items-center">
                <label for="inlineFormInputName">Ingresa tu email aquí:</label>
                <div class="col-sm-8 my-1">
                    <label class="sr-only" for="inlineFormInputName">Email</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Tu correo" name="mail">
                </div>
                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-dark" name="submit" id="myBtn">Enviar</button>
                </div>
            </div>
        </form>
    </div>

     <?php    
   
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $mail = $_POST['mail'];
                mail($mail,"Recuperar contraseña",$msg);
     ?>
            <div>
                <div class="alert alert-info" role="alert">
                  correo enviado
                </div>
            </div>
            <a href="index.php">Volver a Login</a>
     <?php  } ?>
     

     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

 </body>
</html>