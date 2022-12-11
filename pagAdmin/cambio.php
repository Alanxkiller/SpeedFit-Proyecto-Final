<?php
include 'servidor.php';

if(!isset($id)){
    $id = 8;
}
if(isset($id)){
    $id = $_GET["id"];
}



if(!isset($_SESSION['totalProductos'])){
    $_SESSION['totalProductos'] = 0;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilosForm.css">
    <title>Formulario Cambio</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tenis</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="formulario.php">Formulario</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="eliminar2prueba.php">Eliminar</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link" href="index.php">Consultas</a>
                </li>

                <li id="carritoMostrar" class="nav-item">
                <a class="nav-link" href="#"> carrito <span class="badge bg-secondary"></span></a>
                </li> -->
                
            </ul>
            </div>
        </div>
    </nav>

    <h2 class="title">Edite los datos y confirme: </h2>
    
    <?php
        $sql = "SELECT * from productos WHERE idProd = '$id'";
        $result = mysqli_query($conexion, $sql);
        $mostrar = mysqli_fetch_array($result);
    ?>
    <form action="actualizar.php" method='post' id="form-productos" class="cambio" enctype="multipart/form-data">
       
        <div>
            <label for="">IDProducto</label>
            <p><?php echo $id; ?></p>
            <input type="hidden" name="idP" id="idP" >
        </div>
        <div >
            <label for="">Nombre</label>
            <input type="text" name="nombreP" id="nombreP" value="<?php echo $mostrar['nombre']; ?>">
        </div>
        <div >
            <label for="">Categoría</label>
            <input type="text" name="catP" id="catP" value="<?php echo $mostrar['categoria']; ?>">
        </div>
        <div>
            <label for="">Descripición</label>
            <input type="text" name="desP" id="desP" value="<?php echo $mostrar['descripcion']; ?>">
        </div>
        <div>
            <label for="">Existencia <span>Cantidad</span></label>
            <input type="number" name="existenciaP" id="existenciaP" value="<?php echo $mostrar['existencia']; ?>">
        </div>
        <div>
            <label for="">Precio</label>
            <input type="number" name="precioP" id="precioP" step="0.01" value="<?php echo $mostrar['precio']; ?>">
        </div>
        <div>
            <label for="">Imagen <span>Nombre del Archivo</span></label>
            <input type="file" name="archivo" id="imgP" value="<?php echo $mostrar['nombreImg']; ?>">
        </div>
        <div>
            <label for="">Descuento <span>Porcentaje</span></label>
            <input type="number" name="descP" id="descP" value="<?php echo $mostrar['descuento']; ?>">
        </div>
    
        <input type="submit" value="Actualizar" name="cambiar" class="send-btn"  id=cam>
        
    </form>
    
   

    <div class="table-container">
        <h2 class="title table-title">Vista Previa Actual</h2>
        <table>
            <tr class="title-columns edit" >
                <td>ID</td>
                <td>Nombre</td>
                <td>Categoría</td>
                <td>Descripición</td>
                <td>Existencia</td>
                <td>Precio</td>
                <td>Imagen</td>
                <td>Descuento</td>
            </tr>

            <!-- C+ -->
            <?php
            $sql = "SELECT * from productos WHERE idProd = '$id'";
            $result = mysqli_query($conexion, $sql);

            while($mostrar = mysqli_fetch_array($result)){
            ?>
            <tr class="edit">
                <td><?php echo $mostrar['idProd']; ?></td>
                <script>document.getElementById("idP").value = "<?php echo $mostrar['idProd']; ?>"</script>
                <td><?php echo $mostrar['nombre']; ?></td>
                <script>document.getElementById("nombreP").value = "<?php echo $mostrar['nombre']; ?>"</script>
                <td><?php echo $mostrar['categoria']; ?></td>
                <script>document.getElementById("catP").value = "<?php echo $mostrar['categoria']; ?>"</script>
                <td><?php echo $mostrar['descripcion']; ?></td>
                <script>document.getElementById("desP").value = "<?php echo $mostrar['descripcion']; ?>"</script>
                <td><?php echo $mostrar['existencia']; ?></td>
                <script>document.getElementById("existenciaP").value = "<?php echo $mostrar['existencia']; ?>"</script>
                <td><?php echo $mostrar['precio']; ?></td>
                <script>document.getElementById("precioP").value = "<?php echo $mostrar['precio']; ?>"</script>
                
                <td id="img-text"><?php echo $mostrar['nombreImg']; ?><img src="<?php echo "../imgProductos/".$mostrar['nombreImg']; ?>" width="100" height="100"></td>
                <td><?php echo $mostrar['descuento']; ?></td>
                <script>document.getElementById("descP").value = "<?php echo $mostrar['descuento']; ?>"</script>
            </tr>
            <?php } ?>
        </table>
    </div>
    
    <p><a href="../index.php">Volver a Inicio</a></p>
    
</body>
</html>