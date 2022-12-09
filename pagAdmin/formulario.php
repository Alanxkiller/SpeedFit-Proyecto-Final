<?php
session_start();
include 'servidor.php';
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
    <link rel="stylesheet" href="estilosForm.css">
    <title>Formulario Altas</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PANEL DE ANDMINISTRADOR</a>
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
                <li class="nav-item">
                <a class="nav-link" href="index.php">Consultas</a>
                </li>

                <li id="carritoMostrar" class="nav-item">
                <a class="nav-link" href="#"> carrito <span class="badge bg-secondary"><?php echo $_SESSION['totalProductos']; ?></span></a>
                </li>
                
            </ul>
            </div>
        </div>
    </nav>


    


    <h2 class="title">Ingresa los datos del producto</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post' id="form-productos" enctype="multipart/form-data">
        <div>
            <label for="">Nombre</label>
            <input type="text" name="nombreP" id="nombreP">
        </div>
        <div>
            <label for="">Categoría</label>
            <input type="text" name="catP" id="catP">
        </div>
        <div>
            <label for="">Descripición</label>
            <input type="text" name="desP" id="desP">
        </div>
        <div>
            <label for="">Existencia <span>Cantidad</span></label>
            <input type="number" name="existenciaP" id="existenciaP">
        </div>
        <div>
            <label for="">Precio</label>
            <input type="number" name="precioP" id="precioP" step="0.01">
        </div>
        <div>
            <label for="">Imagen <span>Nombre del Archivo</span></label>
            <input type="file" name="archivo" id="imgP" accept=".jpg, .jpeg, .png">
        </div>
        <div>
            <label for="">Descuento <span>Porcentaje</span></label>
            <input type="number" name="descP" id="descP">
        </div>
    
        <input type="submit" value="Confirmar" name="agregar" class="send-btn" id="add">
    </form>

    

   <h2 class="title table-title">Inventario de Productos</h2>
       <div>
        <table>
            <tr class=title-columns>
                <td>ID</td>
                <td>Nombre</td>
                <td>Categoría</td>
                <td>Descripición</td>
                <td>Existencia</td>
                <td>Precio</td>
                <td>Imagen</td>
                <td>Descuento</td>
                <td>Opciones</td>
            </tr>

            <!-- C+ -->
            <?php
            $sql = "SELECT * from productos";
            $result = mysqli_query($conexion, $sql);

            while($mostrar = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['idProd']; ?></td>
                <td><?php echo $mostrar['nombre']; ?></td>
                <td><?php echo $mostrar['categoria']; ?></td>
                <td><?php echo $mostrar['descripcion']; ?></td>
                <td><?php echo $mostrar['existencia']; ?></td>
                <td><?php echo $mostrar['precio']; ?></td>
                <td id="img-text"><?php echo $mostrar['nombreImg']; ?><img src="<?php echo "../imgProductos/".$mostrar['nombreImg']; ?>" width="100" height="100"></td>
                <td><?php echo $mostrar['descuento']; ?></td>
                <td> <a href="cambio.php?id=<?php echo $mostrar['idProd']; ?>">Editar</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>   
                
    <p><a href="../index.php">Volver a Inicio</a></p>
    
</body>
</html>