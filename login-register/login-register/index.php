<?php
session_start();
if($_SESSION['success'] == false){
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
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Document</title>
</head>
<body>
<h2>Bienvenido <?php echo $_SESSION['username']; ?> </h2>

<?php if($_SESSION['changed']) {?>
    <p>¿Usaste contraseña temporal? <a href="nuevaPass.php">Cámbiala</a></p>
<?php } ?>
    <p> <a href="index.php?logout='1'" style="color: red;">Salir</a> </p>
</body>
</html>