<?php

include "header.php";
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
  $_SESSION['success'] = false;
    header("location: login.php");
}
if(!isset($_SESSION['changed'])){
    $_SESSION['changed'] = false;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


    
    <link rel="stylesheet" href="estilos/styleUser.css">
	
    <title>Bienvenido</title>
</head>
<body>


<h2>Bienvenido <?php echo $_SESSION['username']; ?> </h2>

<?php if($_SESSION['changed']) {?>
    <p>¿Usaste contraseña temporal? <a href="nuevaPass.php">Cámbiala</a></p>
<?php } ?>
    <p> <a href="../index.php">Volver al Sitio</a>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>