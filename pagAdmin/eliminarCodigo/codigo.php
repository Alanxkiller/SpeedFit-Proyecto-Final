<?php 
    if(isset($_POST['botonEliminar'])){
$servidor='localhost';
$cuenta='id19772797_root';
$password='Asd123Asd123.';
$bd='id19772797_tiendatenis';
        //conexion a la base de datos
        $conexion = new mysqli($servidor,$cuenta,$password,$bd);
        if($conexion->connect_errno){
            die('Error en la conexion');
        }else{
            $eliminar = $_POST['idProducto'];

            //hacemos cadena con la sentencia mysql para eliminar
            $sql= " DELETE FROM productos WHERE idProd='$eliminar'";
            
            $conexion->query($sql);
        echo 200;
        }
           
    }
?>