<?php
$servidor='localhost';
$cuenta='root';
$password='';
$bd='tiendatenis';

$conexion = mysqli_connect($servidor, $cuenta, $password, $bd);

// Código para agregar Productos

if(isset($_POST['agregar'])){
 
    $nombre = $_POST['nombreP'];
    $cat = $_POST['catP'];
    $des = $_POST['desP'];
    $existencia = $_POST['existenciaP'];
    $precio = $_POST['precioP'];
    // $img = $_POST['archivo'];
    $desc = $_POST['descP'];

    //Variable para recoger el archivo enviado por el formulario

    $archivo = $_FILES['archivo']['name'];
    $img = $archivo;

    $sql = "INSERT INTO productos (nombre, categoria, descripcion, existencia, precio, nombreImg, descuento) VALUES('$nombre','$cat','$des','$existencia','$precio','$img','$desc')";
    $conexion->query($sql);

    if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
        echo '<script> alert("Producto Registrado") </script>';
    }else{
        echo '<script> alert("Mototruco Chaval") </script>';
    }

    

    // Comprobamos que no esté vacío
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
}
?>