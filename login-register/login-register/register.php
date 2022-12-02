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
    <title>Registrarse</title>
</head>
<body>
    <h2>Registrarse</h2>
    <form  method="post" action="register.php" class="login-form">
    
        <div class="input-group">
            <label>Usuario:</label>
            <input type="text" name="username" class="input" value="<?php if(isset($_COOKIE["username"])){ echo $_COOKIE["username"];}?>" required>
        </div>
        <div class="input-group">
            <label>Correo Electrónico:</label>
            <input type="email" name="email" class="input" value="<?php if(isset($_COOKIE["username"])){ echo $_COOKIE["username"];}?>" required>
        </div>
        <div class="input-group">
            <label>Contraseña:</label>
            <input type="password" name="password" class="input" value="<?php if(isset($_COOKIE["password"])){ echo $_COOKIE["password"];}?>" required>
        </div>
        <div class="input-group">
            <label>Repetir Contraseña:</label>
            <input type="password" name="password2" class="input" value="<?php if(isset($_COOKIE["password"])){ echo $_COOKIE["password"];}?>" required>
        </div>
        <div class="form-input">
            <button id="login-btn" name="reg-user">Registrarse</button>
        </div>
        
        <p>¿Ya tienes una cuenta? <a href="login.php">Iniciar Sesión</a></p>
        <p> <a href="">Volver a Inicio</a></p>
    </form>


    <!-- Mensajes de error -->
    <?php if(isset($_SERVER['error'])){ ?>
        <p class="msg error"><?php echo $_SERVER['error']; ?></p>
    <?php }  ?>     
</body>
</html>