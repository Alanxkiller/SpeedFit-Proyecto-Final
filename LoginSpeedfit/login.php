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
   
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       <script type="text/javascript">
        function validar(){
            var form= document.form;
            if(form.usename.value==0){
                swal('campo vacio','El campo usuario está vació', 'error')
                form.usename.value="";
                form.usename.focus();
                return false;
            }
            if(form.password.value==0){
                swal('campo vacio','El campo contraseña está vació', 'error')
                form.password.value="";
                form.password.focus();
                return false;
            }
            if(form.captcha.value==0){
                swal('campo vacio','El campo captcha está vació', 'error')
                form.captcha.value="";
                form.captcha.focus();
                return false;
            }
            if(form.ciudad.value==0){
                swal('campo vacio','El campo ciudad está vació', 'error')
                form.ciudad.value="";
                form.ciudad.focus();
                return false;
            }
            if(form.pais.value==0){
                swal('campo vacio','El campo país está vació', 'error')
                form.pais.value="";
                form.pais.focus();
                return false;
            }
            if(form.cp.value==0){
                swal('campo vacio','El campo código postal está vació', 'error')
                form.cp.value="";
                form.cp.focus();
                return false;
            }
            if(form.tel.value==0){
                swal('campo vacio','El campo telefono está vació', 'error')
                form.tel.value="";
                form.tel.focus();
                return false;
            }
            swal('Bienvenido', 'success')
            form.submit();
        }            
    </script>
    <title>Iniciar Sesión</title>
</head>

<body>
    <h2>Acceder</h2>
    <form  method="post" action="login.php" class="login-form" name="form">
    
        <div class="input-group">
            <label>Usuario:</label>
            <input type="text" name="username" class="input" value="<?php if(isset($_COOKIE["username"])){ echo $_COOKIE["username"];}?>"onsubmit="return validar();">
        </div>
        <div class="input-group">
            <label>Contraseña:</label>
            <input type="password" name="password" class="input" value="<?php if(isset($_COOKIE["password"])){ echo $_COOKIE["password"];}?>" onsubmit="return validar();">
        </div>
        <div class="remember">
            <input type="checkbox" name="remember"> <label>Recordar Usuario y Contraseña</label>
        </div>
        <div class="input-group">
            <div class="preview"><p class="captcha"><?php echo $_SERVER['captcha']; ?></p></div>  
            <input type="text" id="captcha-input" class="input" placeholder="Ingresa el captcha" name="respuesta" onsubmit="return validar();">
            <input type="hidden" name="captcha" value=" <?php echo $captcha; ?>">
        </div>
        <div class="form-input button">
            <button id="login-btn" name="login-user" onclick="validar();">Acceder</button>
        </div>
        
        <p>¿No eres miembro? <a href="register.php">Registrate</a></p>
        <p> <a href="../index.php">Volver a Inicio</a></p>
    </form>

    <?php if(isset($_SERVER['error'])){ ?>
        <p class="msg error"><?php echo $_SERVER['error']; ?></p>
    <?php }  ?>
</body>

</html>
