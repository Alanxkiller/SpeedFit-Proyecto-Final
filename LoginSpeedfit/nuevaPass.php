<?php
    require 'servidor.php';
    $user = $_SESSION['username'];   
    if(isset($_POST['submit'])){
        //obtenemos datos del formulario
          $pass = $_POST['password_1'];
          $verifpass = $_POST['password_2'];
          $user = $_SESSION['username'];
          $hash = md5($pass);
          if ($pass == $verifpass){
              $ne = "UPDATE usuarios SET contraseña='$hash' WHERE nomUsuario='$user'"; 
              $fin = $conexion->query($ne);  //aplicamos sentencia que inserta datos en la tabla cliente de la base de datos
              $_SESSION['changed'] = false;
          }else{
            $_SERVER['error'] = "Las contraseñas no coinciden";
          }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restablecer contraseña</title>
    
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="estilos/styleLogin.css">
</head>
<body>
  <h2>Restablecimiento de contraseña</h2>
  <form method="post" action="nuevaPass.php" class="login-form">
    <div class="input-group">
  	  <label>Contraseña:</label>
  	  <input name="password_1" type="password" class="input" id="password_1" placeholder="" required>
  	</div>
  	<div class="input-group">
  	  <label>Confirme su contraseña:</label>
  	  <input name="password_2" type="password" class="input" id="password_2" placeholder="" required>
  	</div>
  	<div class="input-group">
  	  <button class="btn btn-success" type="submit" name="submit">Aceptar</button>
  	</div>
  	</form>
    <?php if(isset($_SERVER['error'])){ ?>
      <div>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SERVER['error']; ?>
              </div>
            </div>
      <?php } ?>
  	
<?php if($_SESSION['changed'] == false){ ?>
  <div class="alert alert-info" role="alert">
    <p>Operacion Exitosa</p><br>
    <a href="index.php">Volver</a>
  </div>
<?php } ?>
</body>
</html>