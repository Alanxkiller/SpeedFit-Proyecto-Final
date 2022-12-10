<?php
require 'servidor.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos/styleLogin.css">
    <link rel="stylesheet" href="estilos/responsiveLogin.css">
    <link rel="shortcut icon" href="images/SpeedFit.ico" type="image/x-icon">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function validar(){
            var form= document.form;
            if(form.username.value==0){
                swal('campo vacio','El campo usuario está vació', 'error')
                form.username.value="";
                form.username.focus();
                return false;
            }
            if(form.email.value==0){
                swal('campo vacio','El campo email está vació', 'error')
                form.email.value="";
                form.email.focus();
                return false;
            }
            if(form.password.value==0){
                swal('campo vacio','El campo contraseña está vació', 'error')
                form.password.value="";
                form.password.focus();
                return false;
            }
            if(form.password2.value==0){
                swal('campo vacio','El campo repetir contraseña está vació', 'error')
                form.password2.value="";
                form.password2.focus();
                return false;
            }
            swal('datos enviados con exito', 'success')
            form.submit();
        }            
    </script>
    <title>Registrarse</title>
</head>
<body>
    <h2>Registrarse</h2>
    <form  method="post" action="register.php" class="login-form" name="form">
    
        <div class="input-group">
            <label>Usuario:</label>
            <input type="text" name="username" class="input" value="" onload="return validar();">
        </div>
        <div class="input-group">
            <label>Correo Electrónico:</label>
            <input type="email" name="email" class="input" value="" onload="return validar();">
        </div>
        <div class="input-group">
            <label>Contraseña:</label>
            <input type="password" name="password" class="input" value="" onload="return validar();">
        </div>
        <div class="input-group">
            <label>Repetir Contraseña:</label>
            <input type="password" name="password2" class="input" value="" onload="return validar();">
        </div>
        <div class="form-input">
            <button id="login-btn" name="reg-user" onclick="return validar();">Registrarse</button>
        </div>
        
        <p>¿Ya tienes una cuenta? <a href="login.php">Iniciar Sesión</a></p>
        <p> <a href="../index.php">Volver a Inicio</a></p>
    </form>


    <!-- Mensajes de error -->
    <?php if(isset($_SERVER['error'])){ ?>
        <p class="msg error"><?php echo $_SERVER['error']; ?></p>
    <?php }  ?>     
</body>
</html>