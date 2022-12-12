<?php
    session_start();
    if(isset($_POST['pagotarjeta'])){
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['modopago'] = $_POST['modopago'];
        header('location: envioForm/formEnvio.php');
    }
?>