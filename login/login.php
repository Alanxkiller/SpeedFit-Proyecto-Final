<?php
require 'servidor.php';
$_SERVER['captcha'] = rand(10000, 99999);
$captcha = $_SERVER['captcha'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos/styleLogin.css">
    <link rel="stylesheet" href="estilos/responsiveLogin.css">
	<link rel="shortcut icon" href="images/SpeedFit.ico" type="image/x-icon">
    <title>Iniciar Sesión</title>
</head>

<body>
    <h2>Acceder</h2>
    <form  method="post" action="login.php" class="login-form">
    
        <div class="input-group">
            <label>Usuario:</label>
            <input type="text" name="username" class="input" value="<?php if(isset($_COOKIE["username"])){ echo $_COOKIE["username"];}?>" required>
        </div>
        <div class="input-group">
            <label>Contraseña:</label>
            <input type="password" name="password" class="input" value="<?php if(isset($_COOKIE["password"])){ echo $_COOKIE["password"];}?>" required>
        </div>
        <div class="remember">
            <input type="checkbox" name="remember"> <label>Recordar Usuario y Contraseña</label>
        </div>
        <div class="input-group">
            <div class="preview"><p class="captcha"><?php echo $_SERVER['captcha']; ?></p></div>  
            <input type="text" id="captcha-input" class="input" placeholder="Ingresa el captcha" name="respuesta" required>
            <input type="hidden" name="captcha" value=" <?php echo $captcha; ?>">
        </div>
        <div class="form-input button">
            <button id="login-btn" name="login-user">Acceder</button>
        </div>
        
        <p>¿No eres miembro? <a href="register.php">Registrate</a></p>
        <p> <a href="">Volver a Inicio</a></p>
    </form>

    <?php if(isset($_SERVER['error'])){ ?>
        <p class="msg error"><?php echo $_SERVER['error']; ?></p>
    <?php }  ?>
</body>

</html>
