<?php
include 'servidor.php';

$idP= $_POST['idP'];
$nombreP = $_POST['nombreP'];
$catP = $_POST['catP'];
$desP = $_POST['desP'];
$existenciaP = $_POST['existenciaP'];
$precioP = $_POST['precioP'];
$imgP = $_POST['imgP'];
$descP = $_POST['descP'];

$archivo = $_FILES['archivo']['name'];
$imgP = $archivo;

if(isset($archivo) && $archivo != ""){
    $tipo = $_FILES['archivo']['type'];
    $tam = $_FILES['archivo']['size'];
    $temp = $_FILES['archivo']['tmp_name'];

    if(move_uploaded_file($temp, '../imgProductos/'.$archivo)){
        $target_path = dirname(__DIR__).'/imgProductos/';
        chmod($target_path, 0777);
    }else{
        echo '<div><b>Algo salió mal</b></div>';
    }
}

$sql= " UPDATE `productos` SET `nombre`='$nombreP',`categoria`='$catP',`descripcion`='$desP',`existencia`='$existenciaP',`precio`='$precioP',`nombreImg`='$imgP',`descuento`='$descP' WHERE idProd = '$idP'";
$conexion->query($sql); 


if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
    echo '<script> alert("Producto Actualizado"); window.location="formulario.php"</script>';
}else{
    echo '<script> alert("Mototruco Chaval"); window.location="formulario.php" </script>';
}

?>